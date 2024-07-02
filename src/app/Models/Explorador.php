<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explorador extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome', 'idade'];

  
    public function historicoLocalizacoes()
    {
        return $this->hasMany(Localizacao::class);
    }

    
    public function inventario()
    {
        return $this->hasOne(Inventario::class);
    }
}
