<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Endereço e Contato</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="cadastro-page">
        <header class="cadastro-header">
            <h1 class="titulo cadastro-titulo">CADASTRO</h1>
            <p class="subtitulo cadastro-subtitulo">Certifique-se de que os dados estão corretos</p>
        </header>

        <section class="cadastro-top-area">
            <div class="cadastro-progress">
                <div class="cadastro-circle done"></div>
                <div class="cadastro-line done"></div>
                <div class="cadastro-circle active"></div>
                <div class="cadastro-line"></div>
                <div class="cadastro-circle"></div>
            </div>

            <button class="btn Vd cadastro-btn-next" type="submit" form="formEndereco">
                Próximo
            </button>
        </section>

        <section class="cadastro-form-box">
            <div class="cadastro-section-title">
                Endereço e Contato
            </div>

            <form id="formEndereco" method="POST" action="{{ route('candidato.endereco') }}" class="cadastro-form">
                @csrf

                @if ($errors->any())
                    <div class="cadastro-error-box">
                        Preencha todos os campos obrigatórios corretamente.
                    </div>
                @endif

                <div class="cadastro-row">
                    <div class="cadastro-field cadastro-small">
                        <label for="cep">CEP:</label>
                        <input
                            type="text"
                            id="cep"
                            name="cep"
                            placeholder="00.000-00"
                            value="{{ old('cep') }}"
                        >
                    </div>

                    <div class="cadastro-field cadastro-flex-grow">
                        <label for="logradouro">Logradouro:</label>
                        <input
                            type="text"
                            id="logradouro"
                            name="logradouro"
                            placeholder="Preencher..."
                            value="{{ old('logradouro') }}"
                        >
                    </div>
                </div>

                <div class="cadastro-row">
                    <div class="cadastro-field cadastro-small">
                        <label for="numero">Número:</label>
                        <input
                            type="text"
                            id="numero"
                            name="numero"
                            placeholder="00000"
                            value="{{ old('numero') }}"
                        >
                    </div>

                    <div class="cadastro-field cadastro-small">
                        <label for="complemento">Complemento:</label>
                        <input
                            type="text"
                            id="complemento"
                            name="complemento"
                            placeholder="Preencher..."
                            value="{{ old('complemento') }}"
                        >
                    </div>

                    <div class="cadastro-field cadastro-small">
                        <label for="bairro">Bairro:</label>
                        <input
                            type="text"
                            id="bairro"
                            name="bairro"
                            placeholder="Preencher"
                            value="{{ old('bairro') }}"
                        >
                    </div>
                </div>

                <div class="cadastro-row">
                    <div class="cadastro-field cadastro-flex-grow">
                        <label for="estado">Estado:</label>
                        <input
                            type="text"
                            id="estado"
                            name="estado"
                            placeholder="Preencher..."
                            value="{{ old('estado') }}"
                        >
                    </div>

                    <div class="cadastro-field cadastro-flex-grow">
                        <label for="cidade">Cidade:</label>
                        <input
                            type="text"
                            id="cidade"
                            name="cidade"
                            placeholder="Preencher..."
                            value="{{ old('cidade') }}"
                        >
                    </div>
                </div>

                <div class="cadastro-row">
                    <div class="cadastro-field cadastro-small">
                        <label for="telefone">Telefone:</label>
                        <input
                            type="text"
                            id="telefone"
                            name="telefone"
                            placeholder="00 0000-0000"
                            value="{{ old('telefone') }}"
                        >
                    </div>

                    <div class="cadastro-field cadastro-small">
                        <label for="celular">Celular:</label>
                        <input
                            type="text"
                            id="celular"
                            name="celular"
                            placeholder="00 00000-0000"
                            value="{{ old('celular') }}"
                        >
                    </div>
                </div>

                <div class="cadastro-buttons">
                    <button type="button" class="btn Vm cadastro-btn-cancelar" onclick="window.location.href='/'">
                        Cancelar
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>