<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'venta_id', 'producto', 'cantidad', 'precio',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}
