<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class siteController extends Controller
{
    public function index()
    {
        $produtos = Produtos::take(4)->get();
        return view('site.home', compact('produtos'));
    }

    public function details($id)
    {
        $produto = Produtos::where('id', $id)->first();

        // Gate::authorize('ver-produto', $produto);
        $this->authorize('verProduto', $produto);

        return view('site.details', compact('produto'));
    }

    public function categoria($id)
    {
        $categoria = Categoria::find($id);
        $produtos = Produtos::where('categoria_id', $id)->paginate(5);
        return view('site.categoria', compact('produtos', 'categoria'));
    }
}
