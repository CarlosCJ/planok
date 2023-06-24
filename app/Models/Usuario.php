<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function profile()
    {
        return $this->belongsTo(Perfil::class, 'idPerfil');
    }

    public function quotes()
    {
        return $this->hasMany(Cotizar::class, 'idUsuario', 'idUsuario');
    }
}
