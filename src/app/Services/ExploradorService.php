<?php

namespace App\Services;

use App\Models\Trocas;
use App\Repositories\ExploradorRepositoryInterface;
use App\DTO\CreateExploradorDTO;
use App\DTO\UpdateExploradorDTO;
use App\Models\Explorador;

use Illuminate\Support\Facades\DB;
use stdClass;

class ExploradorService{
    

    protected $repository;
    public function __construct(ExploradorRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function getAll(string $filter = null):array{
        return $this->repository->getAll($filter);
    }

    public function new(CreateExploradorDTO $dto):stdClass{
        return $this->repository->new($dto);
    }

    public function update(UpdateExploradorDTO $dto):stdClass{
        return $this->repository->update($dto);
    }

    public function findOne(string $id):stdClass|null{
        return $this->repository->findOne($id);
    }

    public function delete(string $id){
        return $this->repository->delete($id);
    }
}