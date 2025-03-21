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
            $table->string('code_product')->unique();
            $table->string('image')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->decimal('harga', 10, 2);
            $table->enum('status', ['active', 'nonactive'])->default('active');
            $table->string('slug')->unique();
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
