<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * la función up se utiliza para definir las operaciones que deben ejecutarse cuando se realiza una migración hacia adelante. En otras palabras, la función up define los cambios que se deben realizar en la base de datos cuando se ejecuta la migración.
     */
    public function up(): void
    { /**clase Schema incluye varios métodos que te permiten realizar operaciones como crear tablas, modificar columnas, agregar índices, entre otras cosas. */
        /**Blueprint es una clase en Laravel que se utiliza dentro de las migraciones para definir la estructura de las tablas de la base de datos. Al utilizar un objeto Blueprint dentro de la función up de una migración, puedes especificar las columnas, índices, claves foráneas y otras características de la tabla que estás creando o modificando. */
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 70);
            $table->string('descripcion', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
