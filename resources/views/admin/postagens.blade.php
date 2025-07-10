@extends('site.layout')

@section('content')
<div class="container">
    <h4 class="center-align orange-text text-darken-4">
        <i class="material-icons left">assignment</i>
        Minhas Postagens
    </h4>

    <div class="right-align" style="margin-top: 20px;">
        <a href="{{ route('admin.dashboard') }}" class="btn-flat orange-text text-darken-4">
            <i class="material-icons left">arrow_back</i>
            Voltar ao Painel
        </a>
    </div>

    @if ($produtos->isEmpty())
        <div class="card-panel yellow lighten-4 center">
            <span class="black-text">Você ainda não postou nenhum produto.</span>
        </div>
    @else
        <table class="striped responsive-table">
            <thead class="orange lighten-2 white-text">
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Criado em</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>
                            <img src="{{ $produto->imagem ?? 'https://via.placeholder.com/100x70' }}" width="100">
                        </td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ Str::limit($produto->descricao, 50) }}</td>
                        <td>{{ $produto->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
