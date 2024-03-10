<?php

namespace TextractAPI\Core\Storage\Repository\Integrations\AWS;

use TextractApi\Core\Storage\Entity\Uploads;
use TextractApi\Core\Storage\Repository\CoreRepository;

class TextractIntegrationRepository extends CoreRepository implements TextractIntegrationRepositoryInterface
{
    public function __construct(Uploads $entity)
    {
        $this->setEntity($entity);
    }
}
