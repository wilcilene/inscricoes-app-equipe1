<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-container{
            width:100%;
            max-width:400px;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="login-container">

    <h2 class="text-center mb-4">
        Login
    </h2>

    <form>

        <div class="mb-3">
            <label>E-mail</label>

            <input type="email"
                   class="form-control"
                   placeholder="Digite seu e-mail">
        </div>

        <div class="mb-3">
            <label>Senha</label>

            <input type="password"
                   class="form-control"
                   placeholder="Digite sua senha">
        </div>

        <button class="btn btn-primary w-100">
            Entrar
        </button>

    </form>

</div>

</body>
</html>