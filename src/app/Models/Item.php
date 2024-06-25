<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor',
        'inventario_id',
        'localizacao_id',
        'explorador_id'
    ];
}
