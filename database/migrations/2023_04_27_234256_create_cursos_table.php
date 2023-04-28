<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id(); // ID del curso
            $table->string('nombre'); // Nombre del curso
            $table->date('fecha_inicio'); // Fecha de inicio del curso
            $table->date('fecha_fin'); // Fecha de fin del curso
            $table->timestamps(); // Columnas created_at y updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
