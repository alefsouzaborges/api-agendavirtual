<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicos;

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
}
