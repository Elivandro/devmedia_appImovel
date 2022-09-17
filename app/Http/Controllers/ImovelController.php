<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Http\Requests\createUpdateImovelRequest;

class ImovelController extends Controller
{
    protected $imoveis;

    public function __construct(Imovel $imoveis)
    {
        $this->imoveis = $imoveis;
    }
    public function index()
    {
        $imoveis = $this->imoveis->paginate(5);
        return view('imoveis.index', compact('imoveis'));
    }

    public function create()
    {
        return view('imoveis.create');
    }

    public function store(createUpdateImovelRequest $request)
    {
        $this->imoveis->create($request->all());
        return redirect()->route('imovel.index')->with('success', 'Imóvel cadastrado com sucesso.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(createUpdateImovelRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}