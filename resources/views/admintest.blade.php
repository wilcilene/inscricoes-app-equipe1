<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Painel de Teste - Administrador</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <style>

        body{
            margin:0;
            font-family:Arial, sans-serif;
            background:#f5f7fa;
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

            color:#1f2937;

            margin-bottom:10px;

        }

        p{

            color:#4b5563;

        }

        .painel{

            margin-top:30px;

            background:#eef2ff;

            padding:20px;

            border-radius:10px;

        }

        .painel h3{

            margin-top:0;

        }

        ul{

            padding-left:20px;

        }

        li{

            margin-bottom:10px;

        }

        .logout{

            margin-top:30px;

        }

        .logout button{

            background:#dc2626;

            color:white;

            border:none;

            padding:12px 20px;

            border-radius:8px;

            cursor:pointer;

        }

        .logout button:hover{

            background:#b91c1c;

        }

    </style>

</head>

<body>

<div class="container">

    <h1>
        Área Restrita — Administrador
    </h1>

    <p>
        Login realizado com sucesso.
    </p>

    <p>
        Usuário autenticado como
        <strong>Administrador</strong>
        (tipo_usuario_id = 1)
    </p>


    <div class="painel">

        <h3>
            Funções disponíveis
        </h3>

        <ul>

            <li>
                Gerenciar editais
            </li>

            <li>
                Verificar inscrições
            </li>

            <li>
                Visualizar candidatos
            </li>

            <li>
                Aprovar processos
            </li>

        </ul>

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