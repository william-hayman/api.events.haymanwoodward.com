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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('service')->nullable();
            $table->string('migrateTo')->nullable();
            $table->string('academicBackground')->nullable();
            $table->string('timeExperience')->nullable();
            $table->string('occupation')->nullable();
            $table->string('annualIncome')->nullable();
            $table->string('language')->nullable();
            $table->string('formLink')->nullable();
            $table->string('event')->nullable();
            $table->string('imported')->nullable();
            $table->string('send_mail')->default('not_sent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
