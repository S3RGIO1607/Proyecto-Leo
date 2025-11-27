<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposProductos extends Model
{
    protected $fillable = ['nombre','descripcion'];

    public function productos()
    {
        return $this->hasMany(Productos::class);
    }
}