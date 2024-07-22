<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\http\middleware\authCheck;
use App\http\middleware\alreadyLoggedIn;
use Illuminate\Session\Middleware\StartSession;
use App\http\middleware\apiAuth;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('web',

            authCheck::class,
            alreadyLoggedIn::class,
            apiAuth::class,
        );

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
