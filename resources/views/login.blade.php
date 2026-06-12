<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Projeto</title>


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="login-page">
        <section class="login-card">
            <h1 class="login-title">ACESSO AO SISTEMA</h1>

            <div class="login-tabs">
                <button type="button" class="login-tab active">Candidato</button>
                <button type="button" class="login-tab">Administrador</button>
            </div>

            <form class="login-form">
                <div class="login-field">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Preencher">
                </div>

                <div class="login-field">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Preencher">
                </div>

                <div class="login-buttons">
                    <button type="button" class="login-btn login-btn-cadastrar"
                        onclick="window.location.href='{{ route('candidato.dados-pessoais') }}'">
                        Cadastrar
                    </button>

                    <button type="button" class="login-btn login-btn-entrar">
                        Entrar
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>