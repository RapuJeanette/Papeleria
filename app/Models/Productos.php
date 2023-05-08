<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'precio','id_categoria','imagen_url',
    ];

    public function categoria()
    {
        return $this->hasOne('App\Models\Categorias', 'id', 'id_categoria');
    }
}
