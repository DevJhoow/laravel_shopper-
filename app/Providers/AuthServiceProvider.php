<?php

namespace App\Providers;

use App\Models\Produtos;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Produtos' => 'App\Policies\ProdutoPolicy',
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('ver-produto', function (User $user, Produtos $produto) {
            return $user->id === $produto->user_id; 
        });
    }
}
