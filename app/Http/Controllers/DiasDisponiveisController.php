<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiasDisponiveis;

class DiasDisponiveisController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $Dia = new DiasDisponiveis;
        $Dia->email_empresa = $request['email_empresa'];
        $Dia->email_funcionario = $request['email_funcionario'];
        $Dia->dia = $request['dia'];
        $Dia->nome_dia = $request['nome_dia'];
        $Dia->mes = $request['mes'];
        $Dia->nome_mes = $request['nome_mes'];
        $Dia->ano = $request['ano'];

        if($Dia->save()){

            return response()->json(array('success' => true, 'response' => 'Dia disponivel adicionado com sucesso!'));

        }else{

            return response()->json(array('success' => false, 'response' => 'Não foi possivel adicionar o dia disponivel.'));

        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
