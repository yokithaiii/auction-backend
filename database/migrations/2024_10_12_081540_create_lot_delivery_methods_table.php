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
        Schema::create('lot_delivery_methods', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->enum('method', ['post', 'courier', 'self', 'non-selected'])->default('non-selected');
            $table->foreignUuid('lot_id')->constrained('lots')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lot_delivery_methods');
    }
};
