<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="layout">

    @include('global.sidebarAdmin')

    <main class="pagina">
        
<main class="admin-cand-page admin-mural-page">

        <section class="mural-ifc-content admin-mural-content">
            <header class="mural-ifc-header">
                <div>
                    <h1>MURAL DE EDITAIS</h1>
                    <p>Gerencie os editais disponiveis para inscricao</p>
                </div>

                <div class="mural-ifc-search">
                    <span class="mural-ifc-search-icon">⌕</span>
                    <input type="text" placeholder="Buscar Editais...">
                    <span class="mural-ifc-divider"></span>
                    <button type="button">Filtros⌄</button>
                </div>
            </header>

            @if (session('success'))
                <div class="admin-mural-feedback">
                    {{ session('success') }}
                </div>
            @endif

            <section class="mural-ifc-grid">
                @for ($i = 1; $i <= 9; $i++)
                    <article class="mural-ifc-card admin-mural-card">
                        <div class="mural-ifc-card-bar"></div>

                        <h2>EDITAL 01/2026</h2>
                        <h3>CHAMADA PUBLICA - DOCENTE</h3>

                        <div class="mural-ifc-date">
                            <span><img src="{{ asset('icons/Calendario.svg') }}" alt=""></span>
                            <p>Data Limite: 20/08/2026</p>
                        </div>

                        <p class="mural-ifc-text">
                            Resumo da vaga, resumo vaga resumos vaga, resumo vaga,
                            resumo vaga, resumo vaga.
                        </p>

                        <div class="admin-mural-actions">
                            <a href="{{ route('admin.editais.editar', $i) }}" class="admin-mural-btn edit">
                                Editar
                            </a>

                            <form method="POST" action="{{ route('admin.editais.excluir', $i) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-mural-btn delete">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </article>
                @endfor
            </section>
        </section>
    </main>

    </main>

</div>

</body>
</html>