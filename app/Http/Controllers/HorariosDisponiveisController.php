<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HorariosDisponiveis;
use Illuminate\Support\Facades\DB;

class HorariosDisponiveisController extends Controller
{
    public function index(Request $request)
    {
        $email_empresa = $request['email_empresa'];
        $email_funcionario = $request['email_funcionario'];
        $dia = $request['dia'];
        $mes = $request['mes'];
        $ano = $request['ano'];

        $HorariosDisponiveis = DB::select("SELECT * FROM horarios_disponiveis WHERE email_empresa = '${email_empresa}'
        and email_funcionario = '${email_funcionario}' and dia = '${dia}' and mes = '${mes}' and ano = '${ano}'");

        if(count($HorariosDisponiveis) > 0){
            return response()->json(array('success' => true, 'response' => $HorariosDisponiveis));
        }else{
            return response()->json(array('success' => false, 'response' => 'Nenhum hoarrio disponiveil cadastrado.'));
        }

    }

    public function store(Request $request)
    {
        $email_empresa = $request['email_empresa'];
        $email_funcionario = $request['email_funcionario'];
        $dia = $request['dia'];
        $mes = $request['mes'];
        $ano = $request['ano'];
        $hora = $request['hora'];

        $query = DB::select("SELECT * FROM horarios_disponiveis WHERE email_empresa = '${email_empresa}'
        and email_funcionario = '${email_funcionario}' and dia = '${dia}' and mes = '${mes}' and ano = '${ano}' and hora = '${hora}'");

        if(count($query) > 0){

            return response()->json(array('success' => true, 'response' => 'Horario selecionado já existe na lista.'));

        }else{
            $HorariosDisponiveis = new HorariosDisponiveis;

            $HorariosDisponiveis->email_funcionario = $request['email_funcionario'];
            $HorariosDisponiveis->email_empresa = $request['email_empresa'];
            $HorariosDisponiveis->hora = $request['hora'];
            $HorariosDisponiveis->dia = $request['dia'];
            $HorariosDisponiveis->mes = $request['mes'];
            $HorariosDisponiveis->ano = $request['ano'];

            if($HorariosDisponiveis->save()){
                return response()->json(array('success' => true, 'response' => 'Horario disponivel adicionado.'));
            }else{
                return response()->json(array('success' => false, 'response' => 'Não foi possivel aidiconar o horario selecionado.'));
            }

        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {   
        $id = $request['id'];
        $HorariosDisponiveis = DB::delete("DELETE FROM horarios_disponiveis WHERE id = '${id}'");

        if($HorariosDisponiveis){
            return response()->json(array('success' => true, 'response' => 'Horario removido com sucesso!'));
        }else{
            return response()->json(array('success' => false, 'response' => 'Não foi possivel remover o horario selecionado.'));
        }

    }
}
