<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhe da Candidatura</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="admin-cand-page">
        <aside class="admin-cand-sidebar">
            <div class="admin-cand-logo">
                <img src="{{ asset('icons/IFCfull.svg') }}" alt="Instituto Federal">
            </div>

            <nav class="admin-cand-menu">
                <a href="/mural-editais" class="admin-cand-menu-item">
                    <img src="{{ asset('icons/inicio.svg') }}" alt="">
                    <span>Início</span>
                </a>

                <a href="/admin/editais/cadastrar" class="admin-cand-menu-item">
                    <img src="{{ asset('icons/AdicionarDocumento.svg') }}" alt="">
                    <span>Cadastrar Editais</span>
                </a>

                <a href="/candidaturas" class="admin-cand-menu-item active">
                    <img src="{{ asset('icons/lista.svg') }}" alt="">
                    <span>Candidaturas</span>
                </a>
            </nav>

            <a href="/login" class="admin-cand-sair">
                <img src="{{ asset('icons/Saida.svg') }}" alt="">
                <span>Sair</span>
            </a>
        </aside>

        <section class="cand-detalhe-content">
            <header class="cand-detalhe-header">
                <h1>Candidatura Maria Eduarda</h1>
            </header>

            <section class="cand-detalhe-summary">
                <div>
                    <span>Edital No.</span>
                    <strong>01/2024</strong>
                </div>

                <div>
                    <span>Candidato</span>
                    <strong>Gabriela Silva</strong>
                </div>

                <div>
                    <span>Data Submissão</span>
                    <strong>22/04/2024</strong>
                </div>

                <button type="button" class="cand-detalhe-status">
                    EM ANÁLISE
                </button>
            </section>

            <section class="cand-detalhe-grid">
                <div class="cand-detalhe-left">
                    <section class="cand-detalhe-card dados">
                        <h2>Dados do candidato</h2>

                        <div class="cand-detalhe-dados">
                            <p><span>Nome completo:</span> Gabriela Silva</p>
                            <p><span>CPF:</span> 000.000.000-00</p>
                            <p><span>Data de nascimento:</span> 01/01/1970</p>
                            <p><span>Sexo:</span> Feminino</p>
                            <p><span>E-mail:</span> gabriela.silva@email.com</p>
                        </div>
                    </section>

                    <section class="cand-detalhe-card historico">
                        <h2>Histórico</h2>

                        <div class="cand-historico-item completo">
                            <div class="cand-historico-bolinha">✓</div>
                            <div>
                                <h3>Submissão - 22/04/2026</h3>
                                <p>Submissão completa</p>
                            </div>
                        </div>

                        <div class="cand-historico-item completo">
                            <div class="cand-historico-bolinha">✓</div>
                            <div>
                                <h3>Homologação - 30/05/2026</h3>
                                <p>Documentos homologados</p>
                            </div>
                        </div>

                        <div class="cand-historico-item">
                            <div class="cand-historico-bolinha"></div>
                            <div>
                                <h3>Análise Inscrição - 30/05/2024</h3>
                                <p>Aguardando análise</p>
                            </div>
                        </div>
                    </section>
                </div>

                <section class="cand-detalhe-card documentos">
                    <h2>Documentos</h2>

                    <div class="cand-documento">
                        <h3>Comprovante de Ensino Médio</h3>
                        <div class="cand-documento-row">
                            <span class="cand-pdf">PDF</span>
                            <span>diploma_ensino_medio.pdf</span>
                            <button type="button">Visualizar</button>
                        </div>
                    </div>

                    <div class="cand-documento">
                        <h3>Comprovante de Ensino Superior</h3>
                        <div class="cand-documento-row">
                            <span class="cand-pdf">PDF</span>
                            <span>diploma_ensino_superior.pdf</span>
                            <button type="button">Visualizar</button>
                        </div>
                    </div>

                    <div class="cand-documento">
                        <h3>Ficha de Inscrição</h3>
                        <div class="cand-documento-row">
                            <span class="cand-pdf">PDF</span>
                            <span>ficha_inscricao.pdf</span>
                            <button type="button">Visualizar</button>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </main>
</body>
</html>