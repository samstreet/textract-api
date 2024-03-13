<?php

namespace App\Bridge\DTO\Integrations\AWS;

use TextractAPI\Core\Bridge\DTO\ImmutableDTO;
use TextractApi\Core\Storage\Entity\Uploads;

class TextractProcessDocumentDTO extends ImmutableDTO
{
    public function __construct(private readonly Uploads $upload, private readonly string $pdf)
    {
    }

    public function getUpload(): Uploads
    {
        return $this->upload;
    }

    public function getPdf(): string
    {
        return $this->pdf;
    }

}