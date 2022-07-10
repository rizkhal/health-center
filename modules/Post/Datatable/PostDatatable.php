<?php

declare(strict_types=1);

namespace Modules\Post\Datatable;

use Illuminate\Database\Eloquent\Builder;
use Modules\Post\Entities\Post;
use Rizkhal\Inertable\Column;
use Rizkhal\Inertable\Inertable;

class PostDatatable extends Inertable
{
    public function query(): Builder
    {
        return Post::query();
    }

    public function columns(): array
    {
        return [
            Column::make(__('Judul'), 'title')->sortable(),
            Column::make(__('Dibuat'), 'created_at')->sortable(),
            Column::make(__('Kategori'), 'category.name')->sortable()->searchable(),
            Column::make(__('Author'), 'author.username')->sortable(),
            Column::action(),
        ];
    }
}
