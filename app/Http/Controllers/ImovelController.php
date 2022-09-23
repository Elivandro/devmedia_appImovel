<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUpdateImovelRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Imovel;

class ImovelController extends Controller
{
    protected $imoveis;
    protected $users;

    public function __construct(Imovel $imoveis, User $users)
    {
        $this->imoveis = $imoveis;
        $this->users   = $users;
    }
    public function index()
    {
        $user = $this->users->find(Auth::user()->id);
        $imoveis = $user->Imoveis()->paginate(10);

        return view('imoveis.index', compact('imoveis'));
    }

    public function create()
    {
        return view('imoveis.create');
    }

    public function store(createUpdateImovelRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::User()->id;

        $this->imoveis->create($data);
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

    public function delete($id)
    {
        if(!$imovel = $this->imoveis->find($id))
            return redirect()->back()->with('message', 'Imóvel não encontrado');

        return view('imoveis.delete', compact('imovel'));
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