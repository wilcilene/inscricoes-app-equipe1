<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @include('global.sidebarCandidato')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #e9e9e9;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #3f4242;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px 18px;
        }

        .logo-img {
            width: 185px;
            height: auto;
            margin-bottom: 45px;
            display: block;
        }

        .menu-item {
            margin: 28px 0;
            color: #dcdcdc;
        }

        .sair {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
            border: 1px solid #777;
            padding: 12px;
            border-radius: 12px;
            color: #ddd;
        }

        .content {
            margin-left: 260px;
            padding: 45px;
            padding-bottom: 110px;
        }

        .title {
            font-size: 42px;
            font-weight: bold;
            color: #3d3f42;
        }

        .subtitle {
            font-size: 18px;
            color: #444;
            margin-bottom: 28px;
        }

        .box {
            background: white;
            padding: 20px;
            margin-bottom: 16px;
        }

        .box-title {
            font-weight: bold;
            font-size: 18px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }

        .document-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 14px;
            min-height: 92px;
            background: #fff;
        }

        .bottom-buttons {
            position: fixed;
            bottom: 20px;
            left: 285px;
            right: 35px;
            background: white;
            padding: 10px;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            border-top: 1px solid #ccc;
        }

        .btn-cancelar {
            width: 170px;
            background: #bfbfbf;
            border: 1px solid #888;
            font-weight: bold;
        }

        .btn-rascunho {
            width: 170px;
            border: 1px solid #aaa;
            font-weight: bold;
        }

        .btn-inscricao {
            width: 170px;
            background: #28a745;
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <img src="/logo.png" alt="Instituto Federal" class="logo-img">

    <div class="menu-item"> Início</div>
    <div class="menu-item"> Meu perfil</div>
    <div class="menu-item"> Minhas Inscrições</div>

    <div class="sair">↪ Sair</div>
</div>

<div class="content">
    <h1 class="title">INSCRIÇÃO</h1>
    <p class="subtitle">Certifique-se de que os dados estão corretos</p>

    <div class="box">
        <div class="box-title">Dados do Edital</div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Edital selecionado:</label>
                <input type="text" class="form-control" value="Edital 01/2026 - Processo Seletivo" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Área:</label>
                <input type="text" class="form-control" value="Informática / Desenvolvimento Web" readonly>
            </div>
        </div>

        <p class="small text-muted">
            Confira os dados do edital antes de confirmar sua inscrição.
        </p>
    </div>

    <div class="box">
        <div class="box-title">Dados Pessoais</div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nome Completo:</label>
                <input type="text" class="form-control" value="João da Silva" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" value="joaosilva32@gmail.com" readonly>
            </div>
        </div>

        <p class="small text-muted">
            Atualize os dados de cadastro antes de confirmar a inscrição.
        </p>

        <button class="btn btn-secondary btn-sm">Cadastro</button>
    </div>

    <div class="box">
        <div class="box-title">Documentos</div>

        <p class="small text-muted">
            Envie os documentos solicitados em formato PDF, JPG ou PNG. Tamanho máximo por arquivo: 5MB.
        </p>

        <div class="row g-3">

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Comprovante de habilitação na área</strong>
                    <span class="text-success float-end">●</span>
                    <p class="small text-muted mt-2">📄 diploma_ensino_medio.pdf</p>
                    <button class="btn btn-light btn-sm float-end">Visualizar</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Comprovante de Quitação Eleitoral</strong>
                    <p class="small text-muted mt-2">Nenhum arquivo anexado</p>
                    <button class="btn btn-light btn-sm float-end">Anexar</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Ficha de Inscrição</strong>
                    <p class="small text-muted mt-2">Nenhum arquivo anexado</p>
                    <button class="btn btn-light btn-sm float-end">Anexar</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Currículo Lattes - Exportado</strong>
                    <p class="small text-muted mt-2">Nenhum arquivo anexado</p>
                    <button class="btn btn-light btn-sm float-end">Anexar</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Documento de Identificação</strong>
                    <p class="small text-muted mt-2">Nenhum arquivo anexado</p>
                    <button class="btn btn-light btn-sm float-end">Anexar</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Comprovante de Residência</strong>
                    <p class="small text-muted mt-2">Nenhum arquivo anexado</p>
                    <button class="btn btn-light btn-sm float-end">Anexar</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Declaração de Veracidade</strong>
                    <p class="small text-muted mt-2">Nenhum arquivo anexado</p>
                    <button class="btn btn-light btn-sm float-end">Anexar</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Laudo Médico (se aplicável)</strong>
                    <p class="small text-muted mt-2">Nenhum arquivo anexado</p>
                    <button class="btn btn-light btn-sm float-end">Anexar</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Certificados Comprobatórios</strong>
                    <p class="small text-muted mt-2">Nenhum arquivo anexado</p>
                    <button class="btn btn-light btn-sm float-end">Anexar</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="document-card">
                    <strong>Outros</strong>
                    <p class="small text-muted mt-2">Nenhum arquivo anexado</p>
                    <button class="btn btn-light btn-sm float-end">Anexar</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="bottom-buttons">
    <a href="/editais" class="btn btn-cancelar">Cancelar</a>
    <button class="btn btn-rascunho">Salvar Rascunho</button>
    <a href="/ficha-inscricao" class="btn btn-inscricao">Realizar Inscrição</a>
</div>

</body>
</html>