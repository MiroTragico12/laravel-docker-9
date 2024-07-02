<?php

namespace App\Repositories;

use App\DTO\{CreateInventarioDTO, UpdateInventarioDTO};
use stdClass;

interface InventarioRepositoryInterface
{
    public function getAll(string $filter = null): array;

    public function findOne(string $id): ?stdClass;

    public function delete(string $id): void;

    public function new(CreateInventarioDTO $dto): stdClass;

    public function update(UpdateInventarioDTO $dto): ?stdClass;
}
