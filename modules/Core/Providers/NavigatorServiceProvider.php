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
                        Nav::item(__('Dashboard'))
                            ->for(route('dashboard.dashboard'))
                            ->heroicon('HomeIcon')
                            ->icon('outline'),

                        Nav::item(__('Api Docs'))
                            ->for('/api/documentation')
                            ->heroicon('DocumentTextIcon')
                            ->icon('outline'),

                        Nav::item(__('Setting'))
                            ->for(route('dashboard.setting'))
                            ->heroicon('CogIcon')
                            ->icon('outline'),
                    ],
                ),
            ];
        }, 'core');
    }
}
