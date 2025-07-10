@extends('site.layout')

@section('content')
<div class="container">
    <h4 class="center-align orange-text text-darken-4">
        <i class="material-icons left">shopping_bag</i>
        Minhas Compras
    </h4>

    @if (session('sucesso'))
        <div class="card-panel green white-text">{{ session('sucesso') }}</div>
    @endif

    @if ($compras->isEmpty())
        <div class="card-panel amber lighten-4 black-text center">
            Você ainda não realizou nenhuma compra.
        </div>
    @else
        <div class="row">
            @foreach ($compras as $compra)
               <div class="col s12 m4 l3">
                    <div class="card hoverable small">
                        <div>
                            <img src="{{ $compra->produto->imagem ?? 'https://via.placeholder.com/200x120' }}" style="width: 100%; height: 120px; object-fit: cover;">
                        </div>
                        <div style="padding: 10px;">
                            <p style="margin: 0; font-weight: bold;">{{ $compra->produto->nome }}</p>
                            <p style="margin: 0;">R$ {{ number_format($compra->preco_unitario, 2, ',', '.') }} | Qtd: {{ $compra->quantidade }}</p>
                            <span class="grey-text" style="font-size: 12px;">{{ $compra->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="right-align">
        <a href="{{ route('admin.dashboard') }}" class="btn-flat orange-text text-darken-4">
            <i class="material-icons left">arrow_back</i> Voltar ao Painel
        </a>
    </div>
</div>
@endsection
