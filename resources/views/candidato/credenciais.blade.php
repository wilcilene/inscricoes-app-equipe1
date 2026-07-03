<!DOCTYPE html>
<html lang="pt-BR">
<head>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Credenciais</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">

</head>
<body>

<main class="dados-page">

    <header class="dados-header">
        <h1 class="titulo dados-titulo">CADASTRO</h1>

        <p class="subtitulo dados-subtitulo">
            Crie suas credenciais de acesso
        </p>
    </header>

    <section class="dados-top-area">

        <div class="dados-progress">

            <div class="dados-circle active"></div>
            <div class="dados-line active"></div>

            <div class="dados-circle active"></div>
            <div class="dados-line active"></div>

            <div class="dados-circle active"></div>

        </div>

        <button
            type="button"
            id="btnFinalizar"
            class="btn Vd dados-btn-next"
        >
            Finalizar Cadastro
        </button>
    

    </section>

    <section class="dados-form-box">

        <div class="dados-section-title">
            Credenciais de Acesso
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                Verifique os campos informados.
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('candidato.store') }}"
            id="formCredenciais"
            class="dados-form"
        >
            @csrf

            <div class="dados-row">

                <div class="dados-field dados-full">

                    <label>E-mail *</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                    >

                    @error('email')
                        <div class="cpf-error-card show">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-half">

                    <label>Confirmar E-mail *</label>

                    <input
                        type="email"
                        name="email_confirmation"
                        value="{{ old('email_confirmation') }}"
                        required
                    >

                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-half">

                    <label>Senha *</label>

                    <div class="password-box">

    <input
        type="password"
        id="password"
        name="password"
        required
    >




    <i class="icone olho-off cz" onclick="togglePassword('password', this)"></i>
   

</div>
                </div>

                <div class="dados-field dados-half">

                    <label>Confirmar senha *</label>

<div class="password-box">
    <input
        type="password"
        id="password_confirmation"
        name="password_confirmation"
        required
    >

     <i class="icone olho-off cz" onclick="togglePassword('password_confirmation', this)"></i>

                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-full">

                    <div
                        id="senhaError"
                        class="cpf-error-card"
                    ></div>

                </div>

            </div>

            <div class="flex">
                <a href="{{ route('login') }}" class="btn-card Vm">
                    Cancelar
                </a>
            </div>


        </form>

    </section>

</main>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('formCredenciais');
    const btn = document.getElementById('btnFinalizar');

    const senha = document.getElementById('password');
    const confirmar = document.getElementById('password_confirmation');

    const erro = document.getElementById('senhaError');

    function mostrarErro(msg){

        erro.textContent = msg;
        erro.classList.add('show');

        senha.classList.add('cpf-invalido');
        confirmar.classList.add('cpf-invalido');

    }

    function limparErro(){

        erro.textContent = '';
        erro.classList.remove('show');

        senha.classList.remove('cpf-invalido');
        confirmar.classList.remove('cpf-invalido');

    }

    btn.addEventListener('click', function(){

        if(senha.value.length < 8){

            mostrarErro(
                'A senha deve possuir pelo menos 8 caracteres.'
            );

            return;
        }

        if(senha.value !== confirmar.value){

            mostrarErro(
                'As senhas não coincidem.'
            );

            return;
        }

        limparErro();

        form.submit();

    });

});

function togglePassword(id, icon) {

    const input = document.getElementById(id);

    if (input.type === "password") {

        input.type = "text";

        icon.classList.remove("olho-off");
        icon.classList.add("olho");

    } else {

        input.type = "password";

        icon.classList.remove("olho");
        icon.classList.add("olho-off");

    }

}
</script>

</body>
</html>
