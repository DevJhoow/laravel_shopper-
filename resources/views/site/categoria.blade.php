@extends('site.layout')

@section('content')
    <div class="container">
        <div class="row">

            <h3> Categoria : {{ $categoria->nome }}</h3>

            @foreach ($produtos as $produto)
                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ $produto->imagem ?? 'https://via.placeholder.com/400x300' }}">
                            <span class="card-title">{{ $produto->nome }}</span>
                            <a href="{{ route('site.details', $produto->id) }}" class="btn-floating halfway-fab waves-effect waves-light red">
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <div class="card-content">
                            <p>{{ $produto->descricao }}</p>
                            <p><strong>R$ {{ number_format($produto->preco, 2, ',', '.') }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
