<?php

namespace Modules\Inventary\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Inventary\Events\Handlers\RegisterInventarySidebar;

class InventaryServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterInventarySidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('products', array_dot(trans('inventary::products')));
            $event->load('acounts', array_dot(trans('inventary::acounts')));
            $event->load('transaction[d[d[d[d[d[d[d[d[d[d[d[d[d[c[c[t[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[cs', array_dot(trans('inventary::transaction[d[d[d[d[d[d[d[d[d[d[d[d[d[c[c[t[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[cs')));
            // append translations



        });
    }

    public function boot()
    {
        $this->publishConfig('inventary', 'permissions');

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
            'Modules\Inventary\Repositories\ProductRepository',
            function () {
                $repository = new \Modules\Inventary\Repositories\Eloquent\EloquentProductRepository(new \Modules\Inventary\Entities\Product());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Inventary\Repositories\Cache\CacheProductDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Inventary\Repositories\AcountRepository',
            function () {
                $repository = new \Modules\Inventary\Repositories\Eloquent\EloquentAcountRepository(new \Modules\Inventary\Entities\Acount());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Inventary\Repositories\Cache\CacheAcountDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Inventary\Repositories\Transaction[D[D[D[D[D[D[D[D[D[D[D[D[D[C[C[T[C[C[C[C[C[C[C[C[C[C[C[C[C[C[C[C[CRepository',
            function () {
                $repository = new \Modules\Inventary\Repositories\Eloquent\EloquentTransaction[D[D[D[D[D[D[D[D[D[D[D[D[D[C[C[T[C[C[C[C[C[C[C[C[C[C[C[C[C[C[C[C[CRepository(new \Modules\Inventary\Entities\Transaction[D[D[D[D[D[D[D[D[D[D[D[D[D[C[C[T[C[C[C[C[C[C[C[C[C[C[C[C[C[C[C[C[C());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Inventary\Repositories\Cache\CacheTransaction[D[D[D[D[D[D[D[D[D[D[D[D[D[C[C[T[C[C[C[C[C[C[C[C[C[C[C[C[C[C[C[C[CDecorator($repository);
            }
        );
// add bindings



    }
}
