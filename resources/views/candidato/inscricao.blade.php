<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inscrição</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            background: #e5e5e5;
            color: #333;
        }

        .page {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 260px;
            background: #444;
            color: white;
            padding: 30px 25px;
            flex-shrink: 0;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 60px;
        }

        .menu-item {
            display: block;
            color: #ddd;
            text-decoration: none;
            margin: 28px 0;
            font-size: 16px;
        }

        .menu-item:hover {
            color: white;
        }

        .content {
            flex: 1;
            padding: 55px 70px;
        }

        .title {
            font-size: 44px;
            font-weight: 800;
            margin: 0;
        }

        .subtitle {
            font-size: 20px;
            margin-top: 6px;
            margin-bottom: 28px;
        }

        .card {
            background: white;
            margin-bottom: 18px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            padding: 14px 22px;
            border-bottom: 1px solid #ccc;
        }

        .card-body {
            padding: 18px 22px 26px;
        }

        .row {
            display: flex;
            gap: 36px;
            margin-bottom: 20px;
        }

        .field {
            flex: 1;
        }

        label {
            display: block;
            font-size: 15px;
            margin-bottom: 6px;
        }

        input,
        select {
            width: 100%;
            height: 34px;
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 6px 10px;
            font-size: 15px;
            background: white;
        }

        input[readonly] {
            background: #f5f5f5;
            color: #555;
        }

        .help-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 18px;
        }

        .documents-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .document-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 14px;
            min-height: 95px;
        }

        .document-title {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 14px;
        }

        .document-input {
            font-size: 14px;
            height: auto;
            padding: 7px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
            margin-top: 28px;
        }

        .btn-cancel {
            background: #bfbfbf;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 12px 48px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 3px 5px rgba(0,0,0,0.25);
        }

        .btn-submit {
            background: #299b3f;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 12px 58px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 3px 5px rgba(0,0,0,0.35);
        }

        .btn-submit:hover {
            background: #238637;
        }

        .success-box {
            background: #dff5e1;
            border: 1px solid #299b3f;
            color: #176b2a;
            padding: 12px;
            margin-bottom: 18px;
            font-weight: 500;
        }

        .error-box {
            background: #ffdede;
            border: 1px solid #d71920;
            color: #900;
            padding: 12px;
            margin-bottom: 18px;
            font-weight: 500;
        }

        @media (max-width: 900px) {
            .page {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 20px;
            }

            .content {
                padding: 35px 25px;
            }

            .row {
                flex-direction: column;
                gap: 18px;
            }

            .documents-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <aside class="sidebar">
            <div class="logo">IFC</div>

            <a href="/" class="menu-item">Início</a>
            <a href="#" class="menu-item">Meu perfil</a>
            <a href="/candidato/inscricao" class="menu-item">Minhas Inscrições</a>
        </aside>

        <section class="content">
            <h1 class="title">INSCRIÇÃO</h1>
            <p class="subtitle">Certifique-se de que os dados estão corretos</p>

            @if (session('success'))
                <div class="success-box">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-box">
                    Preencha os campos obrigatórios e envie os documentos em PDF com até 5MB.
                </div>
            @endif

            <form method="POST" action="{{ route('candidato.inscricao.enviar') }}" enctype="multipart/form-data">
                @csrf

                <section class="card">
                    <div class="card-title">Dados Pessoais</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="field">
                                <label for="nome">Nome Completo:</label>
                                <input
                                    type="text"
                                    id="nome"
                                    name="nome"
                                    value="{{ auth()->user()->name ?? 'Candidato' }}"
                                    readonly
                                >
                            </div>

                            <div class="field">
                                <label for="email">Email:</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ auth()->user()->email ?? 'candidato@email.com' }}"
                                    readonly
                                >
                            </div>
                        </div>
                    </div>
                </section>

                <section class="card">
                    <div class="card-title">Dados da Inscrição</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="field">
                                <label for="edital">Edital:</label>
                                <input
                                    type="text"
                                    id="edital"
                                    name="edital"
                                    value="Edital selecionado anteriormente"
                                    readonly
                                >
                            </div>

                            <div class="field">
                                <label for="vaga">Vaga / Área:</label>
                                <input
                                    type="text"
                                    id="vaga"
                                    name="vaga"
                                    value="Vaga selecionada anteriormente"
                                    readonly
                                >
                            </div>
                        </div>
                    </div>
                </section>

                <section class="card">
                    <div class="card-title">Documentos</div>

                    <div class="card-body">
                        <p class="help-text">
                            Envie os documentos solicitados em formato PDF. Tamanho máximo por arquivo: 5MB.
                        </p>

                        <div class="documents-grid">
                            <div class="document-box">
                                <div class="document-title">Ficha de Inscrição *</div>
                                <input
                                    class="document-input"
                                    type="file"
                                    name="ficha_inscricao"
                                    accept="application/pdf"
                                    required
                                >
                            </div>

                            <div class="document-box">
                                <div class="document-title">Currículo Lattes - Exportado</div>
                                <input
                                    class="document-input"
                                    type="file"
                                    name="curriculo_lattes"
                                    accept="application/pdf"
                                >
                            </div>

                            <div class="document-box">
                                <div class="document-title">Documento de Identificação</div>
                                <input
                                    class="document-input"
                                    type="file"
                                    name="documento_identificacao"
                                    accept="application/pdf"
                                >
                            </div>

                            <div class="document-box">
                                <div class="document-title">Comprovante de Ensino Médio</div>
                                <input
                                    class="document-input"
                                    type="file"
                                    name="comprovante_ensino_medio"
                                    accept="application/pdf"
                                >
                            </div>

                            <div class="document-box">
                                <div class="document-title">Comprovante de habilitação na área *</div>
                                <input
                                    class="document-input"
                                    type="file"
                                    name="documento_habilitacao"
                                    accept="application/pdf"
                                    required
                                >
                            </div>

                            <div class="document-box">
                                <div class="document-title">Comprovante de Quitação Eleitoral</div>
                                <input
                                    class="document-input"
                                    type="file"
                                    name="quitacao_eleitoral"
                                    accept="application/pdf"
                                >
                            </div>

                            <div class="document-box">
                                <div class="document-title">Outros</div>
                                <input
                                    class="document-input"
                                    type="file"
                                    name="outros_documentos"
                                    accept="application/pdf"
                                >
                            </div>
                        </div>

                        <div class="actions">
                            <button type="button" class="btn-cancel" onclick="window.location.href='/'">
                                Cancelar
                            </button>

                            <button type="submit" class="btn-submit">
                                Enviar Inscrição
                            </button>
                        </div>
                    </div>
                </section>
            </form>
        </section>
    </main>
</body>
</html>