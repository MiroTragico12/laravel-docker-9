<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'explorador_id',
        'item_id'
    ];

    public function hasItens(){
        return $this->hasMany(Item::class);
    }
}
