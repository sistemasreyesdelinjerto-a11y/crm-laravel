<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->string('nombre'); 
            $table->text('descripcion')->nullable(); 
            $table->text('categoria')->nullable(); 
            $table->integer('cantidad_paquete')->default(0); 
            $table->integer('unidades')->default(0); 
            $table->float('stock')->default(0); 
            $table->integer('cantidad_minima')->default(0); 
            $table->text('ubicacion')->nullable(); 
            $table->text('fecha_vencimiento')->nullable(); 
            $table->text('clinica')->nullable(); 
            $table->date('caduca')->nullable(); 
            $table->decimal('precio_unitario', 10, 2)->default(0); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
