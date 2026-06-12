<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Painel de Teste - Candidato</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <style>

        body{
            margin:0;

            font-family:Arial,sans-serif;

            background:#f7fafc;
        }

        .container{

            max-width:900px;

            margin:60px auto;

            padding:30px;

            background:white;

            border-radius:12px;

            box-shadow:0 5px 20px rgba(0,0,0,.08);

        }

        h1{

            color:#166534;

            margin-bottom:10px;

        }

        p{

            color:#4b5563;

        }

        .painel{

            margin-top:30px;

            background:#f0fff4;

            padding:20px;

            border-radius:10px;

            border-left:6px solid #22c55e;

        }

        .painel h3{

            margin-top:0;

            color:#14532d;

        }

        a{

            color:#15803d;

            text-decoration:none;

            font-weight:bold;

        }

        a:hover{

            text-decoration:underline;

        }

        .logout{

            margin-top:30px;

        }

        .logout button{

            background:#4b5563;

            color:white;

            border:none;

            padding:12px 20px;

            border-radius:8px;

            cursor:pointer;

        }

        .logout button:hover{

            background:#374151;

        }

    </style>

</head>

<body>

<div class="container">

    <h1>
        Área do Candidato
    </h1>

    <p>
        Login realizado com sucesso.
    </p>

    <p>
        Usuário autenticado como
        <strong>Candidato</strong>
        (tipo_usuario_id = 2)
    </p>


    <div class="painel">

        <h3>
            Próximos passos
        </h3>

        <p>

            Acesse seu perfil para concluir o cadastro.

        </p>

        <p>

            <a href="{{ route('candidato.dados-pessoais') }}">

                Abrir Perfil do Candidato

            </a>

        </p>

    </div>


    <form action="{{ route('logout') }}" method="POST">

@csrf

<button type="submit">

Sair

</button>

</form>

</div>

</body>

</html>