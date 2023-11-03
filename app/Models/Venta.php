<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'fecha', 'cliente',
    ];

    public function detallesVenta()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
