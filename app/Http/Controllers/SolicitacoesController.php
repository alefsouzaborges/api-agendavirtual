<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitacoes;
use App\Models\FuncionariosVinculados;

class SolicitacoesController extends Controller
{
    public function index()
    {
        return Solicitacoes::all();
    }

    public function store(Request $request)
    {
        $solicitacoes = new Solicitacoes;
        $solicitacoes->email_usuario = $request['email_usuario'];
        $solicitacoes->email_empresa = $request['email_empresa'];
        $solicitacoes->situacao = 'Pendente';

        if($solicitacoes->save()){

            return response()->json(array('success' => true, 'response' => 'Sua solicitação foi enviada, logo logo você podera verificar o status da sua solicitação.'));

        }else{

            return response()->json(array('success' => false, 'response' => 'Erro ao tentar enviar a solicitação, tente novamente mais tarde.'));

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

    public function aceitarSolicitacao(Request $request)
    {
        $id = $request['id'];
        $userId = $request['userId'];
        $userLogado = $request['userLogado'];


        $updateSolicitacao = DB::update("UPDATE solicitacoes SET situacao = 'Aceita' WHERE id = '${id}'");

         if($updateSolicitacao){

             $updateUsuario = DB::update("UPDATE usuarios SET tipo = 'Funcionario' WHERE id = '${userId}'");
            
           
             if($updateUsuario){

                 $buscarFuncionario = DB::select("SELECT email FROM usuarios WHERE id = '${userId}' LIMIT 1");
                 $FuncionariosVinculados = new FuncionariosVinculados;
                 $FuncionariosVinculados->email_funcionario = $buscarFuncionario[0]->email;
                 $FuncionariosVinculados->email_empresa = $userLogado;
                 $FuncionariosVinculados->especialidade = 'Padrao';
                 $FuncionariosVinculados->status = 'Ativo';
                 $FuncionariosVinculados->save();

          
             }


             return response()->json(array('success' => true, 'response' => 'Solicitação aceita com sucesso!'));

         }else{

             return response()->json(array('success' => false, 'response' => 'error'));

         }
    }


    public function recusarSolicitacao(Request $request)
    {

        $updateSolicitacao = DB::update("UPDATE solicitacoes SET situacao = 'Recusada' WHERE id = '$request[id]' LIMIT 1");

        if($updateSolicitacao){

            return response()->json(array('success' => true, 'response' => 'Solicitação recusada com sucesso!')); 

        }else{

            return response()->json(array('success' => false, 'response' => 'error'));

        }


    }
}
