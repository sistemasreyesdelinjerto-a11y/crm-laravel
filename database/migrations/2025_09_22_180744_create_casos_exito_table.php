<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('casos_exito', function (Blueprint $table) {
        $table->id();
        $table->string('titulo', 255);
        $table->text('descripcion')->nullable();
        $table->string('imagen')->nullable(); // ruta a la imagen
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('casos_exito');
}

};
