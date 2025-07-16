<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    
    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Responsivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f5f5f5;
        }

        .card {
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="card z-depth-3">
                    <div class="card-content">
                        <span class="card-title center-align">Cadastro de Usuário</span>

                        <form action="{{ route('users.store') }}" method="post">
                            @csrf

                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="name" id="name" required>
                                <label for="name">Nome</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input type="email" name="email" id="email" required>
                                <label for="email">E-mail</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" name="password" id="password" required>
                                <label for="password">Senha</label>
                            </div>

                            <div class="center-align">
                                <button class="btn waves-effect waves-light" type="submit">
                                    <i class="material-icons left">send</i>
                                    Cadastrar
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
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>
