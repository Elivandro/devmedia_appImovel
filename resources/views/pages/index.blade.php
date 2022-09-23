@extends('layouts.app')
@section('title', 'Ínicio - Listando todos imóveis')

@section('content')
<section>
    <div class="row justify-content-start">
        @foreach($imoveis as $imovel)
        <div class="card mb-3 mx-2" style="width: 26rem;">
                <a href="{{ route('page.show', $imovel->id) }}" class="text-decoration-none mx-3">
                    <div class="card-header">
                        <li class="list-group-item">{{ $imovel->description }}</li>                                        
                    </div>
                    <ul class="list-group list-group-flush">
                        @switch($imovel->purpose)
                            @case('Venda')
                                <li class="list-group-item">Propósito: Venda</li>
                                @break
                            @case('Aluguel')
                                <li class="list-group-item">Propósito: Aluguel</li>
                                @break
                            @default
                                <li class="list-group-item">Propósito: Não encontrado</li>
                        @endswitch
                        <li class="list-group-item">Preço: {{ formatMoney($imovel->price) }}</li>
                        <li class="list-group-item">Quantidade de quartos: {{ $imovel->roomQty }}</li>
                        @switch($imovel->type)
                            @case('Apartamento')
                                <li class="list-group-item">Tipo: Apartamento</li>
                                @break
                            @case('Casa')
                                <li class="list-group-item">Tipo: Casa</li>
                                @break
                            @case('Kitnet')
                                <li class="list-group-item">Tipo: Kitnet</li>
                                @break
                            @case('Lote')
                                <li class="list-group-item">Tipo: Lote</li>
                                @break
                            @default
                                <li class="list-group-item">Tipo: Não encontrado</li>
                            @endswitch
                        <li class="list-group-item">Cidade: {{ $imovel->city }}</li>
                    </ul>
                    <div class="card-footer">
                        Atualizado: {{ formatDateTime($imovel->updated_at) }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center pagination-container mb-5">
        {{ $imoveis->links('pagination::bootstrap-4')}}
    </div>
</section>
@endsection