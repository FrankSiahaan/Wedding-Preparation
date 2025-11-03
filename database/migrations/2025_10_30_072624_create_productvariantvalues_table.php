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
        Schema::create('productvariantvalues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variant_id')->constrained(table: 'productvariants', column: 'id')->cascadeOnDelete();
            $table->foreignId('value_id')->constrained(table: 'productattributevalues', column: 'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productvariantvalues');
    }
};
