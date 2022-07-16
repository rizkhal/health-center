<?php

declare(strict_types=1);

namespace Modules\Core\Enums\Backup;

use Illuminate\Support\Collection;
use Modules\Core\Enums\Concerns\HasLabel;
use Modules\Core\Enums\Concerns\InvokableCases;

enum Option: int implements HasLabel
{
    use InvokableCases;

    case ALL = 0;
    case ONLY_DB = 1;
    case ONLY_FILE = 2;

    public function label(): string
    {
        return match ($this) {
            self::ALL => __('Database & Aplikasi'),
            self::ONLY_DB => __('Hanya Database'),
            self::ONLY_FILE => __('Hanya Aplikasi'),
        };
    }

    public static function labels(): Collection
    {
        return collect(self::cases())->map(fn ($object) => ['value' => $object->value, 'label' => $object->label()]);
    }
}
