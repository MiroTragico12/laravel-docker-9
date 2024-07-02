<?php

namespace App\Repositories;

use App\Models\Item;
use App\DTO\CreateItemDTO;
use App\DTO\UpdateItemDTO;
use stdClass;

class ItemEloquentORM implements ItemRepositoryInterface
{
    protected Item $model;

    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->all()->toArray();
    }

    public function findOne(string $id): ?stdClass
    {
        $item = $this->model->find($id);
        if (!$item) {
            return null;
        }
        return (object) $item->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function create(CreateItemDTO $dto): stdClass
    {
        $item = $this->model->create((array) $dto);
        return (object) $item->toArray();
    }

    public function update(UpdateItemDTO $dto): ?stdClass
    {
        $item = $this->model->find($dto->id);
        if (!$item) {
            return null;
        }
        $item->update((array) $dto);
        return (object) $item->toArray();
    }
}
