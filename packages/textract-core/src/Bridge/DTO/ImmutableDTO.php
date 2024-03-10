<?php

namespace TextractAPI\Core\Bridge\DTO;

use Exception;

class ImmutableDTO
{
    /**
     * @throws Exception
     */
    public function __set(string $name, $value): void
    {
        throw new Exception('Object is immutable');
    }

    /**
     * @throws Exception
     */
    public function __unset(string $name): void
    {
        throw new Exception('Object is immutable');
    }
}
