<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiasDisponiveis;
use Illuminate\Support\Facades\DB;

class DiasDisponiveisController extends Controller
{
    public function dias_disponivel(Request $request)
    {   
        
        $nomeMes = $request['nomeMes'];
          
        $ano = $request['ano'];
        $email_funcionario = $request['email_funcionario'];
        $email_empresa = $request['email'];
      
        $Diasponiveis = DB::select("SELECT * FROM dias_disponiveis where nome_mes = '${nomeMes}' and ano = '${ano}' 
        and email_funcionario = '${email_funcionario}' and email_empresa = '${email_empresa}' order by dia ASC");

        if(count($Diasponiveis) > 0){
          
            return response()->json(array('success' => true, 'response' => $Diasponiveis));
        
        }else{

            return response()->json(array('success' => false, 'response' => 'Não ha dias disponivel cadastrado para o usuário.'));

        }

    }

    public function store(Request $request)
    {

        $dia = $request['dia'];
         
        $nomeMes = $request['nome_mes'];
          
        $ano = $request['ano'];
        $email_funcionario = $request['email_funcionario'];
        $email_empresa = $request['email_empresa'];
        
        $Diasponiveis = DB::select("SELECT * FROM dias_disponiveis where nome_mes = '${nomeMes}' and ano = '${ano}' 
        and email_funcionario = '${email_funcionario}' and email_empresa = '${email_empresa}' and dia = '${dia}'");

        if(count($Diasponiveis)>0){

            return response()->json(array('success' => true, 'response' => 'Dia já cadastrado para o usuário neste mês.'));

        }   else{

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

    public function destroy(Request $request)
    {
        $id = $request['id'];

        $Diasponiveis = DB::delete("DELETE FROM dias_disponiveis WHERE id = '${id}'");

        if($Diasponiveis){
            return response()->json(array('success' => true, 'response' => 'Dia desvinculado com sucesso!'));
        }else{
            return response()->json(array('success' => false, 'response' => 'Erro ao tentar desvincular o dia selecionado.'));
        }

    }
}
