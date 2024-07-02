<?php

namespace App\Services;

use App\Repositories\LocalizacaoRepositoryInterface;
use stdClass;

class LocalizacaoService
{
    protected $repository;

    public function __construct(LocalizacaoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function create(array $data): stdClass
    {
        return $this->repository->create($data);
    }

    public function update(array $data,string $id): ?stdClass
    {
        return $this->repository->update($data, $id);
    }

    public function findOne(string $id): ?stdClass
    {
        return $this->repository->findOne($id);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
