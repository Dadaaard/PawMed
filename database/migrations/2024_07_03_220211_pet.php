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

        Schema::create('pet', function (Blueprint $table) {
            $table->id();
            $table->string('petname');
            $table->string('date');
            $table->string('animaltype');
            $table->string('gender');
            $table->string('breed');
            $table->string('weight');
            $table->string('colormarkings');
            $table->string('image')->nullable();
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
