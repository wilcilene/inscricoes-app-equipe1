@php
$edital = $edital ?? null;
@endphp

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @include('global.sidebarAdmin')

  <link rel="stylesheet" href="{{ asset('global/style.css') }}">
</head>

<body>

  <main class="pagina">

    @if($edital)

    <h1 class="titulo">Editar Edital</h1>
    <p class="subtitulo">Formulário para editar editais</p>

    @else

    <h1 class="titulo">Cadastro de Edital</h1>
    <p class="subtitulo">Formulário de Cadastro de Editais</p>

    @endif

    <section class="painel">

      <div class="painel-cabecalho">
        Dados do Edital Nº
        <span id="headerNumero">0000</span>
      </div>

      <form
        class="formulario"
        method="POST"
        action="{{ $edital ? route('edital.update', $edital->id) : route('edital.store') }}">

        @csrf

        @if($edital)
        @method('PUT')
        @endif

        <!-- NÚMERO -->
        <div class="campo">
          <label for="numeroEdital">Número do Edital</label>
          <input
            type="number"
            id="numeroEdital"
            name="numero"
            value="{{ explode('/', $edital->nome ?? '')[0] }}"
            placeholder="Ex: 001"
            required>
        </div>

        <!-- TÍTULO -->
        <div class="campo">
          <input type="hidden" name="titulo" id="headerNumero2">
        </div>

        <!-- DESCRIÇÃO -->
        <div class="campo">
          <label for="descricao">Descrição</label>
          <textarea
            id="descricao"
            name="descricao"
            placeholder="Digite a descrição do edital"
            required>{{ $edital->descricao ?? '' }}</textarea>
        </div>
        <!-- Resumo -->
        <div class="campo">
          <label for="resumo">Resumo</label>
          <textarea
            id="resumo"
            name="resumo"
            placeholder="Digite um resumo sobre o edital"
            required>{{ $edital->resumo ?? '' }}</textarea>
        </div>

        <!-- VAGAS 
        <div class="campo">
          <label for="vagas">Quantidade de Vagas</label>
          <input
            type="number"
            id="vagas"
            name="vagas"
            min="1"
            value="{{ $edital->vagas ?? '' }}"
            placeholder="0"
            required>
        </div>-->

        <!-- DATAS -->
        <div class="datas">

          <div class="campo">
            <label for="dataInicio">Data de Abertura</label>
            <input
              type="date"
              id="dataInicio"
              name="data_inicio_inscr"
              value="{{ isset($edital) ? \Carbon\Carbon::parse($edital->data_inicio_inscr)->format('Y-m-d') : '' }}"
              required>
          </div>

          <div class="campo">
            <label for="dataFim">Data de Encerramento</label>
            <input
              type="date"
              id="dataFim"
              name="data_fim_inscr"
              value="{{ isset($edital) ? \Carbon\Carbon::parse($edital->data_fim_inscr)->format('Y-m-d') : '' }}"
              required
              onchange="validarDatas()">
              <small id="erroData" class="erro"></small>
          </div>

        </div>

        <div class="mt-20">

          <button type="submit" class="btn-card" id="btnSalvar">

            <span class="icone adicionar wt"></span>

            @if($edital)
            Atualizar Edital
            @else
            Cadastrar Edital
            @endif

          </button>

        </div>

      </form>

    </section>

  </main>

  <script>
    const numero = document.getElementById("numeroEdital");
    const data = document.getElementById("dataFim");
    const header = document.getElementById("headerNumero");
    const header2 = document.getElementById("headerNumero2");
    const descricao = document.getElementById("descricao");
    const form = document.querySelector(".formulario");

    // Atualiza cabeçalho
    function atualizarCabecalho() {

      const numeroValor = (numero.value || "").padStart(3, "0") || "000";

      let ano = "";

      if (data && data.value) {
        ano = new Date(data.value).getFullYear();
      }

      header.textContent = ano ? `${numeroValor}/${ano}` : numeroValor;
      document.getElementById("headerNumero2").value = `${numeroValor}/${ano}`;
    }

    numero.addEventListener("input", atualizarCabecalho);
    data.addEventListener("change", atualizarCabecalho);

    // Auto resize textarea
    descricao.addEventListener("input", () => {
      descricao.style.height = "auto";
      descricao.style.height = descricao.scrollHeight + "px";
    });


    atualizarCabecalho();

    function validarDatas() {

    dataFim.classList.remove("input-erro");
    erroData.textContent = "";

    btnSalvar.disabled = false;

    if (dataFim.value <= dataInicio.value) {

        erroData.textContent = "Data inválida.";
        dataFim.classList.add("input-erro");

        btnSalvar.disabled = true;
    }
}

dataInicio.addEventListener("change", validarDatas);
dataFim.addEventListener("change", validarDatas);
  </script>


</body>

</html>