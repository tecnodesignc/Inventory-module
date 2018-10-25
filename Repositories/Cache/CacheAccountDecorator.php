<?php

namespace Modules\Inventory\Repositories\Cache;

use Modules\Inventory\Repositories\AccountRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAccountDecorator extends BaseCacheDecorator implements AccountRepository
{
    public function __construct(AccountRepository $account)
    {
        parent::__construct();
        $this->entityName = 'inventory.accounts';
        $this->repository = $account;
    }
}
