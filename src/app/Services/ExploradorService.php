<?php

namespace Src\App\Services;
use Src\App\DTO\CreateExploradorDTO;
use stdClass;

class ExploradorService{
    
    protected $repository;
    public function __construct()
    {

    }

    public function getAll(string $filter = null):array{
        return $this->repository->getAll($filter);
    }

    public function new(CreateExploradorDTO $dto):stdClass{
        return $this->repository->new($dto);
    }

    public function update(string $id, string $nome,int $idade):stdClass{
        return $this->repository->update($id,$nome, $idade);
    }

    public function findOne(string $id):stdClass|null{
        return $this->repository->findOne($id);
    }

    public function delete(string $id):void{
        return $this->repository->delete();
    }
}