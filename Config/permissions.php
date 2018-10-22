<?php

return [
    'inventory.products' => [
        'index' => 'inventory::products.list resource',
        'create' => 'inventory::products.create resource',
        'edit' => 'inventory::products.edit resource',
        'destroy' => 'inventory::products.destroy resource',
    ],
    'inventory.accounts' => [
        'index' => 'inventory::accounts.list resource',
        'create' => 'inventory::accounts.create resource',
        'edit' => 'inventory::accounts.edit resource',
        'destroy' => 'inventory::accounts.destroy resource',
    ],
    'inventory.transactions' => [
        'index' => 'inventory::transactions.list resource',
        'create' => 'inventory::transactions.create resource',
        'edit' => 'inventory::transactions.edit resource',
        'destroy' => 'inventory::transactions.destroy resource',
    ],

// append




];
