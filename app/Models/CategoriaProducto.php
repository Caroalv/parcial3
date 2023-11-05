<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    protected $table = 'categoria'; 
    protected $fillable = ['nombre', 'descripcion']; // Columnas que se pueden llenar en masa

}

