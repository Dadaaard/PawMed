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
        //

        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('PetName');
            $table->string('Purpose');
            $table->string('conditions');
            $table->string('symptoms');
            $table->string('appointmentDate');
            $table->string('status');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
