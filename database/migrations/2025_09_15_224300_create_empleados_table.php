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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();

            // Relación opcional al usuario del CRM
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            // Información personal
            $table->string('nombre');
            $table->string('apellido');
            $table->string('puesto');
            $table->string('departamento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->enum('estatus', ['Activo', 'Inactivo'])->default('Activo');
            $table->string('telefono', 20)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->text('direccion')->nullable();
            $table->string('identificacion', 50)->nullable();
            $table->string('emergencia_nombre')->nullable();
            $table->string('emergencia_telefono', 20)->nullable();
            $table->text('notas')->nullable();
    $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
