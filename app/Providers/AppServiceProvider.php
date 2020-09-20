<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

use App\Models\Site;

use Cache;

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
        Builder::defaultStringLength(191);
        if (Schema::hasTable('site')) {
            Cache::forever('setting', Site::first());
        }
        Paginator::useBootstrap();
    }
}
