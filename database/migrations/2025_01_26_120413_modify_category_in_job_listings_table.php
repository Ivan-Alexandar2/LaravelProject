<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->string('category', 255)->nullable()->change(); // Промени типа или настройките на колоната
        });
    }

    public function down()
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->string('category', 255)->nullable(false)->change(); // Върни оригиналните настройки
        });
    }
};
