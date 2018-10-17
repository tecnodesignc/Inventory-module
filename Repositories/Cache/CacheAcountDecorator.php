<?php

namespace Modules\Inventary\Repositories\Cache;

use Modules\Inventary\Repositories\AcountRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAcountDecorator extends BaseCacheDecorator implements AcountRepository
{
    public function __construct(AcountRepository $acount)
    {
        parent::__construct();
        $this->entityName = 'inventary.acounts';
        $this->repository = $acount;
    }
}
