<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/inventary'], function (Router $router) {
    $router->group(['prefix' =>'/accounts'], function (Router $router) {
        $router->bind('aaccount', function ($id) {
            return app('Modules\Inventary\Repositories\AccountRepository')->find($id);
        });
        $router->get('/', [
            'as' => 'admin.inventary.account.index',
            'uses' => 'AccountController@index',

        ]);
        $router->get('{aaccounts}', [
            'as' => 'admin.inventary.account.show',
            'uses' => 'AccountController@show',
           // 'middleware' => 'can:inventary.accounts.create'
        ]);
        $router->post('/', [
            'as' => 'admin.inventary.account.store',
            'uses' => 'AccountController@store',
           // 'middleware' => 'can:inventary.accounts.edit'
        ]);
        $router->put('{aaccounts}', [
            'as' => 'admin.inventary.account.update',
            'uses' => 'AccountController@update',
            'middleware' => 'auth:api'
        ]);
        $router->delete('{aaccounts}', [
            'as' => 'admin.inventary.account.destroy',
            'uses' => 'AccountController@delete',
            //'middleware' => 'can:inventary.accounts.destroy'
        ]);
    });

});
