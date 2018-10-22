<?php

namespace Modules\Inventary\Repositories\Cache;

use Modules\Inventary\Repositories\AccountRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAccountDecorator extends BaseCacheDecorator implements AccountRepository
{
    public function __construct(AccountRepository $account)
    {
        parent::__construct();
        $this->entityName = 'inventary.accounts';
        $this->repository = $account;
    }
}
