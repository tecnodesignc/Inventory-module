<?php

namespace Modules\Inventory\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Inventory\Events\Handlers\RegisterInventorySidebar;

class InventoryServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterInventorySidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('products', array_dot(trans('inventory::products')));
            $event->load('accounts', array_dot(trans('inventory::accounts')));
            $event->load('transactions', array_dot(trans('inventory::transactions')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('inventory', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Inventory\Repositories\ProductRepository',
            function () {
                $repository = new \Modules\Inventory\Repositories\Eloquent\EloquentProductRepository(new \Modules\Inventory\Entities\Product());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Inventory\Repositories\Cache\CacheProductDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Inventory\Repositories\AccountRepository',
            function () {
                $repository = new \Modules\Inventory\Repositories\Eloquent\EloquentAccountRepository(new \Modules\Inventory\Entities\Account());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Inventory\Repositories\Cache\CacheAccountDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Inventory\Repositories\TransactionRepository',
            function () {
                $repository = new \Modules\Inventory\Repositories\Eloquent\EloquentTransactionRepository(new \Modules\Inventory\Entities\Transaction());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Inventory\Repositories\Cache\CacheTransactionDecorator($repository);
            }
        );
// add bindings




    }
}
