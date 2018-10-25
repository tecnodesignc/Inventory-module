<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/inventory'], function (Router $router) {
    $router->bind('product', function ($id) {
        return app('Modules\Inventory\Repositories\ProductRepository')->find($id);
    });
    $router->get('products', [
        'as' => 'admin.inventory.product.index',
        'uses' => 'ProductController@index',
        'middleware' => 'can:inventory.products.index'
    ]);
    $router->get('products/create', [
        'as' => 'admin.inventory.product.create',
        'uses' => 'ProductController@create',
        'middleware' => 'can:inventory.products.create'
    ]);
    $router->post('products', [
        'as' => 'admin.inventory.product.store',
        'uses' => 'ProductController@store',
        'middleware' => 'can:inventory.products.create'
    ]);
    $router->get('products/{product}/edit', [
        'as' => 'admin.inventory.product.edit',
        'uses' => 'ProductController@edit',
        'middleware' => 'can:inventory.products.edit'
    ]);
    $router->put('products/{product}', [
        'as' => 'admin.inventory.product.update',
        'uses' => 'ProductController@update',
        'middleware' => 'can:inventory.products.edit'
    ]);
    $router->delete('products/{product}', [
        'as' => 'admin.inventory.product.destroy',
        'uses' => 'ProductController@destroy',
        'middleware' => 'can:inventory.products.destroy'
    ]);
    $router->bind('account', function ($id) {
        return app('Modules\Inventory\Repositories\AccountRepository')->find($id);
    });
    $router->get('accounts', [
        'as' => 'admin.inventory.account.index',
        'uses' => 'AccountController@index',
        'middleware' => 'can:inventory.accounts.index'
    ]);
    $router->get('accounts/create', [
        'as' => 'admin.inventory.account.create',
        'uses' => 'AccountController@create',
        'middleware' => 'can:inventory.accounts.create'
    ]);
    $router->post('accounts', [
        'as' => 'admin.inventory.account.store',
        'uses' => 'AccountController@store',
        'middleware' => 'can:inventory.accounts.create'
    ]);
    $router->get('accounts/{account}/edit', [
        'as' => 'admin.inventory.account.edit',
        'uses' => 'AccountController@edit',
        'middleware' => 'can:inventory.accounts.edit'
    ]);
    $router->put('accounts/{account}', [
        'as' => 'admin.inventory.account.update',
        'uses' => 'AccountController@update',
        'middleware' => 'can:inventory.accounts.edit'
    ]);
    $router->delete('accounts/{account}', [
        'as' => 'admin.inventory.account.destroy',
        'uses' => 'AccountController@destroy',
        'middleware' => 'can:inventory.accounts.destroy'
    ]);
    $router->bind('transaction', function ($id) {
        return app('Modules\Inventory\Repositories\TransactionRepository')->find($id);
    });
    $router->get('transactions', [
        'as' => 'admin.inventory.transaction.index',
        'uses' => 'TransactionController@index',
        'middleware' => 'can:inventory.transactions.index'
    ]);
    $router->get('transactions/create', [
        'as' => 'admin.inventory.transaction.create',
        'uses' => 'TransactionController@create',
        'middleware' => 'can:inventory.transactions.create'
    ]);
    $router->post('transactions', [
        'as' => 'admin.inventory.transaction.store',
        'uses' => 'TransactionController@store',
        'middleware' => 'can:inventory.transactions.create'
    ]);
    $router->get('transactions/{transaction}/edit', [
        'as' => 'admin.inventory.transaction.edit',
        'uses' => 'TransactionController@edit',
        'middleware' => 'can:inventory.transactions.edit'
    ]);
    $router->put('transactions/{transaction}', [
        'as' => 'admin.inventory.transaction.update',
        'uses' => 'TransactionController@update',
        'middleware' => 'can:inventory.transactions.edit'
    ]);
    $router->delete('transactions/{transaction}', [
        'as' => 'admin.inventory.transaction.destroy',
        'uses' => 'TransactionController@destroy',
        'middleware' => 'can:inventory.transactions.destroy'
    ]);
// append




});
