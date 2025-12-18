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
        Schema::create('aportes', function (Blueprint $table) {
        $table->id();
        $table->date('data_aporte');
        $table->decimal('valor', 15, 2);
        $table->string('ativo');
        $table->string('tipo');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aportes');
    }
};
