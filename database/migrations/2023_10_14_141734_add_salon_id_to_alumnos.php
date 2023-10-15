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
        Schema::table('alumnos', function (Blueprint $table) {
            $table->unsignedBigInteger('salon_id');
            $table->foreign('salon_id')->references('id')->on('salones');
        });
    }


    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropForeign(['salon_id']);
            $table->dropColumn('salon_id');
        });
    }
};
