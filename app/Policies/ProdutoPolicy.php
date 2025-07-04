<?php

namespace App\Policies;

use App\Models\Produtos;
use App\Models\User;

class ProdutoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function verProduto(User $user, Produtos $produto)
    {
        return $user->id === $produto->user_id; 
    }
}
