@extends('layouts.app')
@section('title', 'Detalhar imóvel')

@section('content')
    <section>
        <div class="card card-default">
            <div class="card-header d-flex justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('imovel.index') }}">Imoveis</a></li>
                    <li class="breadcrumb-item active">deletar</li>
                </ol>
                <ol class="breadcrumb m-0 p-0">
                    <a href="{{ route('imovel.create') }}" class="btn btn-primary btn-sm" data-toggle="collapse">Adicionar</a>
                </ol>
            </div>
            <div class="card-body">
                <h4 class="mb-4">Você tem certeza que deseja deletar este imóvel?</h4>
                <div class="row justify-content-evenly mx-auto">
                    <div class="card border-0" style="width: 49.2%;">
                        <div class="card-header">
                            <h4>Sobre o imóvel</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            @switch($imovel->purpose)
                                @case(1)
                                    <li class="list-group-item">Propósito: Venda</li>
                                    @break
                                @case(2)
                                    <li class="list-group-item">Locação</li>
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
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm" data-toggle="collapse">Cancelar</a>
                <form action="{{ route('imovel.destroy', $imovel->id) }}" method="post" id="delete-form">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Não será possivel recuperar o registro, tem certeza?')">
                        <i class="fa-solid fa-trash fa-lg"></i>
                        <span>Remover</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection