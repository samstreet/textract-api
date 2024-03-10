<?php

namespace TextractApi\Core\Services\Interfaces;

use TextractApi\Core\Storage\Repository\RepositoryInterface;

interface CoreServiceInterface
{
    public function getRepository();

    public function setRepository(RepositoryInterface $repository): void;
}
