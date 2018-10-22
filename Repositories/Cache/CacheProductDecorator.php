<?php

namespace Modules\Inventory\Repositories\Cache;

use Modules\Inventory\Repositories\ProductRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProductDecorator extends BaseCacheDecorator implements ProductRepository
{
    public function __construct(ProductRepository $product)
    {
        parent::__construct();
        $this->entityName = 'inventory.products';
        $this->repository = $product;
    }
}
