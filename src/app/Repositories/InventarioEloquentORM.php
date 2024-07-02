<?php

namespace App\Repositories;

use App\Models\Inventario;
use App\Repositories\InventarioRepositoryInterface;
use App\DTO\CreateInventarioDTO;
use App\DTO\UpdateInventarioDTO;
use stdClass;

class InventarioEloquentORM implements InventarioRepositoryInterface
{
    

    public function __construct(protected Inventario $model)
    {
        $this->model = $model;
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->all()->toArray();
    }

    public function findOne(string $id): ?stdClass
    {
        $inventario = $this->model->find($id);
        if (!$inventario) {
            return null;
        }
        return (object) $inventario->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateInventarioDTO $dto): stdClass
    {
        $inventario = $this->model->create((array) $dto);

        return (object) $inventario->toArray();
    }

    public function update(UpdateInventarioDTO $dto): ?stdClass
    {
        if (!$inventario = $this->model->find($dto->id)) {
            return null;
        }
        $inventario->update((array) $dto);

        return (object) $inventario->toArray();
    }
}
