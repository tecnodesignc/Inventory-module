<?php

namespace Modules\Inventary\Repositories\Cache;

use Modules\Inventary\Repositories\TransationRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTransationDecorator extends BaseCacheDecorator implements TransationRepository
{
    public function __construct(TransationRepository $transation)
    {
        parent::__construct();
        $this->entityName = 'inventary.transations';
        $this->repository = $transation;
    }
}
