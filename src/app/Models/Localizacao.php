<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    use HasFactory;

    protected $table = 'localizacoes';
    protected $fillable = ['latitude', 'longitude', 'explorador_id'];

    public function explorador()
    {
        return $this->belongsTo(Explorador::class);
    }

    public function itens()
    {
        return $this->hasOne(Item::class);
    }

}
