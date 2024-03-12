<?php

namespace App\Bridge\DTO\Integrations\AWS;

use TextractAPI\Core\Bridge\DTO\ImmutableDTO;
use TextractApi\Core\Storage\Entity\Uploads;

class TextractUploadDTO extends ImmutableDTO implements \JsonSerializable
{
    public function __construct(private readonly Uploads $upload)
    {
    }

    public function getUploadStatus(): string
    {
        return $this->upload->status;
    }

    public function getUploadUUID(): string
    {
        return $this->upload->uuid;
    }

    public function jsonSerialize(): array
    {
        return [
            'uuid' => $this->getUploadUUID(),
            'status' => $this->getUploadStatus(),
        ];
    }
}
