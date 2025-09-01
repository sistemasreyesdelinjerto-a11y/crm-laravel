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
    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique(); // nombre del rol, ej. admin, doctor, ventas
        $table->string('description')->nullable(); // descripción opcional
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('roles');
}

};
