<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="global/img/icones/favicon-light.svg" media="(prefers-color-scheme:dark )">
    <link rel="icon" href="global/img/icones/favicon-dark.svg" media="(prefers-color-scheme:light )">

    <title>Editais IFC - Equipe 1</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">
        @php $activePage = 'inicio'; @endphp
        @include('sidebar', ['activePage' => $activePage])

        <main class="main-content">
            <header class="content-header">
                <div class="header-top">
                    <div>
                        <h1>EDITAIS</h1>
                        <p>Consulte os editais abertos e faça sua inscrição</p>
                    </div>

                    <div class="search-container">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <input type="text" placeholder="Buscar edital..." class="search-input">
                    </div>
                </div>
            </header>

            <section class="cards-grid">

                <div class="edital-card">
                    <div class="card-header">
                        <h2>01/2026</h2>
                        <h3>Exame de Classificação - Cursos Técnicos</h3>
                        <div class="date-badge">
                            <i class="fa-solid fa-calendar-days"></i> Inscrições até 20/11/2026
                        </div>
                    </div>
                    <p class="card-text">
                        Processo seletivo para ingresso nos cursos técnicos integrados ao ensino médio.
                        Confira as vagas disponíveis para o seu campus e realize a inscrição.
                    </p>
                    <div class="card-footer">
                        <button class="btn-inscription">
                            <i class="fa-solid fa-pen-to-square"></i> Inscrever-se
                        </button>
                    </div>
                </div>

                <div class="edital-card">
                    <div class="card-header">
                        <h2>02/2026</h2>
                        <h3>Sisu - Cursos Superiores</h3>
                        <div class="date-badge">
                            <i class="fa-solid fa-calendar-days"></i> Inscrições até 05/12/2026
                        </div>
                    </div>
                    <p class="card-text">
                        Seleção para os cursos de graduação do Instituto Federal através da nota do ENEM.
                        Acesse o edital completo para verificar os pesos de cada área.
                    </p>
                    <div class="card-footer">
                        <button class="btn-inscription">
                            <i class="fa-solid fa-pen-to-square"></i> Inscrever-se
                        </button>
                    </div>
                </div>

                <div class="edital-card">
                    <div class="card-header">
                        <h2>03/2026</h2>
                        <h3>Processo Seletivo Simplificado - EAD</h3>
                        <div class="date-badge">
                            <i class="fa-solid fa-calendar-days"></i> Inscrições até 18/12/2026
                        </div>
                    </div>
                    <p class="card-text">
                        Oportunidade para cursos de formação inicial e continuada na modalidade a distância.
                        Cursos 100% gratuitos e com certificação direta pelo IF.
                    </p>
                    <div class="card-footer">
                        <button class="btn-inscription">
                            <i class="fa-solid fa-pen-to-square"></i> Inscrever-se
                        </button>
                    </div>
                </div>

            </section>
        </main>
    </div>

</body>

</html>