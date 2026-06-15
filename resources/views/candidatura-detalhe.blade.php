<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="layout">

    @include('global.sidebarAdmin')

    <main class="pagina">

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