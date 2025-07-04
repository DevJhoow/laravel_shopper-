@extends('site.layout')

@section('content')
    <div class="container">
        <div class="row">

            @if ($mensagem = Session::get('sucesso'))
                <div class="row" style="margin-top: 10px;">
                    <div class="col s12 m6 offset-m3">
                        <div class="card-panel green lighten-1 z-depth-2 white-text" style="padding: 10px;">
                            <div class="valign-wrapper">
                                <i class="material-icons left" style="margin-right: 10px;">check_circle</i>
                                <span style="font-size: 16px;">{{ $mensagem }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- @if ($mensagem = Session::get('aviso'))
                <div class="row" style="margin-top: 10px;">
                    <div class="col s12 m6 offset-m3">
                        <div class="card-panel green lighten-1 z-depth-2 white-text" style="padding: 10px;">
                            <div class="valign-wrapper">
                                <i class="material-icons left" style="margin-right: 10px;">check_circle</i>
                                <span style="font-size: 16px;">{{ $mensagem }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif --}}

            @if ($itens->count() == 0) 

                  <div class="row">
                    <div class="col s12 m6 offset-m3">
                        <div class="card-panel amber lighten-4 z-depth-2 black-text" style="padding: 10px;">
                            <div class="valign-wrapper">
                                <i class="material-icons left" style="margin-right: 10px; color: #f57c00;">shopping_cart</i>
                                <span style="font-size: 16px;">
                                    Seu carrinho está vazio. Aproveite as <strong>novas promoções</strong>!
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @else

                <h4 class="center-align"><i class="material-icons blue-text">shopping_cart</i> Carrinho</h4>
                <h6 class="center-align">Seu carrinho possui <strong>{{ $itens->count() }}</strong> produtos</h6>

                <table class="striped responsive-table highlight">
                    <thead class="blue-text text-darken-3">
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th></th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($itens as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                                <td>
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="browser-default" style="width: 70px;">
                                </td>
                            <td>
                                <td>
                                    <div style="display: flex; gap: 8px;">
                                        {{-- Botão Atualizar --}}
                                        <form action="{{ route('site.atualizaCarrinho') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="quantity" value="{{ $item->quantity }}">
                                            <button type="submit" class="btn-floating waves-effect blue tooltipped" data-position="top" data-tooltip="Atualizar">
                                                <i class="material-icons">cached</i>
                                            </button>
                                        </form>

                                        {{-- Botão Deletar --}}
                                        <form action="{{ route('site.removeCarrinho') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn-floating waves-effect red tooltipped" data-position="top" data-tooltip="Remover">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if (Cart::getContent()->count() > 0)
                    <div class="row" style="margin-top: 15px;">
                        <div class="col s12 m6 offset-m3">
                            <div class="card-panel teal lighten-2 z-depth-1 white-text center-align" style="padding: 15px;">
                                <div class="valign-wrapper center-align" style="justify-content: center;">
                                    <i class="material-icons left" style="margin-right: 8px;">credit_card</i>
                                    <span style="font-size: 16px;">Pague em até <strong>12x sem juros</strong></span>
                                </div>
                                <div style="margin-top: 10px;">
                                    <strong>Valor total:</strong> R$ {{ number_format(Cart::getTotal(), 2, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            <div class="row center-align" style="margin-top: 30px;">
                <a href="{{ route('site.index') }}" class="btn-large blue lighten-1 waves-effect waves-light">
                    <i class="material-icons left">arrow_back</i> Continuar comprando
                </a>

                <a href="{{ route('site.limparCarrinho') }}" class="btn-large red lighten-1 waves-effect waves-light" style="margin-left: 10px;">
                    <i class="material-icons left">clear</i> Limpar carrinho
                </a>

                <a href="" class="btn-large green darken-2 waves-effect waves-light" style="margin-left: 10px;">
                    <i class="material-icons left">check</i> Finalizar pedido
                </a>
            </div>
        </div>
    </div>
@endsection

