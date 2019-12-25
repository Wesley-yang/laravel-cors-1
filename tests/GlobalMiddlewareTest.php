<?php

namespace Fruitcake\Cors\Tests;

use Fruitcake\Cors\HandleCors;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class GlobalMiddlewareTest extends AbstractTest
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Add the middleware
        /** @var Kernel $kernel */
        $kernel = $app->make(Kernel::class);
        $kernel->prependMiddleware(HandleCors::class);

        Route::group([], __DIR__ . '/routes/web.php');
        Route::group([], __DIR__ . '/routes/api.php');

        parent::getEnvironmentSetUp($app);
    }
}
