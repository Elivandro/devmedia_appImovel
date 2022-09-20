<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $imoveis;

    public function __construct(Imovel $imoveis)
    {
        $this->imoveis = $imoveis;
    }

    public function index()
    {
        $imoveis = $this->imoveis->paginate(10);

        return view('pages.index', compact('imoveis'));
    }
    
    public function show($id)
    {
        if(!$imovel = $this->imoveis->find($id))
            return redirect()->back()->with('message', 'Imóvel não encontrado');
        
        return view('pages.show', compact('imovel'));
    }
}
