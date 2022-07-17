<?php

namespace Modules\KamenTheme\Enums;

use Illuminate\Support\Collection;
use Modules\Core\Enums\Concerns\HasLabel;
use Modules\Core\Enums\Concerns\InvokableCases;

enum MediaSocials: int implements HasLabel
{
    use InvokableCases;

    case FACEBOOK = 1;
    case TWITTER = 2;
    case WHATSAPP = 3;
    case EMAIL = 4;
    case INSTAGRAM = 5;

    public function label(): string
    {
        return match ($this) {
            self::FACEBOOK => __('Facebook'),
            self::TWITTER => __('Twitter'),
            self::WHATSAPP => __('Whatsapp'),
            self::EMAIL => __('Email'),
            self::INSTAGRAM => __('Instagram'),
        };
    }

    public static function labels(): Collection
    {
        return collect(self::cases())->map(fn ($object) => ['value' => $object->value, 'label' => $object->label()]);
    }
}
