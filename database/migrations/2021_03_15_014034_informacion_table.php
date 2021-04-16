<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_table', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->timestamp('fecha')->useCurrent();
            $table->text('equipo');
            $table->text('elabora');
            $table->text('firma');
            $table->text('documento');
            $table->longText('asunto');
            $table->longText('temas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacion_table');
    }
}
