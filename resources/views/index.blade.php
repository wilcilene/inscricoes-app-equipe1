<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="icon" href="global/img/icones/favicon-light.svg" media="(prefers-color-scheme:dark )">
    <link rel="icon" href="global/img/icones/favicon-dark.svg" media="(prefers-color-scheme:light )">

    <title>Editais IFC - Equipe 1</title>


</head>

<body>

    <!-- CABEÇALHO -->
    <header
        class="flex-between p-20"
        style="
            background:#2F9E40;
            border-bottom:1px solid #23772f;
        ">


        <div class="IFCfull wt"></div>


        <div class="flex gap-15">

            <a
                href="{{ route('login') }}"
                class="btn eq">
                Login
            </a>

            <a
                href="{{ route('candidato.dados') }}"
                class="btn Br">
                Cadastro
            </a>

        </div>

    </header>


    <!-- CONTEÚDO -->
    <main class="p-20">



        <!-- CARDS -->
<div
class="flex gap-20"
style="
flex-wrap:wrap;
align-items:stretch;
"
>

@if(
isset($editais)
&&
$editais->count()
)

<x-card-edital
    :editais="$editais"
    :tipoUsuarioId="auth()->user()->tipo_usuario_id ?? null"
/>

@else

<div
class="
flex-center
flex-col
"
style="
width:100%;
min-height:60vh;
text-align:center;
"
>

<i
class="
icone
documento
gg
cz
mb-20
"
></i>

<h2
class="titulo cz"
>

Nenhum edital disponível

</h2>

<p
class="subtitulo cz"
>

Ainda não existem editais publicados.

</p>

</div>

@endif

</div>

        </div>

    </main>

</body>

</html>