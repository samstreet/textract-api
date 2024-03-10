<?php

namespace TextractApi\Core\Storage\Repository;

use Illuminate\Support\Arr;
use TextractApi\Core\Storage\Concerns;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    use Concerns\HasEntity;

    public function create(array $attributes = []): Model
    {
        $modelAttributes = $this->getEntity()->getFillable();
        $only = Arr::only($attributes, $modelAttributes);

        $model = $this->getEntity();

        return (new $model())->fill($only);
    }

    public function deleteMany(array $records): void
    {
        foreach ($records as $record) {
            $this->delete($record);
        }
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    public function findUsingId(int $value): Model
    {
        return $this->builder()->findOrFail($value);
    }

    public function builder(): Builder
    {
        return $this->getEntity()->newQuery();
    }

    public function getFillableAttributes(array $parameters): array
    {
        return $this->getEntity()->getFillable();
    }

    public function save(Model $model): bool
    {
        return $model->save();
    }

    public function patch(Model $model, array $attributes): Model
    {
        $modelAttributes = $model->getFillable();
        $only = Arr::only($attributes, $modelAttributes);

        $model->fill($only);

        return $model;
    }

    public function updateOrCreate(Model $model, array $attributes, array $values): Model
    {
        $modelAttributes = $model->getFillable();
        $only = Arr::only($values, $modelAttributes);

        $model->updateOrCreate($attributes, $only);

        return $model;
    }
}
