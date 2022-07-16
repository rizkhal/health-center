<?php

namespace Modules\Core\Events;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class BackupHasSuccessful
{
    public function handle($event)
    {
        Artisan::call('cache:clear');
    }
}
