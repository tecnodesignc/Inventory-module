<?php

namespace Modules\Inventary\Repositories\Cache;

use Modules\Inventary\Repositories\ProductRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProductDecorator extends BaseCacheDecorator implements ProductRepository
{
    public function __construct(ProductRepository $product)
    {
        parent::__construct();
        $this->entityName = 'inventary.products';
        $this->repository = $product;
    }
}
