<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function quotes()
    {
        return $this->hasMany(Cotizar::class, 'idCliente', 'idCliente');
    }
}
