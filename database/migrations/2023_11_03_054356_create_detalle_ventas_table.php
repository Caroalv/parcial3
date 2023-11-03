<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    use HasFactory;
    
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->string('producto');
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            // Agrega más columnas según tus necesidades
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
