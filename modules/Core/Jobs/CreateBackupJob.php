<?php

namespace Modules\Core\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Modules\Core\Enums\Backup\Option;

class CreateBackupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private int $option
    ) {
        //
    }

    public function handle(): void
    {
        match ($this->option) {
            Option::ALL() => Artisan::call('backup:run'),
            Option::ONLY_DB() => Artisan::call('backup:run', ['--only-db' => true]),
            Option::ONLY_FILE() => Artisan::call('backup:run', ['--only-files' => true]),
        };
    }
}
