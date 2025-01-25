<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeUserIdNullableInApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change(); // Промени колоната да позволява NULL
        });
        Schema::create('applications', function (Blueprint $table) { // the changed schema
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('motivation_letter');
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change(); // Върни колоната към състоянието ѝ
        });
    }
}
