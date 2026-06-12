<!D<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mural de Editais</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="mural-ifc-page">
        <aside class="mural-ifc-sidebar">
            <div class="mural-ifc-logo">
                <img src="{{ asset('icons/IFCfull.svg') }}" alt="Instituto Federal">
            </div>

            <nav class="mural-ifc-menu">
                <a href="/mural-editais" class="mural-ifc-menu-item active">
                    <img src="{{ asset('icons/inicio.svg') }}" alt="">
                    <span>Início</span>
                </a>

                <a href="/perfil" class="mural-ifc-menu-item">
                    <img src="{{ asset('icons/usuario.svg') }}" alt="">
                    <span>Meu perfil</span>
                </a>

                <a href="/minhas-inscricoes" class="mural-ifc-menu-item">
                    <img src="{{ asset('icons/lista.svg') }}" alt="">
                    <span>Minhas Inscrições</span>
                </a>
            </nav>
        </aside>

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