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
// En create_reportes_table.php
public function up()
{
    Schema::create('reportes', function (Blueprint $table) {
        $table->id();
        $table->string('campo1');
        $table->integer('campo2');
        // Agrega aquí otros campos según tus necesidades
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
