<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Usuario;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfil';
    protected $primaryKey = 'idPerfil';
    public $timestamps = false;

    public function users(): HasMany
    {
        return $this->hasMany(Usuario::class, 'idPerfil', 'iPerfil');
    }
}
