<?php

namespace App\DTO;

use Illuminate\Http\Request;

class UpdateItemDTO
{
    public function __construct(
        public int $id,
        public string $nome,
        public float $valor,
        public int $inventario_id,
        public int $localizacao_id,
        public int $explorador_id
    ) {}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->input('id'),
            $request->input('nome'),
            $request->input('valor'),
            $request->input('inventario_id'),
            $request->input('localizacao_id'),
            $request->input('explorador_id')
        );
    }
}
