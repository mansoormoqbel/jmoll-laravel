<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use  App\Http\Middleware\CheckBanned;
use  App\Http\Middleware\CheckTypeUesr;
use  App\Http\Middleware\Auther;
use Illuminate\Foundation\Http\Middleware\MiddlewarePriority;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(CheckBanned::class);
        $middleware->append( CheckTypeUesr::class);
        //$middleware->append(Illuminate\Session\Middleware\StartSession::class);
       
        /* $middleware->use([
            // \Illuminate\Http\Middleware\TrustHosts::class,
            
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            //\Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            //\Illuminate\Routing\Middleware\SubstituteBindings::class
        ]); */
       
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
