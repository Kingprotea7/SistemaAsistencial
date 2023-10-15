<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Salones', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('name');
            $blueprint->string('grade');

            // Define la columna "section" como un campo enum
            $blueprint->enum('section', ['A', 'B', 'C', 'D']);

            $blueprint->integer('cantA')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar la tabla en la migración inversa
        Schema::dropIfExists('Salones');
    }
};
