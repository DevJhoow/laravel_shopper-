<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Materialize CSS e Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>@yield('title')</title>

    <style>
        nav {
            background-color: #e65100; /* laranja escuro */
        }

        .dropdown-content li > a,
        .dropdown-content li > span {
            color: #212121; /* preto */
        }

        .brand-logo i {
            vertical-align: middle;
            margin-right: 5px;
        }

        .nav-user {
            margin-left: 250px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>
<body>

    <!-- Dropdown categorias -->
    <ul id="dropdown1" class="dropdown-content">
        @foreach ($categorias as $categoria)
            <li><a href="{{ route('site.categoria', $categoria->id) }}">{{ $categoria->nome }}</a></li>
        @endforeach
    </ul>

    <!-- Dropdown usuário -->
    <ul id="userDropdown" class="dropdown-content">
        <li><a href="{{ route('admin.dashboard') }}"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="{{ route('login.logout') }}"><i class="material-icons">logout</i>Logout</a></li>
        <li class="divider"></li>
      
    </ul>

    <!-- Navbar -->
    <nav>
        <div class="nav-wrapper container">
            {{-- Logo --}}
            <a href="{{ route('site.index') }}" class="brand-logo">
                <i class="material-icons">store</i>Laravel Shopper
            </a>

            {{-- Dropdown do usuário à direita do logo --}}
            @auth
                {{-- logado  --}}
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="userDropdown">
                            <i class="material-icons left">person</i>
                            Olá {{ Str::ucfirst(Str::lower(Auth::user()->name)) }}
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>
            @else
                {{-- deslogado --}}
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="{{ route('login.form') }}">
                            <i class="material-icons left">person</i>
                            Login
                            <i class="material-icons right">lock</i>
                        </a>
                    </li>
                </ul>
            @endauth

            {{-- Menus principais à direita da tela --}}
            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                        <i class="material-icons left">apps</i>Categorias
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('site.carrinho') }}" class="btn blue lighten-1 waves-effect waves-light">
                        <i class="material-icons left">shopping_cart</i>
                        Carrinho
                        <span class="new badge red" data-badge-caption="">{{ Cart::getContent()->count() }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="page-footer black darken-4">
        <div class="container">
            <div class="row">
                <div class="col s12 center white-text">
                    © 2025 Laravel Shopper - Todos os direitos reservados
                </div>
            </div>
        </div>
    </footer>

    <!-- JS do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        const elems = document.querySelectorAll('.dropdown-trigger');
        const instances = M.Dropdown.init(elems, {
            constrainWidth: false,
            coverTrigger: false,
            closeOnClick: true,
            hover: false,
            alignment: 'left'
        });

        // Ativa os modais
        const modals = document.querySelectorAll('.modal');
        M.Modal.init(modals);

        // Fecha dropdown ao clicar fora
        document.addEventListener('click', function (event) {
            instances.forEach(instance => {
                if (!event.target.closest('.dropdown-trigger') && !event.target.closest('.dropdown-content')) {
                    instance.close();
                }
            });
        });
    });

    </script>

</body>
</html>
