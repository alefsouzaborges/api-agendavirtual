<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meses;

class MesesController extends Controller
{

    public function index()
    {
        $Meses = Meses::all();

        if(count($Meses) > 0){

            return response()->json(array('success' => true, 'response' => $Meses));

        }else{

            return response()->json(array('success' => false, 'response' => 'Sem mes cadastrado!'));

        }
    }

    public function store(Request $request)
    {
        $Mes = new Meses;
        $Mes->mes = $request['mes'];

        if($Mes->save()){

            return response()->json(array('success' => true, 'response' => 'Mes adicionado com sucesso!'));

        }else{

            return response()->json(array('success' => false, 'response' => 'Não foi possivel adicionar o mes.'));

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
