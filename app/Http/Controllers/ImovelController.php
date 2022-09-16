<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    protected $imoveis;

    public function __construct(Imovel $imoveis)
    {
        $this->imoveis = $imoveis;
    }
    public function index()
    {
        //
    }

    public function create()
    {
        return view('imoveis.create');
    }

    public function store(Request $request)
    {
        $this->imoveis->create($request->all());
        return redirect()->route('imoveis.index')->with('sucess', 'Imóvel cadastrado com sucesso.');
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