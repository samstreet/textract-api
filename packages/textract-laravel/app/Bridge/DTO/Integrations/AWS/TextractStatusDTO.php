<?php

namespace App\Bridge\DTO\Integrations\AWS;

use TextractAPI\Core\Bridge\DTO\ImmutableDTO;

class TextractStatusDTO extends ImmutableDTO implements \JsonSerializable
{
    public function __construct(private readonly string $status, private readonly string $uuid)
    {
    }

    public function getUploadStatus(): string
    {
        return $this->status;
    }

    public function getUploadUUID(): string
    {
        return $this->uuid;
    }

    public function jsonSerialize(): array
    {
        return [
            'uuid' => $this->getUploadUUID(),
            'status' => $this->getUploadStatus(),
        ];
    }
}
