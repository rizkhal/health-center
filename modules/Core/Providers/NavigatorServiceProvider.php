<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Entities\User;
use Nedwors\Navigator\Facades\Nav;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function (User $user) {
            return [
                Nav::item(__('Overview'))->subItems(
                    [
                        Nav::item(__('Beranda'))
                            ->for(route('dashboard.dashboard'))
                            ->heroicon('HomeIcon')
                            ->icon('outline'),
                        Nav::item(__('Pengaturan'))
                            ->for(route('dashboard.kamen-theme.setting.index'))
                            ->heroicon('CogIcon')
                            ->icon('outline'),
                        Nav::item(__('Cadangan'))
                            ->for(route('dashboard.backup.index'))
                            ->heroicon('DatabaseIcon')
                            ->icon('outline'),
                    ],
                ),
            ];
        }, 'core');
    }
}
