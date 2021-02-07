<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Observers\UserObserver;
use App\User;
use App\View\Components\Admin\PageHead;
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
        User::observe(UserObserver::class);
        JsonResource::withoutWrapping();
    }
}
