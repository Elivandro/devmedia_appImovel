@extends('layouts.app')
@section('title', 'Adicionar imóvel')

@section('content')
    <section>
        <div class="card card-default">
            <div class="card-header">
                <h3>Cadastre um Imóvel</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('imovel.store') }}">
                    @csrf
                    <h4>Dados do imóvel</h4>
                    <hr/>
                    <div class="form-group mb-2">
                        <label for="description">Descrição</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Descrição" required/>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Preço</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Preço" pattern="\d*" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roomqty">Quantidade de quartos</label>
                                <input type="number" class="form-control" id="roomqty" name="roomQty" placeholder="Quantidade de quartos" min="1" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="type">Tipo de imóvel</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option>Selecione</option>
                                    <option value="0">Apartamento</option>
                                    <option value="1">Casa</option>
                                    <option value="2">Kitnet</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="purpose">Propósito</label>
                                <select class="form-control" id="purpose" name="purpose" required>
                                    <option>Selecione</option>
                                    <option value="0">Venda</option>
                                    <option value="1">Locação</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h4>Endereço</h4>
                    <hr/>
                    <div class="row">
                        <div class="col-md-10">
                        <div class="form-group mb-2">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Logradouro" required/>
                        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="number">Número</label>
                                <input type="text" class="form-control" id="number=" name="number" placeholder="Número" pattern="\d*" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-2">
                                <label for="neighborhood">Bairro</label>
                                <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Bairro" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="zip">CEP</label>
                                <input type="text" class="form-control" id="zip" name="postal_code" placeholder="Código postal" pattern="\d*" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="city">Cidade</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" require/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="state">Estado</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="Estado" required/>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Voltar</a>
                    <button class="btn btn-outline-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </section>
@endsection