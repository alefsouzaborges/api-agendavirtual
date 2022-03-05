<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasDisponiveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias_disponiveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email_empresa');
            $table->string('email_funcionario');
            $table->string('dia');
            $table->string('nome_dia');
            $table->string('mes');
            $table->string('nome_mes');
            $table->string('ano');
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
        Schema::dropIfExists('dias_disponiveis');
    }
}
