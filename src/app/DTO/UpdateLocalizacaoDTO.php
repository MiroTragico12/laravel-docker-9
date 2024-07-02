<?php

namespace App\DTO;

use Illuminate\Http\Request;

class UpdateLocalizacaoDTO
{
    public function __construct(
        public int $id,
        public string $latitude,
        public string $longitude,
        public int $explorador_id
    ) {}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->input('id'),
            $request->input('latitude'),
            $request->input('longitude'),
            $request->input('explorador_id')
        );
    }
}
