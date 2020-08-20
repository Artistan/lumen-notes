<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        $this->app = require __DIR__.'/../bootstrap/app.php';
        $this->disableExceptionHandling();
        return $this->app;
    }

    /**
     * To show the phpunit/dusk exceptions
     */
    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}

            public function report(\Throwable $e)
            {
                // no-op
            }

            public function render($request, \Throwable $e) {
                throw $e;
            }
        });
    }
}
