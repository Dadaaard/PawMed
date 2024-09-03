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

        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('diagnosis')->nullable();
            $table->string('Medicine')->nullable();
            $table->string('Quantity')->nullable();
            $table->string('doctor_id')->nullable();
            $table->string('Status')->nullable();
            $table->foreignId('pet_id')->constrained('pet')->onDelete('cascade');

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
