<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     public function index()
    {
        $userId = Auth::id();

        $produtos = Produtos::where('user_id', $userId)->get();

        // Supondo que você tenha um model chamado Compra
        $compras = Compra::where('user_id', $userId)->get();

        return view('admin.dashboard', compact('produtos', 'compras'));
    }

    public function minhasPostagens()
    {
        $produtos = Produtos::where('user_id', Auth::id())->latest()->get();

        return view('admin.postagens', compact('produtos'));
    }
}
