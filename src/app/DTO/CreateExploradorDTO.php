<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateExplorador;

Class CreateExploradorDTO{

public function __construct(
    public string $name,
    public int $idade,
){}

public static function makeFromRequest(StoreUpdateExplorador $request){
    return new self(
        $request->nome,
        $request->idade
    );
}

}