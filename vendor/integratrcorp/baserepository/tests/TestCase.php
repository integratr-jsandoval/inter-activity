<?php

namespace Integratrcorp\Baserepository\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    use WithFaker, WithoutMiddleware;
    /**
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['Integratrcorp\Baserepository\ServiceProvider'];
    }
}
