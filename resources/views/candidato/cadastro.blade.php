<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Endereço e Contato</title>

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
            background: #dbe9f5;
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

        .btn-next {
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
            padding: 20px 25px 30px;
        }

        .row {
            display: flex;
            gap: 35px;
            margin-bottom: 18px;
            align-items: flex-end;
        }

        .field {
            display: flex;
            flex-direction: column;
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

        .small {
            width: 190px;
        }

        .flex-grow {
            flex: 1;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 70px;
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
                <div class="circle active"></div>
                <div class="line"></div>
                <div class="circle"></div>
            </div>

            <button class="btn-next" type="submit" form="formEndereco">Próximo</button>
        </div>

        <div class="form-box">
            <div class="section-title">Endereço e Contato</div>

            <form id="formEndereco" method="POST" action="{{ route('candidato.endereco') }}">
                @csrf

                @if ($errors->any())
                    <div class="error-box">
                        Preencha todos os campos obrigatórios corretamente.
                    </div>
                @endif

                <div class="row">
                    <div class="field small">
                        <label for="cep">CEP:</label>
                        <input type="text" id="cep" name="cep" placeholder="00.000-00" value="{{ old('cep') }}">
                    </div>

                    <div class="field flex-grow">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" id="logradouro" name="logradouro" placeholder="Preencher..." value="{{ old('logradouro') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="field small">
                        <label for="numero">Número:</label>
                        <input type="text" id="numero" name="numero" placeholder="00000" value="{{ old('numero') }}">
                    </div>

                    <div class="field small">
                        <label for="complemento">Complemento:</label>
                        <input type="text" id="complemento" name="complemento" placeholder="Preencher..." value="{{ old('complemento') }}">
                    </div>

                    <div class="field small">
                        <label for="bairro">Bairro:</label>
                        <input type="text" id="bairro" name="bairro" placeholder="Preencher" value="{{ old('bairro') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="field flex-grow">
                        <label for="estado">Estado:</label>
                        <input type="text" id="estado" name="estado" placeholder="Preencher..." value="{{ old('estado') }}">
                    </div>

                    <div class="field flex-grow">
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade" placeholder="Preencher..." value="{{ old('cidade') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="field small">
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" placeholder="00 0000-0000" value="{{ old('telefone') }}">
                    </div>

                    <div class="field small">
                        <label for="celular">Celular:</label>
                        <input type="text" id="celular" name="celular" placeholder="00 00000-0000" value="{{ old('celular') }}">
                    </div>
                </div>

                <div class="buttons">
                    <button type="button" class="btn-red" onclick="window.location.href='/'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
