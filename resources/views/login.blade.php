<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Projeto</title>
<<<<<<< HEAD
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="body-login"> <div class="login-container">
    <ul class="nav nav-tabs nav-fill mb-4" id="loginTabs" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="candidato-tab" data-bs-toggle="tab" data-bs-target="#candidato" type="button" role="tab">Candidato</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button" role="tab">Administrador</button>
        </li>
    </ul>

    <form id="loginForm" novalidate>
        
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" required placeholder="seu@email.com">
            <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" required placeholder="Sua senha">
            <div class="invalid-feedback">A senha é obrigatória.</div>
        </div>

        <div class="alert alert-danger d-none" id="errorMessage" role="alert">
            Credenciais inválidas! Tente novamente.
        </div>

        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-primary">Entrar</button>
            <button type="button" class="btn btn-outline-secondary" id="btnCadastrar">Cadastrar</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('js/login.js') }}"></script>

=======

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
>>>>>>> origin/feature/telas-candidato-felipe
</body>
</html>