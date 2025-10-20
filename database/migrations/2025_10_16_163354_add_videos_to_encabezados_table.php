<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('encabezados', function (Blueprint $table) {
        $table->string('video_horizontal')->nullable();
        $table->string('video_vertical')->nullable();
    });
}

public function down()
{
    Schema::table('encabezados', function (Blueprint $table) {
        $table->dropColumn(['video_horizontal', 'video_vertical']);
    });
}

};
