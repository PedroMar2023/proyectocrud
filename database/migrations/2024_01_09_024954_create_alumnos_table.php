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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 20)->unique();
            $table->string('nombre', 70);
            $table->string('apellido', 70);
            $table->string('domicilio', 70);
            $table->string('celular', 20);
            $table->date('fecha_nacimiento');
            $table->string('email', 50)->nullable();
            $table->unsignedBigInteger('cursos_id');
            $table->timestamps();
            $table->foreign('cursos_id')->references('id')->on('cursos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
