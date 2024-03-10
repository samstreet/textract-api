<?php

namespace TextractApi\Core\Storage\Concerns;

use Illuminate\Database\Eloquent\Model;

trait HasEntity
{
    private Model $entity;

    public function getEntity(): Model
    {
        return $this->entity;
    }

    public function setEntity(Model $entity): Model
    {
        $this->entity = $entity;

        return $this->entity;
    }
}
