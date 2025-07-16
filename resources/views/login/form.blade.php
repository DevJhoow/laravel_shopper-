<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Materialize CSS e Ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        body {
            background-color: #2c2c2c; /* Cinza escuro, mas mais claro que preto */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 12px;
        }

        label {
            color: white;
        }

        input {
            color: white;
        }

        .input-field input:focus + label {
            color: orange !important;
        }

        .input-field input:focus {
            border-bottom: 1px solid orange !important;
            box-shadow: 0 1px 0 0 orange !important;
        }
    </style>
</head>
<body>

    <div class="card login-card blue darken-3 z-depth-4">
        @if ($mensagem = Session::get('erro'))
            <div class="card-panel red lighten-2 white-text center-align">
                <i class="material-icons left">error</i>
                {{ $mensagem }}
            </div>
        @endif

        @if ($errors->any())
            <div class="card-panel orange lighten-3">
                @foreach ($errors->all() as $error)
                    <p class="red-text text-darken-4"><i class="material-icons left">warning</i> {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.auth') }}" method="post">
            @csrf

            <div class="input-field">
                <i class="material-icons prefix white-text">email</i>
                <input type="email" name="email" id="email" class="validate white-text" placeholder="jonathan@gmail.com">
                <label for="email">Email</label>
            </div>

           <div class="input-field">
                <i class="material-icons prefix white-text">lock</i>
                <input type="password" name="password" id="password" class="validate white-text" placeholder="jona2020">
                <label for="password">Senha</label>
            </div>

            <p>
                <label>
                    <input type="checkbox" name="remember" />
                    <span>Lembrar-me</span>
                </label>
            </p>

            <div class="center">
                <button type="submit" class="btn orange lighten-1 waves-effect waves-light">
                    <i class="material-icons left">login</i> Entrar
                </button>
            </div>
            <div class="center-align" style="margin-top: 15px;">
                <a href="{{ route('site.index') }}" class="btn-flat grey-text text-darken-2">
                    <i class="material-icons left">arrow_back</i>
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <!-- JS do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
