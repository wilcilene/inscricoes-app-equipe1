<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">


</head>

@if(auth()->user()->tipo_usuario_id == 1)
@include('global.sidebarAdmin')

@elseif(auth()->user()->tipo_usuario_id == 2)
@include('global.sidebarCandidato')

@endif

<body>

<main class="pagina">

    <section class="pagina-conteudo">

        <header class="pagina-cabecalho">

            <div>

                <h1 class="titulo">
                    MURAL DE EDITAIS
                </h1>

                <p class="subtitulo">
                    Acesse os editais disponíveis e faça sua inscrição
                </p>

            </div>

        </header>


        <!-- CARDS -->
        <div
            class="flex gap-20"
            style="
                flex-wrap:wrap;
                align-items:stretch;
            "
        >

            @if(isset($editais) && $editais->count())

                <x-card-edital
                    :editais="$editais"
                    :tipoUsuarioId="auth()->user()->tipo_usuario_id ?? null"
                />

            @else

                <div
                    class="flex-center flex-col"
                    style="
                        width:100%;
                        min-height:60vh;
                        text-align:center;
                    "
                >

                    <i class="icone documento gg vd mb-20"></i>

                    <h2 class="titulo">
                        Nenhum edital disponível
                    </h2>

                    <p class="subtitulo">
                        Ainda não existem editais publicados.
                    </p>

                </div>

            @endif

        </div>

    </section>

</main>

</body>

</html>