<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\HeaderBgComposer;
use App\Http\View\Composers\CreatedShopComposer;
use App\Http\View\Composers\UpdatedShopComposer;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.index', HeaderBgComposer::class);
        View::composer('shops.created_at', CreatedShopComposer::class);
        View::composer('shops.updated_at', UpdatedShopComposer::class);
    }
}
