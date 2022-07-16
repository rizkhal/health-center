<?php

declare(strict_types=1);

namespace Modules\Core\Enums\Backup;

use Illuminate\Support\Collection;
use Modules\Core\Enums\Concerns\HasLabel;
use Modules\Core\Enums\Concerns\InvokableCases;

enum Disk: int implements HasLabel
{
    use InvokableCases;

    case LOCAL = 0;
    case AWS = 1;
    case GDRIVE = 2;
    case DROPBOX = 3;

    public function label(): string
    {
        return match ($this) {
            self::LOCAL => __('Lokal'),
            self::AWS => __('Aws Bucket'),
            self::GDRIVE => __('Google Drive'),
            self::DROPBOX => __('Dropbox'),
        };
    }

    public static function labels(): Collection
    {
        return collect(self::cases())->map(fn ($object) => ['value' => $object->value, 'label' => $object->label()]);
    }
}
