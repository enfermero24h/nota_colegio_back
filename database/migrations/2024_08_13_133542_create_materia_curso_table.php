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
        {
            Schema::create('materia_curso', function (Blueprint $table) {
                $table->id();
                $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
                $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_curso');
    }
};
