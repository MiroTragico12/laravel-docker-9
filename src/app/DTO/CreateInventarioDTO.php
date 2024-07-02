<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateInventario;

class CreateInventarioDTO
{
    public function __construct(
        public int $explorador_id
    ) {}

    public static function makeFromRequest(StoreUpdateInventario $request): self
    {
        return new self(
            $request->explorador_id
        );
    }
}
