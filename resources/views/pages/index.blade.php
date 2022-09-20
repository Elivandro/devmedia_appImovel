@extends('layouts.app')
@section('title', 'Listando todos imóveis')

@section('content')
    <section>
        <div class="d-flex justify-content-center">
            @foreach($imoveis as $imovel)
            <a href="{{ route('detail.imoveis', $imovel->id) }}" class="text-decoration-none mx-3">
                <div class="card-body mx-auto">
                    <div class="row">
                        <div class="card" style="width: 22rem;">
                            <div class="card-header">
                                <li class="list-group-item">{{ $imovel->description }}</li>                                        
                            </div>
                            <ul class="list-group list-group-flush">
                                @switch($imovel->purpose)
                                    @case(1)
                                        <li class="list-group-item">Propósito: Venda</li>
                                        @break
                                    @case(2)
                                        <li class="list-group-item">Propósito: Locação</li>
                                        @break
                                    @default
                                        <li class="list-group-item">Propósito: Não encontrado</li>
                                @endswitch
                                <li class="list-group-item">Preço: {{ formatMoney($imovel->price) }}</li>
                                <li class="list-group-item">Quantidade de quartos: {{ $imovel->roomQty }}</li>
                                @switch($imovel->type)
                                    @case(1)
                                        <li class="list-group-item">Tipo: Apartamento</li>
                                        @break
                                    @case(2)
                                        <li class="list-group-item">Tipo: Casa</li>
                                        @break
                                    @case(3)
                                        <li class="list-group-item">Tipo: Kitnet</li>
                                        @break
                                    @case(4)
                                        <li class="list-group-item">Tipo: Lote</li>
                                        @break
                                    @default
                                        <li class="list-group-item">Tipo: Não encontrado</li>
                                    @endswitch
                            </ul>
                            <div class="card-footer">
                                Atualizado: {{ formatDateTime($imovel->updated_at) }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
@endsection