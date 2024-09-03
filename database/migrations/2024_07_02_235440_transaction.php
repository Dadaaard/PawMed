<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use TensorFlow\Tensor;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //

        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->nullable();
            $table->string('Email')->nullable();
            $table->string('Date');
            $table->string('MedicineOrdered');
            $table->string('Quantity');
            $table->integer('Total');
            $table->string('Status');
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
