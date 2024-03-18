<?php

namespace MicroService\App\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;
use MicroService\App\Contracts\ItemServiceContract;
use MicroService\App\Contracts\StockServiceContract;
use MicroService\App\Services\ItemService;
use MicroService\App\Services\StockService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Factory::guessFactoryNamesUsing(function ($class) {
            return 'Database\\Factories\\' . class_basename($class) . 'Factory';
        });

        $this->app->bind(ItemServiceContract::class, ItemService::class);
        $this->app->bind(StockServiceContract::class, StockService::class);
    }
}
