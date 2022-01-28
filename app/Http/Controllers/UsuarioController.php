<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuarios::all();
    }

    public function store(Request $request)
    {
        //
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
    ///////////////////////////////////////////////
    public function login(Request $request)
    {
         $email = $request['email'];
         $senha = $request['senha'];
         $usuarios = DB::select("Select * from usuarios where email = '${email}' and senha = '${senha}'");
         
         if(count($usuarios) >0){
            return response()->Json(array('success' => true, 'response' => $usuarios));
         }else{
            return response()->Json(array('success' => false, 'response' => 'Nenhum usuário encontrado!'));
         }

    }

    public function createaccountClient(Request $request)
    {
        $usuario = new Usuarios;
        $usuario->nome = $request['nome'];
        $usuario->email = $request['email'];
        $usuario->telefone = $request['telefone'];
        $usuario->senha = $request['senha'];
        $usuario->cpf_cnpj = '000';
        $usuario->tipo = $request['tipo'];
        $usuario->sexo = $request['sexo'];

        if($usuario->save()){
            return response()->json(array('success' => true, 'response' => 'Cliente cadastrado com sucesso!'));

        }else{
            return response()->json(array('success' => true, 'response' => 'Não foi possivel realizar o cadastro. 
            tente novamente mais tarde!'));
        }

    }

    public function createaccountEmpresa(Request $request)
    {
        $usuario = new Usuarios;
        $usuario->nome = $request['nome'];
        $usuario->cpf_cnpj = $request['cpf_cnpj'];
        $usuario->email = $request['email'];
        $usuario->telefone = $request['telefone'];
        $usuario->senha = $request['senha'];
        $usuario->cep = $request['cep'];
        $usuario->estado = $request['estado'];
        $usuario->cidade = $request['cidade'];
        $usuario->bairro = $request['bairro'];
        $usuario->numero = $request['numero'];
        $usuario->complemento = $request['complemento'];
        $usuario->tipo = $request['tipo'];
        $usuario->sexo = "Empresa";

        if($usuario->save()){
            return response()->json(array('success' => true, 'response' => 'Empresa cadastrado com sucesso!'));

        }else{
            return response()->json(array('success' => true, 'response' => 'Não foi possivel realizar o cadastro. 
            tente novamente mais tarde!'));
        }

    }

    public function countSolicitacoes($email)
    {
        $querySolicitacoes = DB::select("SELECT count(situacao) as total FROM solicitacoes WHERE email_empresa = '${email}' AND situacao = 'Pendente'");

        if(count($querySolicitacoes) > 0){
            
            return response()->json(array('success' => true, 'response' => $querySolicitacoes));
        
        }else{

            return response()->json(array('success' => false, 'response' => 0));

        }
    }

    public function solicitacoes($email)
    {   
        $querySolicitacoes = DB::select("SELECT solicitacoes.id AS id,usuarios.id as userId,usuarios.nome AS nome, 
        usuarios.email AS email_usuario, solicitacoes.email_empresa AS email_empresa, solicitacoes.situacao 
        FROM solicitacoes LEFT JOIN usuarios on(usuarios.email = solicitacoes.email_usuario) WHERE email_empresa = '${email}'
         AND situacao = 'Pendente'");

        if($querySolicitacoes){
            
            return response()->json(array('success' => true, 'response' => $querySolicitacoes));
        
        }else{

            return response()->json(array('success' => false, 'response' => 'Sem solicitacões no momento.'));

        }
    }

    public function buscarEmpresa($cpf_cnpj)
    {   
        $querySolicitacoes = DB::select("SELECT * FROM usuarios WHERE cpf_cnpj like '${cpf_cnpj}'");

        if($querySolicitacoes){
            
            return response()->json(array('success' => true, 'response' => $querySolicitacoes));
        
        }else{

            return response()->json(array('success' => false, 'response' => 'Nenhuma empresa encontrada.'));

        }
    }


}
