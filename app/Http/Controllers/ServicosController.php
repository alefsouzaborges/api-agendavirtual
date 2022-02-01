<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicos;
use Illuminate\Support\Facades\DB;

class ServicosController extends Controller
{
    public function index()
    {
        return Servicos::all();
    }

    public function store(Request $request)
    {
        $Servico = new Servicos;
        $Servico->descricao = $request['descricao'];
        $Servico->tempo = $request['tempo'];
        $Servico->valor = $request['valor'];
        $Servico->empresa = $request['empresa'];

        if($Servico->save()){

            return response()->json(array('success' => true, 'response' => 'Serviço criado com sucesso!'));

        }else{

            return response()->json(array('success' => true, 'response' => 'Falha ao criar o serviço.'));

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

    public function servicos_vincular($emailEmpresa)
    {
        $servicos_vincular = DB::select("SELECT * FROM servicos Where empresa = '${emailEmpresa}'");

        if(count($servicos_vincular) > 0){

            return response()->json(array('success' => true, 'response' => $servicos_vincular));

        }else{

            return response()->json(array('success' => false, 'response' => 'Sem serviço a vincular!'));

        }

    }

    public function servicos_vinculados($email)
    {
        $servicos_vinculados = DB::select("SELECT servico_vinculados.id as id, servicos.descricao as descricao, 
        servicos.tempo as tempo, servicos.valor as valor FROM servico_vinculados 
        LEFT JOIN servicos ON(servico_vinculados.id_servico = servicos.id)
         WHERE servico_vinculados.email_funcionario = '$email'");

        if(count($servicos_vinculados) > 0){

            return response()->json(array('success' => true, 'response' => $servicos_vinculados));

        }else{

            return response()->json(array('success' => false, 'response' => 'Não á serviços vinculados!'));

        }

    }

    public function vincularServico($id, $email)
    {
        $vincular_servico = DB::select("SELECT * FROM servico_vinculados 
        WHERE id_servico = '${id}' AND email_funcionario = '${email}'");

        if(count($vincular_servico) > 0){

            return response()->json(array('success' => true, 'response' => 'O serviço já esta vinculado ao usuario escolhido!'));

        }else{

            $VincularServico = DB::insert("INSERT INTO servico_vinculados SET id_servico = '${id}', email_funcionario = '${email}'");

            return response()->json(array('success' => false, 'response' => 'Serviço vinculado com sucesso!'));

        }

    }

    public function desvincularServico($id, $email)
    {
        $vincular_servico = DB::select("SELECT * FROM servico_vinculados 
        WHERE id = '${id}' AND email_funcionario = '${email}'");

        if(($vincular_servico)){
            $VincularServico = DB::delete("DELETE FROM servico_vinculados WHERE id = '${id}' and email_funcionario = '${email}'");

            return response()->json(array('success' => true, 'response' => 'Serviço Desvinculado com sucesso!'));

        }else{

            return response()->json(array('success' => false, 'response' => 'Não há serviço a desvincular!'));

        }

    }

}
