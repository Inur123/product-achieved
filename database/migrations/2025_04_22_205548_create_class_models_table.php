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
        Schema::create('class_models', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('title'); // Judul kelas (e.g. "Silver 3 Months")
            $table->text('excerpt')->nullable(); // Ringkasan singkat (boleh kosong)
            $table->text('description')->nullable(); // Deskripsi lengkap (boleh kosong)
            $table->enum('status', ['active', 'nonactive'])->default('active'); // Status enum
            $table->timestamps(); // Opsional: created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_models');
    }
};
