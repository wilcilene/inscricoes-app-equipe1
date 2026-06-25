!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscrição em Edital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meuPerfil.css') }}">

    @include('global.sidebarCandidato')
</head>

<body>

    <div class="layout">

        @php
        $edital = App\Models\Edital::find(request('edital'));
        @endphp

        <main class="pagina">

            <form
                action="{{ route('candidato.inscricao.enviar') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <input
                    type="hidden"
                    name="edital_id"
                    value="{{ $edital->id ?? '' }}">

                <div style="margin-left:20px;padding:45px;padding-bottom:120px;">

                    <h1
                        style="
                        font-size:42px;
                        font-weight:700;
                        color:var(--cor-texto);
                        margin-bottom:5px;
                    ">
                        INSCREVER EDITAL {{ $edital->nome ?? '' }}
                    </h1>

                    <p
                        style="
                        font-size:18px;
                        color:#666;
                        margin-bottom:30px;
                    ">
                        Certifique-se de que os dados estão corretos
                    </p>

                    @if(session('success'))

                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                    @endif

                    @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $erro)

                            <li>{{ $erro }}</li>

                            @endforeach

                        </ul>

                    </div>

                    @endif

                    {{-- DADOS PESSOAIS --}}

                    <div
                        style="
                        background:var(--cor-branco);
                        padding:20px;
                        border-radius:5px;
                        box-shadow:0 2px 4px rgba(0,0,0,0.05);
                        margin-bottom:20px;
                    ">

                        <div
                            style="
                            font-weight:700;
                            font-size:18px;
                            color:var(--cor-texto);
                            border-bottom:1px solid #ddd;
                            padding-bottom:8px;
                            margin-bottom:20px;
                        ">
                            Dados Pessoais
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label
                                    class="form-label"
                                    style="font-weight:600;">
                                    Nome Completo
                                </label>

                                <input
                                    type="text"
                                    name="nome_completo"
                                    value="{{ auth()->user()->name }}"
                                    readonly>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label
                                    class="form-label"
                                    style="font-weight:600;">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ auth()->user()->email }}"
                                    readonly>

                            </div>

                        </div>

                        <div
                            class="flex"
                            style="
                            justify-content:space-between;
                            align-items:center;
                            margin-top:10px;
                        ">

                            <p
                                class="small text-muted"
                                style="margin:0;">
                                Atualize os dados de cadastro antes de confirmar a inscrição.
                            </p>

                            <a
                                href="{{ route('perfil.index') }}"
                                class="btn-card cz">
                                <i class="icone editar m wt"></i>
                                Atualizar dados
                            </a>

                        </div>

                    </div>

                    {{-- DOCUMENTOS --}}

                    <div
                        style="
                        background:var(--cor-branco);
                        padding:20px;
                        border-radius:5px;
                        box-shadow:0 2px 4px rgba(0,0,0,0.05);
                        margin-bottom:20px;
                    ">

                        <div
                            style="
                            font-weight:700;
                            font-size:18px;
                            color:var(--cor-texto);
                            border-bottom:1px solid #ddd;
                            padding-bottom:8px;
                            margin-bottom:20px;
                        ">
                            Documentos
                        </div>

                        <p
                            class="small text-muted"
                            style="margin-bottom:20px;">
                            Envie os documentos em PDF, JPG ou PNG.
                            Tamanho máximo: 5MB.
                        </p>

                        <div class="row g-3">

                            {{-- COMPROVANTE DE HABILITAÇÃO --}}

                            <div class="col-md-6">

                                <div
                                    style="
                                    border:1px solid #ddd;
                                    border-radius:6px;
                                    padding:15px;
                                    background:#fff;
                                ">

                                    <strong
                                        style="
                                        color:var(--cor-texto);
                                        font-size:14px;
                                        display:block;
                                        margin-bottom:10px;
                                    ">
                                        Comprovante de Habilitação na Área *
                                    </strong>

                                    <input
                                        type="file"
                                        name="documento_habilitacao"
                                        id="documento_habilitacao"
                                        class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        required
                                        onchange="mostrarArquivo(this,'nome_habilitacao')">

                                    <small
                                        id="nome_habilitacao"
                                        class="text-success">
                                    </small>

                                </div>

                            </div>


                            {{-- QUITAÇÃO ELEITORAL --}}

                            <div class="col-md-6">

                                <div
                                    style="
                                    border:1px solid #ddd;
                                    border-radius:6px;
                                    padding:15px;
                                    background:#fff;
                                ">

                                    <strong
                                        style="
                                        color:var(--cor-texto);
                                        font-size:14px;
                                        display:block;
                                        margin-bottom:10px;
                                    ">
                                        Comprovante de Quitação Eleitoral
                                    </strong>

                                    <input
                                        type="file"
                                        name="quitacao_eleitoral"
                                        id="quitacao_eleitoral"
                                        class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        onchange="mostrarArquivo(this,'nome_quitacao')">

                                    <small
                                        id="nome_quitacao"
                                        class="text-success">
                                    </small>

                                </div>

                            </div>


                            {{-- FICHA DE INSCRIÇÃO --}}

                            <div class="col-md-6">

                                <div
                                    style="
                                    border:1px solid #ddd;
                                    border-radius:6px;
                                    padding:15px;
                                    background:#fff;
                                ">

                                    <strong
                                        style="
                                        color:var(--cor-texto);
                                        font-size:14px;
                                        display:block;
                                        margin-bottom:10px;
                                    ">
                                        Ficha de Inscrição *
                                    </strong>

                                    <input
                                        type="file"
                                        name="ficha_inscricao"
                                        id="ficha_inscricao"
                                        class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        required
                                        onchange="mostrarArquivo(this,'nome_ficha')">

                                    <small
                                        id="nome_ficha"
                                        class="text-success">
                                    </small>

                                </div>

                            </div>


                            {{-- CURRÍCULO LATTES --}}

                            <div class="col-md-6">

                                <div
                                    style="
                                    border:1px solid #ddd;
                                    border-radius:6px;
                                    padding:15px;
                                    background:#fff;
                                ">

                                    <strong
                                        style="
                                        color:var(--cor-texto);
                                        font-size:14px;
                                        display:block;
                                        margin-bottom:10px;
                                    ">
                                        Currículo Lattes
                                    </strong>

                                    <input
                                        type="file"
                                        name="curriculo_lattes"
                                        id="curriculo_lattes"
                                        class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        onchange="mostrarArquivo(this,'nome_lattes')">

                                    <small
                                        id="nome_lattes"
                                        class="text-success">
                                    </small>

                                </div>

                            </div>


                            {{-- DOCUMENTO DE IDENTIFICAÇÃO --}}

                            <div class="col-md-6">

                                <div
                                    style="
                                    border:1px solid #ddd;
                                    border-radius:6px;
                                    padding:15px;
                                    background:#fff;
                                ">

                                    <strong
                                        style="
                                        color:var(--cor-texto);
                                        font-size:14px;
                                        display:block;
                                        margin-bottom:10px;
                                    ">
                                        Documento de Identificação *
                                    </strong>

                                    <input
                                        type="file"
                                        name="documento_identificacao"
                                        id="documento_identificacao"
                                        class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        required
                                        onchange="mostrarArquivo(this,'nome_identidade')">

                                    <small
                                        id="nome_identidade"
                                        class="text-success">
                                    </small>

                                </div>

                            </div>


                            {{-- ENSINO MÉDIO --}}

                            <div class="col-md-6">

                                <div
                                    style="
                                    border:1px solid #ddd;
                                    border-radius:6px;
                                    padding:15px;
                                    background:#fff;
                                ">

                                    <strong
                                        style="
                                        color:var(--cor-texto);
                                        font-size:14px;
                                        display:block;
                                        margin-bottom:10px;
                                    ">
                                        Comprovante de Ensino Médio
                                    </strong>

                                    <input
                                        type="file"
                                        name="comprovante_ensino_medio"
                                        id="comprovante_ensino_medio"
                                        class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        onchange="mostrarArquivo(this,'nome_ensino')">

                                    <small
                                        id="nome_ensino"
                                        class="text-success">
                                    </small>

                                </div>

                            </div>


                            {{-- OUTROS DOCUMENTOS --}}

                            <div class="col-md-6">

                                <div
                                    style="
                                    border:1px solid #ddd;
                                    border-radius:6px;
                                    padding:15px;
                                    background:#fff;
                                ">

                                    <strong
                                        style="
                                        color:var(--cor-texto);
                                        font-size:14px;
                                        display:block;
                                        margin-bottom:10px;
                                    ">
                                        Outros Documentos
                                    </strong>

                                    <input
                                        type="file"
                                        name="outros_documentos"
                                        id="outros_documentos"
                                        class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        onchange="mostrarArquivo(this,'nome_outros')">

                                    <small
                                        id="nome_outros"
                                        class="text-success">
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- RODAPÉ FIXO --}}

                <div
                    class="flex"
                    style="
                    position:fixed;
                    bottom:0;
                    left:240px;
                    right:0;
                    background:var(--cor-branco);
                    padding:15px 45px;
                    justify-content:flex-end;
                    gap:15px;
                    border-top:1px solid #ddd;
                    box-shadow:0 -2px 10px rgba(0,0,0,0.05);
                    z-index:999;
                ">

                    <a
                        href="{{ route('candidato.dashboard') }}"
                        class="btn-card Vm">
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="btn-card">
                        Realizar Inscrição
                    </button>

                </div>

            </form>

        </main>

    </div>


    {{-- MODAL SUCESSO --}}

    <div
        class="modal fade"
        id="modalSucesso"
        tabindex="-1"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div
                class="modal-content"
                style="
                border:none;
                border-radius:8px;
                box-shadow:0 4px 12px rgba(0,0,0,0.15);
            ">

                <div
                    class="modal-body text-center"
                    style="padding:30px;">

                    <div
                        class="flex-center"
                        style="
                        width:60px;
                        height:60px;
                        margin:auto;
                        border-radius:50%;
                        background:#2F9D40;
                        color:#fff;
                        font-size:28px;
                        font-weight:bold;
                    ">
                        ✓
                    </div>

                    <h4
                        style="
                        margin-top:15px;
                        font-weight:700;
                    ">
                        Inscrição Realizada
                    </h4>

                    <p class="text-muted">

                        Sua inscrição foi enviada com sucesso.

                    </p>

                    <button
                        type="button"
                        class="btn-card"
                        data-bs-dismiss="modal">
                        OK
                    </button>

                </div>

            </div>

        </div>

    </div>


    {{-- MODAL ERRO --}}

    <div
        class="modal fade"
        id="modalErro"
        tabindex="-1"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div
                class="modal-content"
                style="
                border:none;
                border-radius:8px;
                box-shadow:0 4px 12px rgba(0,0,0,0.15);
            ">

                <div
                    class="modal-body text-center"
                    style="padding:30px;">

                    <div
                        class="flex-center"
                        style="
                        width:60px;
                        height:60px;
                        margin:auto;
                        border-radius:50%;
                        border:3px solid #BF212E;
                        color:#BF212E;
                        font-size:28px;
                        font-weight:bold;
                    ">
                        X
                    </div>

                    <h4
                        style="
                        margin-top:15px;
                        font-weight:700;
                    ">
                        Erro
                    </h4>

                    <p
                        class="text-muted"
                        id="textoErro">
                    </p>

                    <button
                        type="button"
                        class="btn-card Vm"
                        data-bs-dismiss="modal">
                        OK
                    </button>

                </div>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function mostrarArquivo(input, elemento) {
            let label =
                document.getElementById(elemento);

            if (input.files.length > 0) {
                label.innerHTML =
                    "Arquivo selecionado: " +
                    input.files[0].name;
            } else {
                label.innerHTML = "";
            }
        }
    </script>


    @if(session('success'))

    <script>
        document.addEventListener(
            'DOMContentLoaded',
            function() {
                new bootstrap.Modal(
                    document.getElementById(
                        'modalSucesso'
                    )
                ).show();
            }
        );
    </script>

    @endif


    @if($errors->any())

    <script>
        document.addEventListener(
            'DOMContentLoaded',
            function() {
                document.getElementById(
                        'textoErro'
                    ).innerHTML =
                    "Verifique os campos obrigatórios e tente novamente.";

                new bootstrap.Modal(
                    document.getElementById(
                        'modalErro'
                    )
                ).show();
            }
        );
    </script>

    @endif

</body>

</html>