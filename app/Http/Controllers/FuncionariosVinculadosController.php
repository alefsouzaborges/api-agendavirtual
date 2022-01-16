<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuncionariosVinculados;

class FuncionariosVinculadosController extends Controller
{

    public function index()
    {
        return FuncionariosVinculados::all();
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
}
