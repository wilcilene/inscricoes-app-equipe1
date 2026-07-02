<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 @include('global.sidebarCandidato')

</head>
<body>

<div class="layout">

   

    <main class="pagina">
    <section class="mural-ifc-content">
        <header class="mural-ifc-header">
            <div>
                <h1>MINHAS INSCRIÇÕES</h1>
                <p>Acompanhe o status das suas inscrições</p>
            </div>
        </header>

        <section class="admin-cand-card">
            <table class="admin-cand-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Edital</th>
                        <th>Descrição</th>
                        <th>Cadastro</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>0001</td>
                        <td>01/2026</td>
                        <td>Chamada Pública - Docente</td>
                        <td>06/02/2026</td>
                        <td>
                            <span class="admin-cand-status gray">Pendente</span>
                        </td>
                        <td>
                            <a href="/minhas-inscricoes/1" class="admin-cand-action">☰✎</a>
                        </td>
                    </tr>

                    <tr>
                        <td>0002</td>
                        <td>20/2026</td>
                        <td>Processo Seletivo Simplificado</td>
                        <td>01/09/2026</td>
                        <td>
                            <span class="admin-cand-status green">Aprovado</span>
                        </td>
                        <td>
                            <a href="/minhas-inscricoes/2" class="admin-cand-action">☰✎</a>
                        </td>
                    </tr>

                    <tr>
                        <td>0003</td>
                        <td>10/2026</td>
                        <td>Seleção de Bolsistas</td>
                        <td>29/04/2026</td>
                        <td>
                            <span class="admin-cand-status red">Rejeitado</span>
                        </td>
                        <td>
                            <a href="/minhas-inscricoes/3" class="admin-cand-action">☰✎</a>
                        </td>
                    </tr>

                    <tr>
                        <td>0004</td>
                        <td>15/2026</td>
                        <td>Cadastro Reserva</td>
                        <td>12/05/2026</td>
                        <td>
                            <span class="admin-cand-status gray">Pendente</span>
                        </td>
                        <td>
                            <a href="/minhas-inscricoes/4" class="admin-cand-action">☰✎</a>
                        </td>
                    </tr>

                    <tr>
                        <td>0005</td>
                        <td>44/2026</td>
                        <td>Auxílio Estudantil</td>
                        <td>18/06/2026</td>
                        <td>
                            <span class="admin-cand-status green">Aprovado</span>
                        </td>
                        <td>
                            <a href="/minhas-inscricoes/5" class="admin-cand-action">☰✎</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <div style="max-width: 1010px; display: flex; justify-content: space-between; align-items: center; margin-top: 18px; color: #33383d;">
            <span>1-5 de 5 inscrições</span>

            <div style="display: flex; gap: 8px;">
                <button type="button" style="width: 36px; height: 34px; border: 1px solid #c5c5c5; border-radius: 6px; background: #ffffff; color: #777777;">
                    ‹
                </button>

                <button type="button" style="width: 36px; height: 34px; border: 1px solid #c5c5c5; border-radius: 6px; background: #ffffff; color: #333333;">
                    ›
                </button>
            </div>
        </div>
    </section>
</main>


</body>
</html>

