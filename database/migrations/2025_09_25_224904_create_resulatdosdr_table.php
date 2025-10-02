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
        Schema::create('resulatdosdr', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('color', 100);
            $table->integer('numero');
            $table->string('icono_svg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resulatdosdr');
    }
};
