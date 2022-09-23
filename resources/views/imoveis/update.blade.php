@extends('layouts.app')
@section('title', 'Editar imóvel')

@section('content')
    <section>
        <div class="card card-default">
            <div class="card-header d-flex justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('imovel.index') }}" class="text-decoration-none">Imoveis</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
                <ol class="breadcrumb m-0 p-0">
                    <a href="{{ route('imovel.create') }}" class="btn btn-primary btn-sm" data-toggle="collapse">Adicionar</a>
                </ol>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('imovel.update', $imovel->id) }}">
                    @method('PUT')
                    @csrf
                    <h4>Dados do imóvel</h4>
                    <hr/>
                    <div class="form-group mb-2">
                        <label for="description">Descrição</label>
                        <input type="text" class="form-control {{ $errors->has('description') ? 'border border-danger' : 'border border-primary' }}" id="description" name="description" placeholder="Descrição" value="{{ $imovel->description }}" required/>
                        @if($errors->has('description'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Preço</label>
                                <input type="text" class="form-control  {{ $errors->has('price') ? 'border border-danger' : 'border border-primary' }}" id="price" name="price" placeholder="Preço" value="{{ $imovel->price }}" pattern="\d*" required/>
                                @if($errors->has('price'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roomqty">Quantidade de quartos</label>
                                <input type="number" class="form-control  {{ $errors->has('roomQty') ? 'border border-danger' : 'border border-primary' }}" id="roomqty" name="roomQty" placeholder="Quantidade de quartos" value="{{ $imovel->roomQty }}" min="0" required/>
                                @if($errors->has('roomQty'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('roomQty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="type">Tipo de imóvel</label>
                                <select class="form-control {{ $errors->has('roomQty') ? 'border border-danger' : 'border border-primary' }}" id="type" name="type" required>
                                    <option>Selecione</option>
                                    <option value="1"{{ $imovel->type == 'Apartamento' ? 'selected' : '' }}>Apartamento</option>
                                    <option value="2"{{ $imovel->type == 'Casa' ? 'selected' : '' }}>Casa</option>
                                    <option value="3"{{ $imovel->type == 'Kitnet' ? 'selected' : '' }}>Kitnet</option>
                                    <option value="4"{{ $imovel->type == 'Lote' ? 'selected' : '' }}>Lote</option>
                                </select>
                                @if($errors->has('type'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="purpose">Propósito</label>
                                <select class="form-control {{ $errors->has('purpose') ? 'border border-danger' : 'border border-primary' }}" id="purpose" name="purpose" required>
                                    <option>Selecione</option>
                                    <option value="1"{{ $imovel->purpose == 'Venda' ? 'selected' : '' }}>Venda</option>
                                    <option value="2"{{ $imovel->purpose == 'Aluguel' ? 'selected' : '' }}>Aluguel</option>
                                </select>
                                @if($errors->has('purpose'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('purpose') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <h4>Endereço</h4>
                    <hr/>
                    <div class="row">
                        <div class="col-md-10">
                        <div class="form-group mb-2">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control {{ $errors->has('address') ? 'border border-danger' : 'border border-primary' }}" id="address" name="address" placeholder="Logradouro" value="{{ $imovel->address }}" required/>
                            @if($errors->has('address'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="number">Número</label>
                                <input type="text" class="form-control {{ $errors->has('number') ? 'border border-danger' : 'border border-primary' }}" id="number=" name="number" placeholder="Número" pattern="\d*" value="{{ $imovel->number }}" required/>
                                @if($errors->has('number'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-2">
                                <label for="neighborhood">Bairro</label>
                                <input type="text" class="form-control {{ $errors->has('neighborhood') ? 'border border-danger' : 'border border-primary' }}" id="neighborhood" name="neighborhood" placeholder="Bairro" value="{{ $imovel->neighborhood }}" required/>
                                @if($errors->has('neighborhood'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('neighborhood') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="zip">CEP</label>
                                <input type="text" class="form-control {{ $errors->has('postal_code') ? 'border border-danger' : 'border border-primary' }}" id="zip" name="postal_code" placeholder="Código postal" pattern="\d*" value="{{ $imovel->postal_code }}" required/>
                                @if($errors->has('postal_code'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="city">Cidade</label>
                                <input type="text" class="form-control {{ $errors->has('city') ? 'border border-danger' : 'border border-primary' }}" id="city" name="city" placeholder="Cidade" value="{{ $imovel->city }}" require/>
                                @if($errors->has('city'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="state">Estado</label>
                                <input type="text" class="form-control {{ $errors->has('state') ? 'border border-danger' : 'border border-primary' }}" id="state" name="state" placeholder="Estado" value="{{ $imovel->state }}" required/>
                                @if($errors->has('state'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Voltar</a>
                    <button class="btn btn-outline-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </section>
@endsection