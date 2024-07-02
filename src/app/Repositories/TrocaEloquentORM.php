<?php

namespace App\Repositories;

use App\Models\Trocas;
use stdClass;

class TrocaEloquentORM implements TrocaRepositoryInterface
{
    protected Trocas $model;

    public function __construct(Trocas $model)
    {
        $this->model = $model;
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->all()->toArray();
    }

    public function findOne(string $id): ?stdClass
    {
        $troca = $this->model->find($id);
        if (!$troca) {
            return null;
        }
        return (object) $troca->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function create(array $data): stdClass
    {
        $troca = $this->model->create($data);
        return (object) $troca->toArray();
    }

    public function update(array $data, string $id): ?stdClass
    {
        $troca = $this->model->find($id);

        if (!$troca) {
            return null;
        }

        $troca->update($data);

        return (object) $troca->toArray();
    }
}
