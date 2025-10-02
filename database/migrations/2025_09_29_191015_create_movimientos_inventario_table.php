<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimientos_inventario', function (Blueprint $table) {
            $table->id();

            // Relación con productos
            $table->unsignedBigInteger('idProducto');
            $table->unsignedBigInteger('idBatch')->nullable(); // aún no se usa

            $table->enum('tipoMovimiento', ['entrada', 'salida']); // Tipo de movimiento
            $table->integer('cantidad');

            $table->string('expedidoPor')->nullable();   // Quién lo expide (ej: responsable)
            $table->string('entregadoA')->nullable();    // A quién se entrega (en salidas)

            $table->date('fechaMovimiento')->default(DB::raw('CURRENT_DATE'));
            $table->string('ubicacion')->default('Bodega');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_inventario');
    }
};
