<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizar extends Model
{
    use HasFactory;

    protected $table = 'cotizacion';
    protected $primaryKey = 'idCotizacion';
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

}
