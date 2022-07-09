<?php

namespace Modules\Core\Enums\Concerns;

interface HasColor
{
    /**
     * Case color.
     *
     * @return string
     */
    public function color(): string;
}
