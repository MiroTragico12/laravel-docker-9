<?php

namespace App\Repositories;

use App\Models\Explorador;
use App\Repositories\ExploradorRepositoryInterface;
use App\DTO\CreateExploradorDTO;
use App\DTO\UpdateExploradorDTO;
use stdClass;

class ExploradorEloquentORM implements ExploradorRepositoryInterface{
   
    public function __construct(protected Explorador $model){

    }

    public function getAll(string $filter = null):array{
        return $this->model->all()->toArray();
    }
    public function findOne(string $id):stdClass|null{
        $explorador = $this->model->find($id);
        if(!$explorador){
            return null;
        }
        return (object) $explorador->toArray();

    }
    public function delete(string $id):void{
        $this->model->findOrFail($id)->delete();
    }
    public function new(CreateExploradorDTO $dto):stdClass{
        
        $explorador = $this->model->create((array)$dto);
        
        return (object)$explorador->toArray();
    }
    public function update(UpdateExploradorDTO $dto):stdClass|null{
        if(!$explorador = $this->model->find($dto->id)){
            return null;
        }
        $explorador->update((array)$dto);

        return(object)$explorador->toArray();
    }
}