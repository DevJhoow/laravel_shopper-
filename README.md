🛒 E-commerce Laravel - Projeto de Aprendizado

Este é um projeto de e-commerce desenvolvido com Laravel, com foco em aprendizado e prática dos recursos mais importantes do framework. O sistema permite cadastro de produtos, autenticação de usuários, proteção por autorização e muito mais.
⚙️ Tecnologias utilizadas

    PHP 8+

    Laravel 10

    MySQL

    Blade (templating)

    Materialize CSS (front-end)

    Faker / Factory / Seeder

    Policies e Gates (autorização)

    Auth (login e registro)

✅ Funcionalidades implementadas

    Registro e login de usuários

    Cadastro e listagem de produtos

    Associação de produtos a usuários e categorias

    Autorização com Policy (ex: usuário só pode ver seu próprio produto)

    Seeders e Factories para gerar dados automáticos

    Validações de formulários

    Views organizadas com Blade

    Design responsivo com Materialize CSS

🔐 Autorização com Policy

Exemplo de regra criada:

public function verProduto(User $user, Produtos $produto)
{
    return $user->id === $produto->user_id;
}

Usada no controller assim:

$this->authorize('verProduto', $produto);

🧪 Seeders com Factory

Para gerar produtos e usuários rapidamente, foi criada uma factory:

Produtos::factory()->count(20)->create();

Cada produto é vinculado a um usuário e uma categoria usando user_id e categoria_id com dados aleatórios.
📁 Estrutura resumida do projeto

app/
├── Models/           → Models: User, Produtos, Categoria
├── Policies/         → ProdutoPolicy.php
├── Http/
│   ├── Controllers/  → ProdutoController.php, AuthController.php
database/
├── seeders/          → ProdutoSeeder.php, CategoriaSeeder.php
├── factories/        → ProdutoFactory.php
resources/
├── views/            → Blade templates com Materialize
routes/
├── web.php

🚀 Como rodar o projeto

# Clonar o repositório
git clone https://github.com/DevJhoow/laravel-ecommerce.git
cd laravel-ecommerce

# Instalar dependências
composer install

# Criar o .env e configurar banco de dados
cp .env.example .env
php artisan key:generate

# Rodar as migrations e seeders
php artisan migrate --seed

# Rodar o servidor
php artisan serve

💡 Objetivo do projeto

Este projeto foi criado com o objetivo de praticar os recursos mais importantes do Laravel, incluindo CRUD, autenticação, autorização, seeders, factories e organização de código real.
A ideia é evoluir esse sistema futuramente com carrinho de compras, pedidos e integração com APIs de pagamento.
👨‍💻 Autor

    Jonathan Luís (DevJhoow)

    https://github.com/DevJhoow

