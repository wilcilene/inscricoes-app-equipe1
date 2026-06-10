<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Senha de Acesso</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #e5e5e5;
            color: #333;
            font-family: 'Inter', Arial, Helvetica, sans-serif;
        }

        .page {
            min-height: 100vh;
            padding: 55px 70px;
        }

        h1 {
            font-size: 44px;
            margin: 0;
            font-weight: 800;
        }

        .subtitle {
            font-size: 20px;
            margin-top: 6px;
            margin-bottom: 25px;
        }

        .top-area {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin-bottom: 35px;
        }

        .progress {
            display: flex;
            align-items: center;
        }

        .circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #777;
            border: 4px solid #555;
            box-shadow: 0 2px 5px rgba(0,0,0,0.4);
        }

        .circle.done {
            background: #22b14c;
        }

        .circle.active {
            background: #d71920;
        }

        .line {
            width: 120px;
            height: 4px;
            background: #777;
        }

        .line.done {
            background: #22b14c;
        }

        .btn-finalizar {
            position: absolute;
            right: 90px;
            background: #299b3f;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 12px 65px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 3px 5px rgba(0,0,0,0.35);
            cursor: pointer;
        }

        .form-box {
            background: white;
            width: 82%;
            min-height: 430px;
            margin: 0 auto;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }

        .section-title {
            font-size: 22px;
            font-weight: bold;
            padding: 15px 25px 10px;
            border-bottom: 1px solid #ccc;
        }

        form {
            padding: 25px 35px 30px;
        }

        .row {
            display: flex;
            gap: 45px;
            margin-bottom: 35px;
        }

        .field {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        label {
            font-size: 16px;
            margin-bottom: 6px;
        }

        input {
            height: 34px;
            border: 1px solid #aaa;
            border-radius: 4px;
            padding: 6px 10px;
            font-size: 16px;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 145px;
        }

        .btn-red {
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 7px;
            padding: 12px 55px;
            cursor: pointer;
            box-shadow: 0 3px 5px rgba(0,0,0,0.35);
            background: #d71920;
        }

        .error-box {
            background: #ffdede;
            border: 1px solid #d71920;
            color: #900;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="page">
        <h1>CADASTRO</h1>
        <p class="subtitle">Certifique-se de que os dados estão corretos</p>

        <div class="top-area">
            <div class="progress">
                <div class="circle done"></div>
                <div class="line done"></div>
                <div class="circle done"></div>
                <div class="line"></div>
                <div class="circle active"></div>
            </div>

            <button class="btn-finalizar" type="submit" form="formCredenciais">Finalizar</button>
        </div>

        <div class="form-box">
            <div class="section-title">Senha de Acesso</div>

            <form id="formCredenciais" method="POST" action="{{ route('candidato.store') }}">
                @csrf

                @if ($errors->any())
                    <div class="error-box">
                        Preencha email, confirmação de email, senha e confirmação de senha corretamente.
                    </div>
                @endif

                <div class="row">
                    <div class="field">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Preencher..." value="{{ old('email') }}">
                    </div>

                    <div class="field">
                        <label for="email_confirmation">Confirmar Email:</label>
                        <input type="email" id="email_confirmation" name="email_confirmation" placeholder="Preencher..." value="{{ old('email_confirmation') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <label for="password">Senha:</label>
                        <input type="password" id="password" name="password" placeholder="Preencher...">
                    </div>

                    <div class="field">
                        <label for="password_confirmation">Confirmar Senha:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Preencher...">
                    </div>
                </div>

                <div class="buttons">
                    <button type="button" class="btn-red" onclick="window.location.href='/candidato/cadastro'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>