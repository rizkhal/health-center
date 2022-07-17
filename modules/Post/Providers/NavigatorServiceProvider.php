<?php

namespace Modules\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Entities\User;
use Nedwors\Navigator\Facades\Nav;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function (User $user) {
            return [
                Nav::item(__('Post'))->subItems(
                    [
                        Nav::item(__('Artikel'))
                            ->for(route('dashboard.post.post.index'))
                            ->heroicon('PencilAltIcon')
                            ->icon('outline'),
                        Nav::item(__('Kategori'))
                            ->for(route('dashboard.post.category.index'))
                            ->heroicon('TagIcon')
                            ->icon('outline'),
                        Nav::item(__('Halaman'))
                            ->for(route('dashboard.post.page'))
                            ->heroicon('CollectionIcon')
                            ->icon('outline'),
                    ]
                ),
            ];
        }, 'post');
    }
}
