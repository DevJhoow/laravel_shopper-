@extends('site.layout')

@section('content')
<div class="row container" style="margin-top: 50px;">
    <!-- Imagem do produto -->
    <div class="col s12 m6">
        <img src="{{ $produto->imagem }}" class="responsive-img z-depth-2" alt="Imagem do produto">
    </div>

    <!-- Informações do produto -->
    <div class="col s12 m6">
        <h4 class="orange-text text-darken-2">
            <i class="material-icons left">store</i>
            {{ $produto->nome }}
        </h4>

        <p>
            <i class="material-icons left orange-text">description</i>
            {{ $produto->descricao }}
        </p>

        <p>
            Postado por : {{ $produto->user->name }} <br>
            Categoria : {{ $produto->categoria->nome }}
        </p>

        <br>

        <form action="{{ route('site.addCarrinho') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="id" value="{{ $produto->id }}">
            <input type="hidden" name="name" value="{{ $produto->nome }}">
            <input type="hidden" name="price" value="{{ $produto->preco }}">
            <input type="number" name="qnt" value="1">
            <input type="hidden" name="image" value="{{ $produto->imagem }}">

            <button class="btn-large orange waves-effect waves-light">
                <i class="material-icons left">shopping_cart</i>
                Comprar
            </button>
        </form>

    </div>
</div>

@endsection
