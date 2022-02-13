<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ano;

class AnoController extends Controller
{

    public function index()
    {
        $Ano = DB::select("SELECT * FROM anos");

        if(count($Ano) >0){

          return response()->json(array('success' => true, 'response' => $Ano));

        }else{

            return response()->json(array('success' => true, 'response' => "Sem ano cadastrado!"));

        }
    

    }

    public function store(Request $request)
    {
       $Ano = new Ano;
       $Ano->ano = $request['ano'];

       if($Ano->save()){

        return response()->json(array('success' => true, 'response' => "Ano cadastrado com sucesso!"));
     
    }else{

        return response()->json(array('success' => false, 'Não foi possivel cadastar o ano'));

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
