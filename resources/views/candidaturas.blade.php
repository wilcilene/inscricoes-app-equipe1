<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Candidaturas</title>

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

        <section class="admin-cand-content">
            <header class="admin-cand-header">
                <h1>Candidaturas</h1>
                <p>Avaliação dos candidatos</p>
            </header>

            <section class="admin-cand-card">
                <table class="admin-cand-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Edital</th>
                            <th>Nome Completo</th>
                            <th>Cadastro</th>
                            <th>Situação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>0001</td>
                            <td>01/2024</td>
                            <td>Gabriela Silva</td>
                            <td>06/02/2023</td>
                            <td><span class="admin-cand-status gray">Pendente</span></td>
                            <td>
                                <a href="/candidaturas/1" class="admin-cand-action">☰✎</a>
                            </td>
                        </tr>

                        <tr>
                            <td>0002</td>
                            <td>20/2026</td>
                            <td>Daniela Maria Gonçalves Pedrozo</td>
                            <td>01/09/2025</td>
                            <td><span class="admin-cand-status green">Aprovado</span></td>
                            <td>
                                <a href="/candidaturas/2" class="admin-cand-action">☰✎</a>
                            </td>
                        </tr>

                        <tr>
                            <td>0003</td>
                            <td>10/2026</td>
                            <td>João Pedro Neiskvy da Silva</td>
                            <td>29/04/2026</td>
                            <td><span class="admin-cand-status red">Rejeitado</span></td>
                            <td>
                                <a href="/candidaturas/3" class="admin-cand-action">☰✎</a>
                            </td>
                        </tr>

                        <tr>
                            <td>0004</td>
                            <td>15/2026</td>
                            <td>João Pedro Neiskvy da Silva</td>
                            <td>29/04/2026</td>
                            <td><span class="admin-cand-status gray">Pendente</span></td>
                            <td>
                                <a href="/candidaturas/4" class="admin-cand-action">☰✎</a>
                            </td>
                        </tr>

                        <tr>
                            <td>0005</td>
                            <td>44/2026</td>
                            <td>João Pedro Neiskvy da Silva</td>
                            <td>29/04/2026</td>
                            <td><span class="admin-cand-status gray">Pendente</span></td>
                            <td>
                                <a href="/candidaturas/5" class="admin-cand-action">☰✎</a>
                            </td>
                        </tr>

                        <tr>
                            <td>0006</td>
                            <td>44/2026</td>
                            <td>João Pedro Neiskvy da Silva</td>
                            <td>29/04/2026</td>
                            <td><span class="admin-cand-status red">Rejeitado</span></td>
                            <td>
                                <a href="/candidaturas/6" class="admin-cand-action">☰✎</a>
                            </td>
                        </tr>

                        <tr>
                            <td>0007</td>
                            <td>44/2026</td>
                            <td>João Pedro Neiskvy da Silva</td>
                            <td>29/04/2026</td>
                            <td><span class="admin-cand-status green">Aprovado</span></td>
                            <td>
                                <a href="/candidaturas/7" class="admin-cand-action">☰✎</a>
                            </td>
                        </tr>

                        <tr>
                            <td>0008</td>
                            <td>44/2026</td>
                            <td>João Pedro Neiskvy da Silva</td>
                            <td>29/04/2026</td>
                            <td><span class="admin-cand-status red">Rejeitado</span></td>
                            <td>
                                <a href="/candidaturas/8" class="admin-cand-action">☰✎</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </main>
</body>
</html>