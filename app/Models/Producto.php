<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey = 'idProducto';
    public $timestamps = false;

    public function typeProduct()
    {
        return $this->belongsTo(TipoProducto::class, 'idTipoProducto');
    }

    public function quotes()
    {
        return $this->hasMany(CotizarProducto::class, 'idProducto');
    }
}
