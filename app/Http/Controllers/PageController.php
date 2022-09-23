<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    protected $imoveis;

    public function __construct(Imovel $imoveis)
    {
        $this->imoveis = $imoveis;
    }

    public function index(Request $request)
    {
        $imoveis = $this->imoveis->getImoveis(
            $request->search ?? ''
        );

        return view('pages.index', compact('imoveis'));
    }
    
    public function show($id)
    {
        if(!$imovel = $this->imoveis->find($id))
            return redirect()->back()->with('message', 'Imóvel não encontrado');
        
        return view('pages.show', compact('imovel'));
    }

    public function filter(Request $request)
    {
        $type = $request['type'];

        if(!$imoveis = $this->imoveis->where('type', '=', $type)->paginate(6))
            return redirect()->back()->with('message', 'Categoria de Imóveis não encontrada');

        return view('pages.index', compact('imoveis'));
    }
}
