<?php

namespace App\Repositories;

use stdClass;

interface LocalizacaoRepositoryInterface
{
    /**
     * 
     *
     * @param string|null $filter
     * @return array
     */
    public function getAll(string $filter = null): array;

    /**
     * 
     *
     * @param string $id
     * @return stdClass|null
     */
    public function findOne(string $id): ?stdClass;

    /**
     *
     *
     * @param string $id
     * @return void
     */
    public function delete(string $id): void;

    /**
     * 
     *
     * @param array $data
     * @return stdClass
     */
    public function create(array $data): stdClass;

    /**
     * 
     *
     * @param array $data
     * @param string $id
     * @return stdClass|null
     */
    public function update(array $data, string $id): ?stdClass;
}
