@extends('layouts.app')
@section('title', 'mostrando dados do usuario')

@section('content')
<section>
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item active" aria-current="page">Dados cadastrados</li>
            </ol>
            <ol class="breadcrumb m-0 p-0">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="collapse">Editar</a>
            </ol>
        </div>
        <div class="card-body">
            <div>
                {{ $user->name }}
            </div>
            <div>
                {{ $user->email }}
            </div>
            @foreach($phones as $phone)
                <div>
                    {{ $phone->phone }}
                </div>
                <div>
                    {{ $phone->description }}
                </div>
                <div>
                    {{ $phone->updated_at }}
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection