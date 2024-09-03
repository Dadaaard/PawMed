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
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->id();
            $table->string('diagnosis');
            $table->string('medicinename');
            $table->string('quantity');
            $table->string('doctor_id');
            $table->string('status');
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
