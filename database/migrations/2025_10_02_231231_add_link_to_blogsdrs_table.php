<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::table('blogdrs', function (Blueprint $table) {
        $table->string('link')->nullable()->after('imagen'); // Puede ser YouTube, TikTok, etc.
    });
}

public function down()
{
    Schema::table('blogdrs', function (Blueprint $table) {
        $table->dropColumn('link');
    });
}
};
