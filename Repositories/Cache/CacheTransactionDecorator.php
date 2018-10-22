<?php

namespace Modules\Inventory\Repositories\Cache;

use Modules\Inventory\Repositories\TransactionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTransactionDecorator extends BaseCacheDecorator implements TransactionRepository
{
    public function __construct(TransactionRepository $transaction)
    {
        parent::__construct();
        $this->entityName = 'inventory.transactions';
        $this->repository = $transaction;
    }
}
