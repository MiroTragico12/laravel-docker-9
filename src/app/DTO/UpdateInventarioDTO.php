<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateInventario;

class UpdateInventarioDTO
{
    public function __construct(
        public string $id,
        public int $explorador_id
    ) {}

    public static function makeFromRequest(StoreUpdateInventario $request): self
    {
        return new self(
            $request->id,
            $request->explorador_id
        );
    }
}
