<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Dados Pessoais</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="dados-page">
        <header class="dados-header">
            <h1 class="titulo dados-titulo">CADASTRO</h1>
            <p class="subtitulo dados-subtitulo">Certifique-se de que os dados estão corretos</p>
        </header>

        <section class="dados-top-area">
            <div class="dados-progress">
                <div class="dados-circle active"></div>
                <div class="dados-line"></div>
                <div class="dados-circle"></div>
                <div class="dados-line"></div>
                <div class="dados-circle"></div>
            </div>

            <button class="btn Vd dados-btn-next" type="button" onclick="window.location.href='{{ route('candidato.cadastro') }}'">
                Próximo
            </button>
        </section>

        <section class="dados-form-box">
            <div class="dados-section-title">
                Dados Pessoais
            </div>

            <form class="dados-form">
                <div class="dados-row">
                    <div class="dados-field dados-full">
                        <label for="nome_completo">Nome Completo*:</label>
                        <input type="text" id="nome_completo" name="nome_completo" placeholder="Preencher">
                    </div>
                </div>

                <div class="dados-row">
                    <div class="dados-field dados-full">
                        <label for="nome_social">Nome Social (se houver):</label>
                        <input type="text" id="nome_social" name="nome_social" placeholder="Preencher">
                    </div>
                </div>

                <div class="dados-row">
                    <div class="dados-field dados-medium">
                        <label for="cpf">CPF*:</label>
                        <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00">
                    </div>

                    <div class="dados-field dados-medium">
                        <label for="data_nascimento">Data de Nascimento*:</label>
                        <input type="text" id="data_nascimento" name="data_nascimento" placeholder="dd/mm/aaaa">
                    </div>

                    <div class="dados-field dados-medium">
                        <label for="genero">Gênero*:</label>
                        <select id="genero" name="genero">
                            <option value="">Selecione</option>
                            <option value="feminino">Feminino</option>
                            <option value="masculino">Masculino</option>
                            <option value="outro">Outro</option>
                            <option value="nao_informar">Prefiro não informar</option>
                        </select>
                    </div>

                    <div class="dados-field dados-medium">
                        <label for="naturalidade">Naturalidade*:</label>
                        <select id="naturalidade" name="naturalidade">
                            <option value="">Selecione</option>
                            <option value="brasileira">Brasileira</option>
                            <option value="estrangeira">Estrangeira</option>
                        </select>
                    </div>
                </div>

                <div class="dados-row">
                    <div class="dados-field dados-half">
                        <label for="mae">Mãe*:</label>
                        <input type="text" id="mae" name="mae" placeholder="Preencher">
                    </div>

                    <div class="dados-field dados-half">
                        <label for="pai">Pai:</label>
                        <input type="text" id="pai" name="pai" placeholder="Preencher">
                    </div>
                </div>

                <div class="dados-row">
                    <div class="dados-field dados-half">
                        <label for="area_profissional">Área Profissional de Atuação do Candidato*:</label>
                        <input type="text" id="area_profissional" name="area_profissional" placeholder="Preencher">
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>
</html>