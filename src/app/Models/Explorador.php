<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explorador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'idade',
        'localizazao_id',
        'inventario_id'
    ];

    public function hasLocalizacao(){
        return $this->hasMany(Localizacao::class);
    }
}
