<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/inventory'], function (Router $router) {
    $router->group(['prefix' =>'/accounts'], function (Router $router) {
        $router->bind('aaccount', function ($id) {
            return app('Modules\Inventory\Repositories\AccountRepository')->find($id);
        });
        $router->get('/', [
            'as' => 'admin.inventory.account.index',
            'uses' => 'AccountController@index',

        ]);
        $router->get('{aaccounts}', [
            'as' => 'admin.inventory.account.show',
            'uses' => 'AccountController@show',
           // 'middleware' => 'can:inventory.accounts.create'
        ]);
        $router->post('/', [
            'as' => 'admin.inventory.account.store',
            'uses' => 'AccountController@store',
           // 'middleware' => 'can:inventory.accounts.edit'
        ]);
        $router->put('{aaccounts}', [
            'as' => 'admin.inventory.account.update',
            'uses' => 'AccountController@update',
            'middleware' => 'auth:api'
        ]);
        $router->delete('{aaccounts}', [
            'as' => 'admin.inventory.account.destroy',
            'uses' => 'AccountController@delete',
            //'middleware' => 'can:inventory.accounts.destroy'
        ]);
    });

});
