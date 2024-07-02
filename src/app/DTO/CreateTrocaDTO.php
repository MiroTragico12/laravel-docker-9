<?php

namespace App\DTO;

use Illuminate\Http\Request;

class CreateTrocaDTO
{
    public function __construct(
        public int $explorador1_id,
        public int $explorador2_id,
        public int $item1_id,
        public int $item2_id
    ) {}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->input('explorador1_id'),
            $request->input('explorador2_id'),
            $request->input('item1_id'),
            $request->input('item2_id')
        );
    }
}
