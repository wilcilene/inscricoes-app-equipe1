<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Projeto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { 
            /* ADICIONADO AQUI: O Laravel busca direto da pasta public/imagens/fundo.jpg */
            background-image: url("{{ asset('img/ifccampus.jpg') }}"); 
            
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;
            display: flex; 
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
        }
        .login-container { 
            width: 100%; 
            max-width: 400px; 
            padding: 20px; 
            /* Mudamos para um branco semi-transparente pro fundo aparecer de forma elegante */
            background: rgba(255, 255, 255, 0.9); 
            border-radius: 8px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
        }
    </style>
</head>
<body>

<div class="login-container">
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

<script>
    const form = document.getElementById('loginForm');
    const errorAlert = document.getElementById('errorMessage');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); 
        errorAlert.classList.add('d-none'); 

        // Validação de campos vazios
        if (!form.checkValidity()) {
            event.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        // Leitura dos dados digitados
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const abaAtiva = document.querySelector('.nav-link.active').id;

        // Validação e Redirecionamento correto por perfil
        if (abaAtiva === 'candidato-tab' && email === 'candidato@teste.com' && password === '123456') {
            alert('Sucesso! Redirecionando para a Dashboard do Candidato...');
            window.location.href = 'https://google.com'; 
        } else if (abaAtiva === 'admin-tab' && email === 'admin@teste.com' && password === 'admin123') {
            alert('Sucesso! Redirecionando para o Painel Administrativo...');
            window.location.href = 'https://github.com'; 
        } else {
            // Mensagem de erro para credenciais inválidas
            errorAlert.classList.remove('d-none');
        }
    });

    // Evento do botão cadastrar
    document.getElementById('btnCadastrar').addEventListener('click', () => {
        alert('Aqui você abriria a tela ou modal de cadastro!');
    });
</script>
</body>
</html>