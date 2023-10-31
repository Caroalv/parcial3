<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('categoria', function (Blueprint $table) {
            $table->id(); // Campo autoincremental para la clave primaria
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Asegúrate de tener esta línea
            $table->integer('Stock');
            $table->decimal('precio', 8, 2);
            $table->string('categoria');
            $table->string('imagen');
            $table->timestamps();
        });
            
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_productos');
    }
};
