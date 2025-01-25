<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->text('motivation_letter');
        $table->unsignedBigInteger('job_id'); // Връзка с позицията
        $table->unsignedBigInteger('user_id'); // Връзка с потребителя
        $table->timestamps();

        // Дефиниране на външни ключове
        $table->foreign('job_id')->references('id')->on('job_listings')->onDelete('cascade'); // Промени `jobs` на `job_listings`
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
