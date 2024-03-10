<?php

namespace TextractApi\Core\Services;

use TextractApi\Core\Services\Interfaces\CoreServiceInterface;
use TextractApi\Core\Storage\Repository\CoreRepositoryInterface;

/**
 * @property CoreRepositoryInterface $repository
 */
abstract class CoreService implements CoreServiceInterface
{
    public function getRepository()
    {
        return $this->repository;
    }

    public function setRepository(CoreRepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }
}
