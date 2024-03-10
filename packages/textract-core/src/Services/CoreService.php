<?php

namespace TextractApi\Core\Services;

use TextractApi\Core\Services\Interfaces\CoreServiceInterface;
use TextractApi\Core\Storage\Repository\RepositoryInterface;

/**
 * @property RepositoryInterface $repository
 */
abstract class CoreService implements CoreServiceInterface
{
    public function getRepository()
    {
        return $this->repository;
    }

    public function setRepository(RepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }
}
