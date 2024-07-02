<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateExplorador;

Class UpdateExploradorDTO{

public function __construct(
    public string $id,
    public string $name,
    public int $idade,
){}

public static function makeFromRequest(StoreUpdateExplorador $request){
    return new self(
        $request->id,
        $request->nome,
        $request->idade
    );
}

}