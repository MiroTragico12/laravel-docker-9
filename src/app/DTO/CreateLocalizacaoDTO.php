<?php

namespace App\DTO;

use Illuminate\Http\Request;

class CreateLocalizacaoDTO
{
    public function __construct(
        public string $latitude,
        public string $longitude,
        public int $explorador_id
    ) {}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->input('latitude'),
            $request->input('longitude'),
            $request->input('explorador_id')
        );
    }
}
