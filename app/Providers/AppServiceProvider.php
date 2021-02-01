<?php

namespace App\Providers;

use App\View\Components\Admin\PageHead;
use App\View\Components\admin\SidebarNavigation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('page-head', PageHead::class);
    }
}
