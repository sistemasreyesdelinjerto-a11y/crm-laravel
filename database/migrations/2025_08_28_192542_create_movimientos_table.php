<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->string('tipo_movimiento');
            $table->text('descripcion')->nullable();
            $table->string('tabla_afectada')->nullable();
            $table->unsignedBigInteger('registro_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down() {
        Schema::dropIfExists('movimientos');
    }
};;
