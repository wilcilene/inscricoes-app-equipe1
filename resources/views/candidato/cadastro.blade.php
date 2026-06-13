<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Endereço e Contato</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<main class="dados-page">

    <header class="dados-header">
        <h1 class="titulo dados-titulo">CADASTRO</h1>

        <p class="subtitulo dados-subtitulo">
            Informe seus dados de endereço e contato
        </p>
    </header>

    <section class="dados-top-area">

        <div class="dados-progress">
            <div class="dados-circle active"></div>
            <div class="dados-line active"></div>
            <div class="dados-circle active"></div>
            <div class="dados-line"></div>
            <div class="dados-circle"></div>
        </div>

        <button
            type="button"
            id="btnProximo"
            class="btn Vd dados-btn-next"
        >
            Próximo
        </button>

    </section>

    <section class="dados-form-box">

        <div class="dados-section-title">
            Endereço e Contato
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                Verifique os campos obrigatórios.
            </div>
        @endif

        <form
    method="POST"
    action="{{ route('candidato.endereco') }}"
    id="formCadastro"
    class="dados-form"
>
            @csrf

            <div class="dados-row">

                <div class="dados-field dados-half">
                    <label>CEP *</label>

                    <input
                        type="text"
                        name="cep"
                        id="cep"
                        value="{{ old('cep') }}"
                        required
                    >
                </div>

                <div class="dados-field dados-half">
                    <label>Logradouro *</label>

                    <input
                        type="text"
                        name="logradouro"
                        id="logradouro"
                        value="{{ old('logradouro') }}"
                        required
                    >
                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-half">
                    <label>Número *</label>

                    <input
                        type="text"
                        name="numero"
                        value="{{ old('numero') }}"
                        required
                    >
                </div>

                <div class="dados-field dados-half">
                    <label>Complemento</label>

                    <input
                        type="text"
                        name="complemento"
                        value="{{ old('complemento') }}"
                    >
                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-half">
                    <label>Bairro *</label>

                    <input
                        type="text"
                        name="bairro"
                        id="bairro"
                        value="{{ old('bairro') }}"
                        required
                    >
                </div>

                <div class="dados-field dados-half">
                    <label>Estado *</label>

                    <select
                        name="estado"
                        id="estado"
                        required
                    >
                        <option value="">Selecione</option>

                        @foreach([
                            'AC','AL','AP','AM','BA','CE','DF','ES',
                            'GO','MA','MT','MS','MG','PA','PB','PR',
                            'PE','PI','RJ','RN','RS','RO','RR','SC',
                            'SP','SE','TO'
                        ] as $uf)

                            <option
                                value="{{ $uf }}"
                                {{ old('estado') == $uf ? 'selected' : '' }}
                            >
                                {{ $uf }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-full">

                    <label>Cidade *</label>

                    <input
                        type="text"
                        name="cidade"
                        id="cidade"
                        value="{{ old('cidade') }}"
                        required
                    >

                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-half">

                    <label>Telefone</label>

                    <input
                        type="text"
                        name="telefone"
                        value="{{ old('telefone') }}"
                    >

                </div>

                <div class="dados-field dados-half">

                    <label>Celular *</label>

                    <input
                        type="text"
                        name="celular"
                        value="{{ old('celular') }}"
                        required
                    >

                </div>

            </div>

        </form>

    </section>

</main>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('formCadastro');
    const btnProximo = document.getElementById('btnProximo');

    btnProximo.addEventListener('click', function () {

        form.submit();

    });

});

</script>

</body>
</html>