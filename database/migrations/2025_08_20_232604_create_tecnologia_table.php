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
        Schema::create('tecnologia', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nome", 100);
            $table->string("caminho_logo", 150);
            $table->string("codigo", 256);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnologia');
    }
};
