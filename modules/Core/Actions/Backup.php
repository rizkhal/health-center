<?php

namespace Modules\Core\Actions;

use Illuminate\Support\Facades\Cache;
use Spatie\Backup\BackupDestination\Backup as SpatieBackup;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\Helpers\Format;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatus;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;

class Backup
{
    public static function storages(): array
    {
        $config = config('backup.monitor_backups');

        if (Cache::has('storages')) {
            return Cache::get('storages');
        }

        $storages = BackupDestinationStatusFactory::createForMonitorConfig($config)->map(function (BackupDestinationStatus $status) {
            return [
                'name' => $status->backupDestination()->backupName(),
                'disk' => $status->backupDestination()->diskName(),
                'reachable' => $status->backupDestination()->isReachable(),
                'healthy' => $status->isHealthy(),
                'amount' => $status->backupDestination()->backups()->count(),
                'newest' => $status->backupDestination()->newestBackup() ? $status->backupDestination()->newestBackup()->date()->diffForHumans() : 'No backups present',
                'usedStorage' => Format::humanReadableSize($status->backupDestination()->usedStorage()),
            ];
        })->values()->toArray();

        return Cache::remember('storages', now()->addHour(), fn () => $storages);
    }

    public static function files(string|null $disk = 'local')
    {
        $destination = BackupDestination::create($disk, config('backup.backup.name'));

        if (Cache::has("files-{$disk}")) {
            return Cache::get("files-{$disk}");
        }

        $files = $destination->backups()->map(function (SpatieBackup $backup) {
            $size = method_exists($backup, 'sizeInBytes') ? $backup->sizeInBytes() : $backup->size();

            return [
                'path' => $backup->path(),
                'date' => $backup->date()->format('Y-m-d H:i:s'),
                'size' => Format::humanReadableSize($size),
            ];
        })->toArray();

        return Cache::remember("files-{$disk}", now()->addHour(), fn () => $files);
    }

    public static function findBackup(string $path, string $disk = 'local')
    {
        $destination = BackupDestination::create($disk, config('backup.backup.name'));

        return $destination->backups()->first(fn (SpatieBackup $backup) => $backup->path() === $path);
    }

    public static function respondWithBackupStream($backup)
    {
        $fileName = pathinfo($backup->path(), PATHINFO_BASENAME);
        $size = method_exists($backup, 'sizeInBytes') ? $backup->sizeInBytes() : $backup->size();

        $downloadHeaders = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Type' => 'application/zip',
            'Content-Length' => $size,
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Pragma' => 'public',
        ];

        return response()->stream(function () use ($backup) {
            $stream = $backup->stream();

            fpassthru($stream);

            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, $downloadHeaders);
    }
}
