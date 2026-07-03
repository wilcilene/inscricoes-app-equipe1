<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Dados Pessoais</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">

</head>

<body>

<main class="dados-page">

    <header class="dados-header">
        <h1 class="titulo dados-titulo">CADASTRO</h1>

        <p class="subtitulo dados-subtitulo">
            Certifique-se de que os dados estão corretos
        </p>
    </header>

    <section class="dados-top-area">

        <div class="dados-progress">
            <div class="dados-circle active"></div>
            <div class="dados-line"></div>
            <div class="dados-circle"></div>
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
            Dados Pessoais
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                Verifique os campos destacados.
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('candidato.dados.salvar') }}"
            id="formDados"
            class="dados-form"
        >
            @csrf

            <div class="dados-row">

                <div class="dados-field dados-full">

                    <label>Nome Completo *</label>

                    <input
                        type="text"
                        name="nome_completo"
                        value="{{ old('nome_completo') }}"
                        placeholder="Digite seu nome completo"
                        class="somente-letras"
                        required
                    >

                    @error('nome_completo')
                        <div class="cpf-error-card show">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-full">

                    <label>Nome Social</label>

                    <input
                        type="text"
                        name="nome_social"
                        value="{{ old('nome_social') }}"
                        class="somente-letras"
                        placeholder="Opcional"
                    >

                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-medium">

                    <label>CPF *</label>

                    <input
                        type="text"
                        id="cpf"
                        name="cpf"
                        value="{{ old('cpf') }}"
                        placeholder="000.000.000-00"
                        maxlength="14"
                        required
                    >

                    <div
                        id="cpfErrorCard"
                        class="cpf-error-card"
                    ></div>

                    @error('cpf')
                        <div class="cpf-error-card show">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="dados-field dados-medium">

                    <label>Data de Nascimento *</label>

                    <input
                        type="date"
                        id="data_nascimento"
                        name="data_nascimento"
                        value="{{ old('data_nascimento') }}"
                        max="{{ date('Y-m-d') }}"
                        required
                    >

                    <div
                        id="idadeErrorCard"
                        class="cpf-error-card"
                    ></div>

                    @error('data_nascimento')
                        <div class="cpf-error-card show">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="dados-field dados-medium">

                    <label>Gênero *</label>

                    <select name="genero" required>

                        <option value="">Selecione</option>

                        <option value="M"
                            {{ old('genero') == 'M' ? 'selected' : '' }}>
                            Masculino
                        </option>

                        <option value="F"
                            {{ old('genero') == 'F' ? 'selected' : '' }}>
                            Feminino
                        </option>

                        <option value="NB"
                            {{ old('genero') == 'NB' ? 'selected' : '' }}>
                            Não Binário
                        </option>

                        <option value="O"
                            {{ old('genero') == 'O' ? 'selected' : '' }}>
                            Outro
                        </option>

                    </select>

                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-half">

                    <label>Nome da Mãe *</label>

                    <input
                        type="text"
                        name="mae"
                        value="{{ old('mae') }}"
                        class="somente-letras"
                        required
                    >

                </div>

                <div class="dados-field dados-half">

                    <label>Nome do Pai</label>

                    <input
                        type="text"
                        name="pai"
                        value="{{ old('pai') }}"
                        class="somente-letras"
                        required
                    >

                </div>

            </div>

            <div class="dados-row">

                <div class="dados-field dados-half">

                    <label>Área de Atuação *</label>

                    <input
                        type="text"
                        name="area_profissional"
                        value="{{ old('area_profissional') }}"
                        required
                    >

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

    const form = document.getElementById('formDados');
    const btnProximo = document.getElementById('btnProximo');

    const cpfInput = document.getElementById('cpf');
    const cpfCard = document.getElementById('cpfErrorCard');

    const dataNascimento = document.getElementById('data_nascimento');
    const idadeCard = document.getElementById('idadeErrorCard');


    //input só letra

    document.querySelectorAll(".somente-letras").forEach(function(campo){

    campo.addEventListener("input", function(){

        this.value = this.value.replace(/[^A-Za-zÀ-ÿ\s]/g, "");

    });

});

    // Máscara CPF

    cpfInput.addEventListener('input', function () {

        let value = this.value.replace(/\D/g, '');

        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

        this.value = value;

    });

    function mostrarErroCPF(msg) {

        cpfCard.textContent = msg;

        cpfCard.classList.add('show');

        cpfInput.classList.add('cpf-invalido');
    }

    function limparErroCPF() {

        cpfCard.textContent = '';

        cpfCard.classList.remove('show');

        cpfInput.classList.remove('cpf-invalido');
    }

    function mostrarErroIdade(msg) {

        idadeCard.textContent = msg;

        idadeCard.classList.add('show');

        dataNascimento.classList.add('cpf-invalido');
    }

    function limparErroIdade() {

        idadeCard.textContent = '';

        idadeCard.classList.remove('show');

        dataNascimento.classList.remove('cpf-invalido');
    }

    function validarCPF(cpf) {

        cpf = cpf.replace(/\D/g, '');

        if (cpf.length !== 11) return false;

        if (/^(\d)\1+$/.test(cpf)) return false;

        let soma = 0;

        for (let i = 0; i < 9; i++) {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }

        let resto = (soma * 10) % 11;

        if (resto === 10) resto = 0;

        if (resto !== parseInt(cpf.charAt(9))) {
            return false;
        }

        soma = 0;

        for (let i = 0; i < 10; i++) {
            soma += parseInt(cpf.charAt(i)) * (11 - i);
        }

        resto = (soma * 10) % 11;

        if (resto === 10) resto = 0;

        return resto === parseInt(cpf.charAt(10));
    }

    function idadeValida(data) {

        if (!data) return false;

        const nascimento = new Date(data);
        const hoje = new Date();

        let idade =
            hoje.getFullYear() -
            nascimento.getFullYear();

        const mes =
            hoje.getMonth() -
            nascimento.getMonth();

        if (
            mes < 0 ||
            (mes === 0 &&
            hoje.getDate() < nascimento.getDate())
        ) {
            idade--;
        }

        return idade >= 16;
    }

    cpfInput.addEventListener('blur', function () {

        if (!this.value.trim()) return;

        if (!validarCPF(this.value)) {

            mostrarErroCPF('CPF inválido.');

        } else {

            limparErroCPF();
        }

    });

    dataNascimento.addEventListener('blur', function () {

        if (!this.value) return;

        if (!idadeValida(this.value)) {

            mostrarErroIdade(
                'O candidato deve possuir no mínimo 16 anos.'
            );

        } else {

            limparErroIdade();
        }

    });

    btnProximo.addEventListener('click', function () {

        if (!validarCPF(cpfInput.value)) {

            mostrarErroCPF('CPF inválido.');

            cpfInput.focus();

            return;
        }

        if (!idadeValida(dataNascimento.value)) {

            mostrarErroIdade(
                'O candidato deve possuir no mínimo 16 anos.'
            );

            dataNascimento.focus();

            return;
        }

        form.submit();

    });

});
</script>

</body>
</html>
