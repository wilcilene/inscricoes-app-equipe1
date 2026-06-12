<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Dados Pessoais</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

        <!-- BOTÃO CONTROLADO PELO JS -->
        <button class="btn Vd dados-btn-next" type="button" id="btnProximo">
            Próximo
        </button>

    </section>

    <section class="dados-form-box">

        <div class="dados-section-title">
            Dados Pessoais
        </div>

        <form class="dados-form">

            <div class="dados-row">
                <div class="dados-field dados-full">
                    <label>Nome Completo*:</label>
                    <input type="text" name="nome_completo" placeholder="Preencher">
                </div>
            </div>

            <div class="dados-row">
                <div class="dados-field dados-full">
                    <label>Nome Social:</label>
                    <input type="text" name="nome_social" placeholder="Preencher">
                </div>
            </div>

            <div class="dados-row">

                <div class="dados-field dados-medium">
                    <label>CPF*:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00">
                </div>

                <div class="dados-field dados-medium">
                    <label>Data de Nascimento*:</label>
                    <input type="text" name="data_nascimento" placeholder="dd/mm/aaaa">
                </div>

                <div class="dados-field dados-medium">
                    <label>Gênero*:</label>
                    <select name="genero">
                        <option value="">Selecione</option>
                        <option value="feminino">Feminino</option>
                        <option value="masculino">Masculino</option>
                        <option value="outro">Outro</option>
                        <option value="nao_informar">Prefiro não informar</option>
                    </select>
                </div>

                <div class="dados-field dados-medium">
                    <label>Naturalidade*:</label>
                    <select name="naturalidade">
                        <option value="">Selecione</option>
                        <option value="brasileira">Brasileira</option>
                        <option value="estrangeira">Estrangeira</option>
                    </select>
                </div>

            </div>

            <div class="dados-row">
                <div class="dados-field dados-half">
                    <label>Mãe*:</label>
                    <input type="text" name="mae" placeholder="Preencher">
                </div>

                <div class="dados-field dados-half">
                    <label>Pai:</label>
                    <input type="text" name="pai" placeholder="Preencher">
                </div>
            </div>

            <div class="dados-row">
                <div class="dados-field dados-half">
                    <label>Área Profissional*:</label>
                    <input type="text" name="area_profissional" placeholder="Preencher">
                </div>
            </div>

        </form>

    </section>

</main>

<!-- SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const cpfInput = document.getElementById('cpf');
    const btnProximo = document.getElementById('btnProximo');

    function validarCPF(cpf) {
        cpf = cpf.replace(/\D/g, '');

        if (cpf.length !== 11) return false;
        if (/^(\d)\1+$/.test(cpf)) return false;

        let soma = 0;
        let resto;

        // primeiro dígito
        for (let i = 0; i < 9; i++) {
            soma += parseInt(cpf[i]) * (10 - i);
        }

        resto = soma % 11;
        const digito1 = resto < 2 ? 0 : 11 - resto;

        if (parseInt(cpf[9]) !== digito1) return false;

        // segundo dígito
        soma = 0;

        for (let i = 0; i < 10; i++) {
            soma += parseInt(cpf[i]) * (11 - i);
        }

        resto = soma % 11;
        const digito2 = resto < 2 ? 0 : 11 - resto;

        if (parseInt(cpf[10]) !== digito2) return false;

        return true;
    }

    // valida ao digitar (efeito vermelho)
    cpfInput.addEventListener('input', function () {
        if (this.value.length === 0) {
            this.classList.remove('is-invalid');
            return;
        }

        if (!validarCPF(this.value)) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });

    // botão próximo
    btnProximo.addEventListener('click', function (e) {

        const cpf = cpfInput.value;

        if (!validarCPF(cpf)) {

            cpfInput.classList.add('is-invalid');

            alert('CPF inválido! Verifique o número.');

            return; // NÃO trava mais o botão, só bloqueia avanço
        }

        cpfInput.classList.remove('is-invalid');

        // libera navegação
        window.location.href = "{{ route('candidato.cadastro') }}";
    });

});
</script>

</body>
</html>