<?php

namespace App\Services;

use App\Repositories\ItemRepositoryInterface;
use App\DTO\CreateItemDTO;
use App\DTO\UpdateItemDTO;
use stdClass;

class ItemService
{
    protected $repository;

    public function __construct(ItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function create(CreateItemDTO $dto): stdClass
    {
        return $this->repository->create($dto);
    }

    public function update(UpdateItemDTO $dto): ?stdClass
    {
        return $this->repository->update($dto);
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
