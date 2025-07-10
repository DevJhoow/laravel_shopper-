@extends('site.layout')

@section('content')
    <!-- Boas-vindas -->
    <div class="container">
        <h4 class="center-align orange-text text-darken-4">
            <i class="material-icons left">dashboard</i>
            Olá, {{ Str::ucfirst(Str::lower(Auth::user()->name)) }}! Bem-vindo ao seu painel de controle.
        </h4>
        <p class="center-align grey-text text-darken-1">
            Aqui você pode acompanhar seus pedidos, editar suas informações e continuar com suas compras.
        </p>
    </div>

    <!-- Cards do Dashboard -->
    <div class="container">
        <div class="row" style="display: flex; flex-wrap: wrap; justify-content: center;">

            <!-- Meus Dados -->
            <div class="col s12 m6 l3" style="margin-bottom: 20px;">
                <div class="card hoverable">
                    <div class="card-content center">
                        <i class="material-icons large orange-text text-darken-4">person</i>
                        <span class="card-title black-text">Meus Dados</span>
                        <p class="grey-text">Veja ou atualize seu perfil.</p>
                    </div>
                    <div class="card-action center">
                        <a class="orange-text text-darken-4 modal-trigger" href="#modal-editar-perfil">Editar Perfil</a>
                    </div>
                </div>
            </div>

            <!-- Postagens -->
            <div class="col s12 m6 l3" style="margin-bottom: 20px;">
                <div class="card hoverable">
                    <div class="card-content center">
                        <i class="material-icons large orange-text text-darken-4">assignment</i>
                        <span class="card-title black-text">Postagens</span>
                        <p class="grey-text">Acompanhe seus produtos postados.</p>
                    </div>
                    <div class="card-action center">
                        <a href="{{ route('usuario.postagens') }}" class="orange-text text-darken-4">
                            Ver Postagens <strong>{{ $produtos->count() }}</strong>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Compras -->
            <div class="col s12 m6 l3" style="margin-bottom: 20px;">
                <div class="card hoverable">
                    <div class="card-content center">
                        <i class="material-icons large orange-text text-darken-4">shopping_cart</i>
                        <span class="card-title black-text">Compras</span>
                        <p class="grey-text">Acompanhe suas compras.</p>
                    </div>
                    <div class="card-action center">
                        <a href="{{ route('usuario.compras') }}" class="green-text text-darken-4">
                            Ver Compras <span class="grey-text">({{ $compras->count() }})</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal de Edição de Nome -->
    <div id="modal-editar-perfil" class="modal">
        <div class="modal-content">
            <h5 class="orange-text text-darken-4">Editar Nome</h5>

            <form method="POST" action="{{ route('users.update', Auth::user()->id) }}">
                @csrf
                @method('PUT')

                <div class="input-field">
                    <input id="name" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                    <label for="name" class="active">Nome</label>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="modal-close waves-effect waves-green btn orange darken-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
