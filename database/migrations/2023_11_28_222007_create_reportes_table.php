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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->string('tipo_reporte');
            $table->string('dia')->nullable();
            $table->string('semana')->nullable();
            $table->string('mes')->nullable();
            // Otros campos según tu necesidad
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     public function down()
     {
         Schema::dropIfExists('reportes');
     }
};
