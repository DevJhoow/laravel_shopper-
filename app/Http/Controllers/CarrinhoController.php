<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = Cart::getContent();
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => (float) $request->price, 
            'quantity' => (int) $request->qnt, 
            'attributes' => [
                'image' => $request->image
            ]
         ]);

         return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado com sucesso');
    }

    public function removeCarrinho(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso');
    }

    public function atualizaCarrinho(Request $request)
    {
        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Carrinho atualizado com sucesso');
    }

    public function limparCarrinho()
    {
        Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho esta vazio');

    }

    public function finalizarPedido()
    {
        $itens = Cart::getContent();

        foreach ($itens as $item) {
            Compra::create([
                'user_id' => Auth::id(),
                'produto_id' => $item->id,
                'quantidade' => $item->quantity,
                'preco_unitario' => $item->price,
            ]);
        }

        Cart::clear();

        return redirect()->route('usuario.compras')->with('sucesso', 'Pedido finalizado com sucesso!');
    }

    //Compras 
    public function minhasCompras()
    {
        $compras = Compra::where('user_id', Auth::id())->with('produto')->latest()->get();

        return view('admin.compras', compact('compras'));
    }

}
