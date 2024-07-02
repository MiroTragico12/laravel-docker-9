<?php

namespace App\Repositories;

use App\Models\Localizacao;
use stdClass;

class LocalizacaoEloquentORM implements LocalizacaoRepositoryInterface
{
    protected Localizacao $model;

    public function __construct(Localizacao $model)
    {
        $this->model = $model;
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->all()->toArray();
    }

    public function findOne(string $id): ?stdClass
    {
        $localizacao = $this->model->find($id);
        if (!$localizacao) {
            return null;
        }
        return (object) $localizacao->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function create(array $data): stdClass
    {
        $localizacao = $this->model->create($data);
        return (object) $localizacao->toArray();
    }

    public function update(array $data, string $id): ?stdClass
    {
        $localizacao = $this->model->find($id);
    
        if (!$localizacao) {
            return null; 
        }
    
        $localizacao->update($data); 
    
        return (object) $localizacao->toArray(); 
    }
}
