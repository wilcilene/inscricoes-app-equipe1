<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Senha de Acesso</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="credenciais-page">
        <header class="credenciais-header">
            <h1 class="titulo credenciais-titulo">CADASTRO</h1>
            <p class="subtitulo credenciais-subtitulo">Certifique-se de que os dados estão corretos</p>
        </header>

        <section class="credenciais-top-area">
            <div class="credenciais-progress">
                <div class="credenciais-circle done"></div>
                <div class="credenciais-line done"></div>
                <div class="credenciais-circle done"></div>
                <div class="credenciais-line"></div>
                <div class="credenciais-circle active"></div>
            </div>

            <button class="btn Vd credenciais-btn-finalizar" type="submit" form="formCredenciais">
                Finalizar
            </button>
        </section>

        <section class="credenciais-form-box">
            <div class="credenciais-section-title">
                Senha de Acesso
            </div>

            <form id="formCredenciais" method="POST" action="{{ route('candidato.store') }}" class="credenciais-form">
                @csrf

                @if ($errors->any())
                    <div class="credenciais-error-box">
                        Preencha email, confirmação de email, senha e confirmação de senha corretamente.
                    </div>
                @endif


                <div class="credenciais-row">
                    <div class="credenciais-field">
                        <label for="email">Email:</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Preencher..."
                            value="{{ old('email') }}"
                        >
                    </div>

                    <div class="credenciais-field">
                        <label for="email_confirmation">Confirmar Email:</label>
                        <input
                            type="email"
                            id="email_confirmation"
                            name="email_confirmation"
                            placeholder="Preencher..."
                            value="{{ old('email_confirmation') }}"
                        >
                    </div>
                </div>

                <div class="credenciais-row">
                    <div class="credenciais-field">
                        <label for="password">Senha:</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Preencher..."
                        >
                    </div>

                    <div class="credenciais-field">
                        <label for="password_confirmation">Confirmar Senha:</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Preencher..."
                        >
                    </div>
                </div>

                <div class="credenciais-buttons">
                    <button type="button" class="btn Vm credenciais-btn-cancelar" onclick="window.location.href='/candidato/cadastro'">
                        Cancelar
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>