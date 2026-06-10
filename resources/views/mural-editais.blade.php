<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mural de Editais</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="container">

    @include('components.sidebar', ['activePage' => 'inicio'])

    <main class="main-content">

        <header class="content-header">
            <div class="header-top">
                <div>
                    <h1>MURAL DE EDITAIS</h1>
                    <p>Acesse os editais disponíveis e faça sua inscrição</p>
                </div>

                <div class="search-container">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input
                        type="text"
                        id="buscarEdital"
                        class="search-input"
                        placeholder="Buscar Editais..."
                    >
                </div>
            </div>
        </header>

        <section class="cards-grid">

            @for ($i = 1; $i <= 9; $i++)
                <article class="edital-card">

                    <div class="card-header">
                        <h2>EDITAL 01/2026</h2>
                        <h3>CHAMADA PÚBLICA - DOCENTE</h3>
                    </div>

                    <div class="date-badge">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Data Limite: 20/08/2026</span>
                    </div>

                    <p class="card-text">
                        Resumo da vaga, resumo vaga resumos vaga,
                        resumo vaga, resumo vaga, resumo vaga.
                    </p>

                    <div class="card-footer">
                        <a href="/inscricao" class="btn-inscription">
                            <i class="fa-solid fa-plus"></i>
                            REALIZAR INSCRIÇÃO
                        </a>
                    </div>

                </article>
            @endfor

        </section>

    </main>

</div>

<script src="{{ asset('js/mural-editais.js') }}"></script>

</body>
</html>