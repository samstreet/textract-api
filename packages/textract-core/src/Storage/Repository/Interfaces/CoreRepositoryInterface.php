<?php

namespace TextractApi\Core\Storage\Repository\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface CoreRepositoryInterface
{
    public function builder(): Builder;

    public function create(array $attributes = []): Model;

    public function delete(Model $model): bool;

    public function deleteMany(array $records): void;

    public function findUsingId(int $value): Model;

    public function findUsingUUID(string $uuid): Model;

    public function getFillableAttributes(array $parameters): array;

    public function save(Model $model): bool;

    public function patch(Model $model, array $attributes): Model;

    public function updateOrCreate(Model $model, array $attributes, array $values): Model;
}
