<?php

namespace Modules\Core\Http\Controllers\Backup;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Inertia\Response;
use Modules\Core\Actions\Backup;
use Modules\Core\Enums\Backup\Option;
use Modules\Core\Http\Requests\BackupManualRequest;
use Modules\Core\Jobs\CreateBackupJob;
use Spatie\Backup\BackupDestination\Backup as SpatieBackup;
use Spatie\Backup\BackupDestination\BackupDestination;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class BackupController extends Controller
{
    public function index(): Response
    {
        return inertia('Core::backup/index', [
            'options' => Option::labels(),
            'files' => Backup::files(),
        ])->title(__('Cadangan'));
    }

    public function create(BackupManualRequest $request)
    {
        try {
            dispatch(new CreateBackupJob($request->option));

            return back()->success(__('Cadangan berhasil dibuat'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan saat melakukan pencadangan'));
        }
    }

    public function download(Request $request)
    {
        $backup = Backup::findBackup($request->path);

        if (! $backup?->exists()) {
            return back()->error(__('Cadangan tidak ditemukan'));
        }

        return Backup::respondWithBackupStream($backup);
    }

    public function destroy(Request $request)
    {
        try {
            $destination = BackupDestination::create('local', config('backup.backup.name'));

            $destination->backups()->first(
                fn (SpatieBackup $backup) => $backup->path() === $request->backup_path
            )?->delete();

            Artisan::call('cache:clear');
            Artisan::call('config:clear');

            return back()->success(__('Berhasil menghapus cadangan'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan saat menghapus cadangan'));
        }
    }
}
