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
        Schema::create('lots', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('seller_id')->constrained('sellers')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            // images from lot_images

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots');
    }
};
