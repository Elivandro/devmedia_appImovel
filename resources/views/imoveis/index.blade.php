@extends('layouts.app')
@section('title', 'listando todos imóveis')

@section('content')
<section>
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item active" aria-current="page">Imoveis</li>
            </ol>
            <ol class="breadcrumb m-0 p-0">
                <a href="{{ route('imovel.create') }}" class="btn btn-primary btn-sm" data-toggle="collapse">Adicionar</a>
            </ol>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Descrição</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Tipo</th>
                        <th>Propósito</th>
                        <th colspan="2">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($imoveis as $imovel)
                        <tr>
                            <td>{{ $imovel->description }}</td>
                            <td>{{ $imovel->address }}</td>
                            <td>{{ $imovel->city }}</td>
                            <td>{{ $imovel->state }}</td>
                            @switch($imovel->type)
                                @case(1)
                                    <td>Apartamento</td>
                                    @break
                                @case(2)
                                    <td>Casa</td>
                                    @break
                                @case(3)
                                    <td">Kitnet</td>
                                    @break
                                @case(4)
                                    <td>Lote</td>
                                    @break
                                @default
                                    <td>Não encontrado</td>
                            @endswitch
                            @switch($imovel->purpose)
                                @case(1)
                                    <td>Venda</td>
                                    @break
                                @case(2)
                                    <td>Locação</td>
                                    @break
                                @default
                                    <td>Não encontrado</td>
                            @endswitch
                            <td>{{ $imovel->price }}</td>
                            <td>
                                <form action="{{ route('imovel.destroy', $imovel->id) }}" method="post" id="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('imovel.show', $imovel->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fa-solid fa-magnifying-glass-plus fa-lg"></i>
                                    </a>
                                    <a href="{{ route('imovel.edit', $imovel->id) }}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa-solid fa-pencil fa-lg"></i>
                                    </a>
                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Você tem certeza de que deseja deletar este registro?')"><i class="fa-solid fa-trash fa-lg"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <div class="pagination justify-content-center">
                                {{ $imoveis->links('pagination::bootstrap-5')}}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
@endsection