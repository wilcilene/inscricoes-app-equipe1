<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 @include('global.sidebarCandidato')

</head>
<body>

<div class="layout">


    <main class="pagina">
        
    <section class="perfil-conteudo">
        <header class="perfil-cabecalho">
            <h1>MEU PERFIL 1</h1>
            <p>Altere seus dados para inscrição</p>
        </header>

        <form class="perfil-formulario">
            <section class="perfil-card">
                <div class="perfil-titulo-card">
                    <h2>Dados Pessoais</h2>
                </div>

                <div class="perfil-campo cheio">
                    <label>Nome Completo*:</label>
                    <input type="text" placeholder="Preencher">
                </div>

                <div class="perfil-campo cheio">
                    <label>Nome Social (se houver):</label>
                    <input type="text" placeholder="Preencher">
                </div>

                <div class="perfil-linha quatro">
                    <div class="perfil-campo">
                        <label>CPF*:</label>
                        <input type="text" placeholder="000.000.000-00">
                    </div>

                    <div class="perfil-campo">
                        <label>Data de Nascimento*:</label>
                        <input type="text" placeholder="dd/mm/aaaa">
                    </div>

                    <div class="perfil-campo">
                        <label>Gênero*:</label>
                        <select>
                            <option>Selecione</option>
                        </select>
                    </div>

                    <div class="perfil-campo">
                        <label>Naturalidade*:</label>
                        <select>
                            <option>Selecione</option>
                        </select>
                    </div>
                </div>

                <div class="perfil-linha duas">
                    <div class="perfil-campo">
                        <label>Mãe*:</label>
                        <input type="text" placeholder="Preencher">
                    </div>

                    <div class="perfil-campo">
                        <label>Pai:</label>
                        <input type="text" placeholder="Preencher">
                    </div>
                </div>

                <div class="perfil-linha duas">
                    <div class="perfil-campo">
                        <label>Área Profissional de Atuação do Candidato*:</label>
                        <input type="text" placeholder="Preencher">
                    </div>
                </div>
            </section>

            <section class="perfil-card">
                <div class="perfil-titulo-card">
                    <h2>Endereço e Contato</h2>
                </div>

                <div class="perfil-linha endereco">
                    <div class="perfil-campo cep">
                        <label>CEP:</label>
                        <input type="text" placeholder="00.000-000">
                    </div>

                    <div class="perfil-campo">
                        <label>Logradouro:</label>
                        <input type="text" placeholder="Preencher">
                    </div>
                </div>

                <div class="perfil-linha quatro">
                    <div class="perfil-campo">
                        <label>Número:</label>
                        <input type="text" placeholder="00000">
                    </div>

                    <div class="perfil-campo">
                        <label>Complemento:</label>
                        <input type="text" placeholder="Preencher">
                    </div>

                    <div class="perfil-campo">
                        <label>Bairro:</label>
                        <input type="text" placeholder="Preencher">
                    </div>

                    <div class="perfil-campo">
                        <label>Cidade:</label>
                        <input type="text" placeholder="Preencher">
                    </div>
                </div>

                <div class="perfil-linha tres">
                    <div class="perfil-campo">
                        <label>UF:</label>
                        <select>
                            <option>Selecione</option>
                        </select>
                    </div>

                    <div class="perfil-campo">
                        <label>Telefone:</label>
                        <input type="text" placeholder="(00) 00000-0000">
                    </div>

                    <div class="perfil-campo">
                        <label>E-mail:</label>
                        <input type="email" placeholder="seu@email.com">
                    </div>
                </div>
            </section>

            <div class="perfil-acoes">
                <a href="/mural-editais" class="perfil-botao cancelar">Cancelar</a>
                <button type="button" class="perfil-botao salvar">Salvar Perfil</button>
            </div>
        </form>
    </section>
</main>


</body>
</html>
