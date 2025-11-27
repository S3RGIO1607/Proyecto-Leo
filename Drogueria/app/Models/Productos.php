<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = ['nombre','sku','tipos_productos_id','precio','stock','descripcion'];

    public function tipo() {
        return $this->belongsTo(TiposProductos::class, 'tipos_productos_id');
    }
}
