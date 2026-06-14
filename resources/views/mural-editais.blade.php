<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="layout">


    @include('global.sidebarCandidato')

    <main class="pagina">

        <section class="mural-ifc-content">
            <header class="mural-ifc-header">
                <div>
                    <h1>MURAL DE EDITAIS</h1>
                    <p>Acesse os editais disponíveis e faça sua inscrição</p>
                </div>

                <div class="mural-ifc-search">
                    <span class="mural-ifc-search-icon">⌕</span>
                    <input type="text" placeholder="Buscar Editais...">
                    <span class="mural-ifc-divider"></span>
                    <button type="button">Filtros⌄</button>
                </div>
            </header>

            <section class="mural-ifc-grid">
                @for ($i = 1; $i <= 9; $i++)
                    <article class="mural-ifc-card">
                        <div class="mural-ifc-card-bar"></div>

                        <h2>EDITAL 01/2026</h2>
                        <h3>CHAMADA PÚBLICA - DOCENTE</h3>

                        <div class="mural-ifc-date">
                            <span>▣</span>
                            <p>Data Limite: 20/08/2026</p>
                        </div>

                        <p class="mural-ifc-text">
                            Resumo da vaga, resumo vaga resumos vaga, resumo vaga,
                            resumo vaga, resumo vaga.
                        </p>

                        <a href="/inscricao" class="mural-ifc-btn">
                            <span>＋</span>
                            REALIZAR INSCRIÇÃO
                        </a>
                    </article>
                @endfor
            </section>
        </section>
    </main>


</body>
</html>
    
