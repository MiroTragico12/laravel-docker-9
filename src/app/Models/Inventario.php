<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = ['explorador_id'];

    public function explorador()
    {
        return $this->belongsTo(Explorador::class);
    }

    public function itens()
    {
        return $this->hasMany(Item::class);
    }
}
