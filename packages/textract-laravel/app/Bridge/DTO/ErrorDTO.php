<?php

namespace App\Bridge\DTO;

use TextractAPI\Core\Bridge\DTO\ImmutableDTO;

final class ErrorDTO extends ImmutableDTO implements \JsonSerializable
{
    public function __construct(private readonly string $error)
    {
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function jsonSerialize(): array
    {
        return [
            'error' => $this->getError()
        ];
    }
}
