<?php

namespace TextractApi\Core\Services\Interfaces;

use TextractApi\Core\Storage\Repository\CoreRepositoryInterface;

interface CoreServiceInterface
{
    public function getRepository();

    public function setRepository(CoreRepositoryInterface $repository): void;
}
