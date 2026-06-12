<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - Instituto Federal</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">
        @php $activePage = 'perfil'; @endphp
        @include('sidebar', ['activePage' => $activePage])
        <main class="main-content">
            <header class="content-header">
            </header>

            <section class="profile-form-container">
                <form>

                    <h3 class="form-section-title">Dados Pessoais</h3>

                    <div class="form-group full-width">
                        <label for="nome">Nome Completo</label>
                        <input type="text" id="nome" placeholder="Preencher..." class="search-input">
                    </div>

                    <div class="form-row-3">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" id="cpf" placeholder="000.000.000-00" class="search-input">
                        </div>
                        <div class="form-group">
                            <label for="nascimento">Data de Nascimento:</label>
                            <input type="date" id="nascimento" class="search-input">
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo:</label>
                            <select id="sexo" class="search-input select-input">
                                <option value="">Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="O">Outro</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row-3">
                        <div class="form-group">
                            <label for="tipo-doc">Tipo de Documento:</label>
                            <select id="tipo-doc" class="search-input select-input">
                                <option value="">Selecione</option>
                                <option value="RG">RG</option>
                                <option value="CNH">CNH</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="orgao">Órgão:</label>
                            <select id="orgao" class="search-input select-input">
                                <option value="">Selecione</option>
                                <option value="SSP">SSP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="uf-doc">UF:</label>
                            <select id="uf-doc" class="search-input select-input">
                                <option value="">Selecione</option>
                                <option value="SC">SC</option>
                                <option value="PR">PR</option>
                                <option value="SP">SP</option>
                            </select>
                        </div>
                    </div>

                    <h3 class="form-section-title">Endereço e Contato</h3>

                    <div class="form-row-cep-logradouro">
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" id="cep" placeholder="00.000-00" class="search-input">
                        </div>
                        <div class="form-group">
                            <label for="logradouro">Logradouro:</label>
                            <input type="text" id="logradouro" placeholder="Preencher..." class="search-input">
                        </div>
                    </div>

                    <div class="form-row-3">
                        <div class="form-group">
                            <label for="numero">Número:</label>
                            <input type="text" id="numero" placeholder="00000" class="search-input">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" id="complemento" placeholder="Preencher..." class="search-input">
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" id="bairro" placeholder="Preencher" class="search-input">
                        </div>
                    </div>

                    <div class="form-row-2">
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" id="estado" placeholder="Preencher..." class="search-input">
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" id="cidade" placeholder="Preencher..." class="search-input">
                        </div>
                    </div>

                    <div class="form-row-2">
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="text" id="telefone" placeholder="00 0000-0000" class="search-input">
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular:</label>
                            <input type="text" id="celular" placeholder="00 00000-0000" class="search-input">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-inscription btn-confirm">
                            Confirmar
                        </button>
                    </div>

                </form>
            </section>
        </main>
    </div>

</body>

</html>