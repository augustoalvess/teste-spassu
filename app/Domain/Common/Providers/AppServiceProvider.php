<?php

namespace App\Domain\Common\Providers;

use App\Domain\Common\Services\MenuService;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(Dispatcher $events, Request $request)
    {
        View::composer('layouts.layout', function ($view) use ($request) {
            $view->menu = MenuService::menu();
            $view->breadcrumb = $request->segments();
        });
        View::composer('*', function ($view) use ($request) {
            $view->breadcrumb = $request->segments();
        });
    }
}
