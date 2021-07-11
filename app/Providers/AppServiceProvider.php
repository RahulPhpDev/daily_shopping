<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Observers\UserObserver;
use App\User;
use App\View\Components\Admin\PageHead;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Relations\Relation;

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
         Schema::defaultStringLength(191);
        Blade::component('page-head', PageHead::class);
        User::observe(UserObserver::class);
        Product::observe( ProductObserver::class );
        JsonResource::withoutWrapping();

        Relation::morphMap([
           'product' => 'App\Models\Product',
           'productAttribute' => 'App\Models\ProductAttribute'
        ]);
    }
}
