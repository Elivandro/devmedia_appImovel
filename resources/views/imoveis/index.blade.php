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
                                @case('Apartamento')
                                    <td>Apartamento</td>
                                    @break
                                @case('Casa')
                                    <td>Casa</td>
                                    @break
                                @case('Kitnet')
                                    <td>Kitnet</td>
                                    @break
                                @case('Lote')
                                    <td>Lote</td>
                                    @break
                                @default
                                    <td>Não encontrado</td>
                            @endswitch
                            @switch($imovel->purpose)
                                @case('Venda')
                                    <td>Venda</td>
                                    @break
                                @case('Aluguel')
                                    <td>Aluguel</td>
                                    @break
                                @default
                                    <td>Não encontrado</td>
                            @endswitch
                            <td>{{ formatMoney($imovel->price) }}</td>
                            <td>
                                <a href="{{ route('imovel.show', $imovel->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fa-solid fa-magnifying-glass-plus fa-lg"></i>
                                </a>
                                <a href="{{ route('imovel.edit', $imovel->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fa-solid fa-pencil fa-lg"></i>
                                </a>
                                <a href="{{ route('imovel.delete',$imovel->id) }}" class="btn btn-outline-danger btn-sm">
                                    <i class="fa-solid fa-trash fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <div class="pagination justify-content-center">
                                {{ $imoveis->links('pagination::bootstrap-4')}}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
@endsection