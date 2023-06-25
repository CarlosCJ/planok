<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizarProducto extends Model
{
    use HasFactory;

    protected $table = "cotizacion_producto";
    protected $primaryKey = "idCotizacionProducto";
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    public function quote()
    {
        return $this->belongsTo(Cotizacion::class, 'idCotizacion');
    }

    public function customers()
    {
        return $this->belongsToMany(Cliente::class, 'cotizacion_producto', 'idProducto', 'idCliente');
    }

}
