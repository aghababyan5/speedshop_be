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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('am_title', '400')->nullable();
            $table->text('am_description')->nullable();
            $table->string('am_short_description', '400')->nullable();
            $table->string('ru_title', '400')->nullable();
            $table->text('ru_description')->nullable();
            $table->text('ru_short_description')->nullable();
            $table->string('en_title', '400')->nullable();
            $table->text('en_description')->nullable();
            $table->text('en_short_description')->nullable();
            $table->integer('price')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
