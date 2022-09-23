@extends('layouts.app')
@section('title', 'Detalhar imóvel')

@section('content')
    <section>
        <div class="card card-default">
            <div class="card-header d-flex justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('imovel.index') }}">Imoveis</a></li>
                    <li class="breadcrumb-item active">detalhar</li>
                </ol>
                <ol class="breadcrumb m-0 p-0">
                <a href="{{ route('imovel.create') }}" class="btn btn-primary btn-sm" data-toggle="collapse">Adicionar</a>
            </ol>
            </div>
            <div class="card-body">
                <div class="row justify-content-evenly mx-auto">
                    <div class="card border-0" style="width: 49.2%;">
                        <div class="card-header">
                            <h4>Sobre o imóvel</h4>
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
                                <li class="list-group-item">{{ $imovel->description }}</li>                                        
                        </ul>
                    </div>
                    <div class="card border-0" style="width: 49.2%;">
                        <div class="card-header">
                            <h4>Endereço</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Logradouro: {{ $imovel->address }}</li>
                            <li class="list-group-item">Número:{{ $imovel->number }}</li>
                            <li class="list-group-item">Bairro: {{ $imovel->neighborhood }}</li>
                            <li class="list-group-item">CEP: {{ formatZipCode($imovel->postal_code) }}</li>
                            <li class="list-group-item">Cidade: {{ $imovel->city }}</li>
                            <li class="list-group-item">Estado: {{ $imovel->state }}</li>
                        </ul>
                        <div class="card-footer">
                            <li class="list-group-item">Criação: {{ formatDateTime($imovel->created_at) }}</li>
                            <li class="list-group-item">Ultima atualização: {{ formatDateTime($imovel->updated_at) }}</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection