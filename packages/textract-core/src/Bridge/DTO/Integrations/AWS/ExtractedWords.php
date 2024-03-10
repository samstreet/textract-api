<?php

namespace TextractAPI\Core\Bridge\DTO\Integrations\AWS;

use TextractAPI\Core\Bridge\DTO\CollectableDTO;
use TextractApi\Core\Storage\Entity\UploadContent;

class ExtractedWords extends CollectableDTO
{
    public function __construct(UploadContent ...$uploadedContent)
    {
        /** @var UploadContent[] $list */
        $this->list = $uploadedContent;
    }
}
