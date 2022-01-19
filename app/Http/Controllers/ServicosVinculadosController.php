<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicosVinculados;

class ServicosVinculadosController extends Controller
{

    public function index()
    {
        return ServicosVinculados::all();
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
