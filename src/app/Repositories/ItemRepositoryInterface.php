<?php

namespace App\Repositories;

use App\DTO\CreateItemDTO;
use App\DTO\UpdateItemDTO;
use stdClass;

interface ItemRepositoryInterface
{
    public function getAll(string $filter = null): array;

    public function findOne(string $id): ?stdClass;

    public function delete(string $id): void;

    public function create(CreateItemDTO $dto): stdClass;

    public function update(UpdateItemDTO $dto): ?stdClass;
}
