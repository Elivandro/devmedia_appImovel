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
        if(!$imovel = $this->imoveis->find($id))
            return redirect()->back()->with('message', 'Imóvel não encontrado');

        return view('imoveis.show', compact('imovel'));
    }

    public function edit($id)
    {
        if(!$imovel = $this->imoveis->find($id))
            return redirect()->back()->with('message', 'Imóvel não encontrado');

        return view('imoveis.update', compact('imovel'));
    }

    public function update(createUpdateImovelRequest $request, $id)
    {
        if(!$imovel = $this->imoveis->find($id))
            return redirect()->back()->with('message', 'Imóvel não encontrado');

        $imovel->update($request->all());

        $imoveis = $this->imoveis->paginate(5);
        return redirect()->route('imovel.index', compact('imoveis'))->with('success', 'Imóvel editado com Sucesso.');
    }

    public function destroy($id)
    {
        if(!$imovel = $this->imoveis->find($id))
            return redirect()->back()->with('message', 'Imóvel não encontrado.');

        $imovel->delete();

        $imoveis = $this->imoveis->all();
        return redirect()->route('imovel.index', compact('imoveis'))->with('success', 'Imóvel deletado com sucesso.');
    }
}