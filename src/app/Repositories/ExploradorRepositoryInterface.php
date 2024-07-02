<?php


namespace App\Repositories;

use App\DTO\{CreateExploradorDTO, UpdateExploradorDTO};
use stdClass;

interface ExploradorRepositoryInterface{
    public function getAll(string $filter = null):array;
    public function findOne(string $id):stdClass|null;
    public function delete(string $id):void;
    public function new(CreateExploradorDTO $dto):stdClass;
    public function update(UpdateExploradorDTO $dto):stdClass|null;
}