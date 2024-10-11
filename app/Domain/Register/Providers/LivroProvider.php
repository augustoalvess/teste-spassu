<?php

namespace App\Domain\Register\Providers;

use App\Domain\Register\Services\AssuntoService;
use App\Domain\Register\Services\AutorService;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LivroProvider extends ServiceProvider
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
        View::composer([
            'components.register.livros.livros-form'
        ], function ($view) use ($request) {
            $view->autores = AutorService::list();
            $view->assuntos = AssuntoService::list();
        });
    }
}
