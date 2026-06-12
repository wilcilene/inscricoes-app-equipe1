<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}?v=999">


</head>
<body>
    <main class="mural-ifc-page">
        <aside class="mural-ifc-sidebar">
            <div class="mural-ifc-logo">
                <img src="{{ asset('icons/IFCfull.svg') }}" alt="Instituto Federal">
            </div>


        <nav class="mural-ifc-menu">
            <a href="/mural-editais" class="mural-ifc-menu-item">
                <img src="{{ asset('icons/inicio.svg') }}" alt="">
                <span>Início</span>
            </a>

            <a href="/perfil" class="mural-ifc-menu-item active">
                <img src="{{ asset('icons/usuario.svg') }}" alt="">
                <span>Meu perfil</span>
            </a>

            <a href="/minhas-inscricoes" class="mural-ifc-menu-item">
                <img src="{{ asset('icons/lista.svg') }}" alt="">
                <span>Minhas Inscrições</span>
            </a>
        </nav>
    </aside>

    <section class="perfil-conteudo">
        <header class="perfil-cabecalho">
            <h1>MEU PERFIL</h1>
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
