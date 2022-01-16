<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 80);
            $table->string('cpf_cnpj', 20);
            $table->string('email', 80);
            $table->string('telefone', 15);
            $table->string('senha', 255);
            $table->string('cep', 20);
            $table->string('estado', 2);
            $table->string('cidade', 50);
            $table->string('bairro', 50);
            $table->string('numero', 10);
            $table->string('complemento', 30);
            $table->string('tipo', 20);
            $table->string('sexo', 10);
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
        Schema::dropIfExists('usuarios');
    }
}
