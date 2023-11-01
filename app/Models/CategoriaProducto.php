<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    protected $table = 'categoria'; // Reemplaza 'nombre_de_la_tabla' por el nombre real de tu tabla
    protected $fillable = ['nombre', 'descripcion']; // Columnas que se pueden llenar en masa

}

