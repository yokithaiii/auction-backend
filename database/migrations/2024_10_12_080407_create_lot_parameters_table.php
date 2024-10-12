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
        Schema::create('lot_parameters', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('title');
            $table->string('value');
            $table->foreignUuid('lot_id')->constrained('lots')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lot_parameters');
    }
};
