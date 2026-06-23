<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link rel="icon" href="global/img/icones/favicon-light.svg" media="(prefers-color-scheme:dark )">
    <link rel="icon" href="global/img/icones/favicon-dark.svg" media="(prefers-color-scheme:light )">

    <title>Editais IFC - Equipe 1</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">

    @if(session('success'))
        <script>
            window.onload = function () {
                alert("{{ session('success') }}");
            }
        </script>
    @endif
</head>

<body class="login">



<main class="login-page">

<section class="login-card">

<h1 class="login-title">
    ACESSO AO SISTEMA
</h1>


<div class="login-tabs">

</div>


<form
method="POST"
action="{{ route('login') }}"
class="login-form"
>

@csrf


<div class="login-field">

<label for="email">
    Email:
</label>

<input
type="email"
id="email"
name="email"
placeholder="Preencher"
required
>

</div>


<div class="login-field">

<label for="password">
    Senha:
</label>

<input
type="password"
id="password"
name="password"
placeholder="Preencher"
required
>

</div>


<div class="login-buttons">

<button
type="button"
class="login-btn login-btn-cadastrar"
onclick="window.location.href='{{ route('candidato.dados-pessoais') }}'">
    Cadastrar
</button>


<button
type="submit"
class="login-btn login-btn-entrar"
>
    Entrar
</button>

</div>


@if(session('erro'))
<div>
    {{ session('erro') }}
</div>
@endif


@if($errors->any())
<div>
    {{ $errors->first() }}
</div>
@endif


</form>

</section>

</main>

</body>

</html>