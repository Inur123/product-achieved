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
        // Create the 'transactions' table
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code')->unique();  // Add the unique transaction code
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->decimal('total_price', 10, 2); // Store total price of the transaction
            $table->string('proof_of_payment');
            $table->decimal('discount', 10, 2)->default(0);
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->timestamps();
        });

        // Create the pivot table 'transaction_product'
        Schema::create('product_transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the pivot table first
        Schema::dropIfExists('product_transaction');

        // Then drop the 'transactions' table
        Schema::dropIfExists('transactions');
    }
};
