<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meuPerfil.css') }}">
</head>

<body>

    <div class="layout">

        @include('global.sidebarCandidato')

        <main class="pagina">

            <div style="margin-left: 20px; padding: 45px; padding-bottom: 120px;">

                <h1 style="font-size: 42px; font-weight: 700; color: var(--cor-texto); margin-bottom: 5px;">INSCRIÇÃO</h1>
                <p style="font-size: 18px; color: #666; margin-bottom: 30px;">Certifique-se de que os dados estão corretos</p>

                <div style="background: var(--cor-branco); padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 20px;">
                    <div style="font-weight: 700; font-size: 18px; color: var(--cor-texto); border-bottom: 1px solid #ddd; padding-bottom: 8px; margin-bottom: 20px;">
                        Dados do Edital
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 600;">Edital selecionado:</label>
                            <input type="text" class="form-control" value="Edital Genérico Selecionado (Ex: 132)" readonly style="background-color: #f5f5f5;">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 600;">Área:</label>
                            <input type="text" class="form-control" value="Área do Edital vinda da tela anterior" readonly style="background-color: #f5f5f5;">
                        </div>
                    </div>
                    <p class="small text-muted" style="margin-top: 5px;">Confira os dados do edital antes de confirmar sua inscrição.</p>
                </div>

                
                <div style="background: var(--cor-branco); padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 20px;">
                    <div style="font-weight: 700; font-size: 18px; color: var(--cor-texto); border-bottom: 1px solid #ddd; padding-bottom: 8px; margin-bottom: 20px;">
                        Dados Pessoais
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 600;">Nome Completo:</label>
                            <input type="text" id="nome_completo" name="nome_completo" value="{{ old('nome_completo', auth()->user()->name) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 600;">Email:</label>
                            <input type="email" class="form-control" id="emailPessoal" name="emailPessoal"value="{{ old('emailPessoal', auth()->user()->email) }}">
                        </div>
                    </div>

                    <div class="flex" style="justify-content: space-between; align-items: center; margin-top: 10px;">
                        <p class="small text-muted" style="margin: 0;">Atualize os dados de cadastro antes de confirmar a inscrição.</p>
                        <button class="Br" id="btnAtualizarCadastro" style="padding: 6px 15px; border-radius: 4px; border: 1px solid #ccc; font-weight: 600; cursor: pointer; color: var(--cor-texto);">Atualizar Cadastro</button>
                    </div>
                </div>

                <div style="background: var(--cor-branco); padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 20px;">
                    <div style="font-weight: 700; font-size: 18px; color: var(--cor-texto); border-bottom: 1px solid #ddd; padding-bottom: 8px; margin-bottom: 15px;">
                        Documentos
                    </div>

                    <p class="small text-muted" style="margin-bottom: 20px;">
                        Envie os documentos solicitados em formato PDF, JPG ou PNG. Tamanho máximo por arquivo: 5MB.
                    </p>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div style="border: 1px solid #ddd; border-radius: 6px; padding: 15px; background: #fff;" id="cardHabilitacao" data-titulo="Comprovante de habilitação na área">
                                <strong style="color: var(--cor-texto); font-size: 14px; display: block; margin-bottom: 10px;">Comprovante de habilitação na área</strong>
                                <div class="flex" style="justify-content: space-between; align-items: center; margin-top: 15px;">
                                    <span class="small text-danger" style="font-style: italic;">Nenhum arquivo anexado</span>
                                    <button class="Br flex" onclick="anexarDocumento('cardHabilitacao', 'comprovante_habilitacao.pdf')" style="padding: 5px 12px; font-size: 12px; border: 1px solid #ccc; border-radius: 4px; align-items: center; gap: 5px; cursor: pointer;">
                                        <img src="{{ asset('icons/AdicionarDocumento.svg') }}" alt="" style="width: 14px;"> Anexar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div style="border: 1px solid #ddd; border-radius: 6px; padding: 15px; background: #fff;" id="cardQuitacao" data-titulo="Comprovante de Quitação Eleitoral">
                                <strong style="color: var(--cor-texto); font-size: 14px; display: block; margin-bottom: 10px;">Comprovante de Quitação Eleitoral</strong>
                                <div class="flex" style="justify-content: space-between; align-items: center; margin-top: 15px;">
                                    <span class="small text-danger" style="font-style: italic;">Nenhum arquivo anexado</span>
                                    <button class="Br flex" onclick="anexarDocumento('cardQuitacao', 'quitacao_eleitoral.pdf')" style="padding: 5px 12px; font-size: 12px; border: 1px solid #ccc; border-radius: 4px; align-items: center; gap: 5px; cursor: pointer;">
                                        <img src="{{ asset('icons/AdicionarDocumento.svg') }}" alt="" style="width: 14px;"> Anexar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div style="border: 1px solid #ddd; border-radius: 6px; padding: 15px; background: #fff;" id="cardFicha" data-titulo="Ficha de Inscrição">
                                <strong style="color: var(--cor-texto); font-size: 14px; display: block; margin-bottom: 10px;">Ficha de Inscrição</strong>
                                <div class="flex" style="justify-content: space-between; align-items: center; margin-top: 15px;">
                                    <span class="small text-danger" style="font-style: italic;">Nenhum arquivo anexado</span>
                                    <button class="Br flex" onclick="anexarDocumento('cardFicha', 'ficha_inscricao.pdf')" style="padding: 5px 12px; font-size: 12px; border: 1px solid #ccc; border-radius: 4px; align-items: center; gap: 5px; cursor: pointer;">
                                        <img src="{{ asset('icons/AdicionarDocumento.svg') }}" alt="" style="width: 14px;"> Anexar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div style="border: 1px solid #ddd; border-radius: 6px; padding: 15px; background: #fff;" id="cardLattes" data-titulo="Currículo Lattes - Exportado">
                                <strong style="color: var(--cor-texto); font-size: 14px; display: block; margin-bottom: 10px;">Currículo Lattes - Exportado</strong>
                                <div class="flex" style="justify-content: space-between; align-items: center; margin-top: 15px;">
                                    <span class="small text-danger" style="font-style: italic;">Nenhum arquivo anexado</span>
                                    <button class="Br flex" onclick="anexarDocumento('cardLattes', 'curriculo_lattes.pdf')" style="padding: 5px 12px; font-size: 12px; border: 1px solid #ccc; border-radius: 4px; align-items: center; gap: 5px; cursor: pointer;">
                                        <img src="{{ asset('icons/AdicionarDocumento.svg') }}" alt="" style="width: 14px;"> Anexar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div style="border: 1px solid #ddd; border-radius: 6px; padding: 15px; background: #fff;" id="cardEnsinoMedio" data-titulo="Comprovante de Ensino Médio">
                                <strong style="color: var(--cor-texto); font-size: 14px; display: block; margin-bottom: 10px;">Comprovante de Ensino Médio</strong>
                                <div class="flex" style="justify-content: space-between; align-items: center; margin-top: 15px;">
                                    <span class="small text-danger" style="font-style: italic;">Nenhum arquivo anexado</span>
                                    <button class="Br flex" onclick="anexarDocumento('cardEnsinoMedio', 'ensino_medio.pdf')" style="padding: 5px 12px; font-size: 12px; border: 1px solid #ccc; border-radius: 4px; align-items: center; gap: 5px; cursor: pointer;">
                                        <img src="{{ asset('icons/AdicionarDocumento.svg') }}" alt="" style="width: 14px;"> Anexar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div style="border: 1px solid #ddd; border-radius: 6px; padding: 15px; background: #fff;" id="cardIdentificacao" data-titulo="Documento de Identificação">
                                <strong style="color: var(--cor-texto); font-size: 14px; display: block; margin-bottom: 10px;">Documento de Identificação</strong>
                                <div class="flex" style="justify-content: space-between; align-items: center; margin-top: 15px;">
                                    <span class="small text-danger" style="font-style: italic;">Nenhum arquivo anexado</span>
                                    <button class="Br flex" onclick="anexarDocumento('cardIdentificacao', 'identidade_rg.pdf')" style="padding: 5px 12px; font-size: 12px; border: 1px solid #ccc; border-radius: 4px; align-items: center; gap: 5px; cursor: pointer;">
                                        <img src="{{ asset('icons/AdicionarDocumento.svg') }}" alt="" style="width: 14px;"> Anexar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div style="border: 1px solid #ddd; border-radius: 6px; padding: 15px; background: #fff;" id="cardOutros" data-titulo="Outros">
                                <strong style="color: var(--cor-texto); font-size: 14px; display: block; margin-bottom: 10px;">Outros</strong>
                                <div class="flex" style="justify-content: space-between; align-items: center; margin-top: 15px;">
                                    <span class="small text-danger" style="font-style: italic;">Nenhum arquivo anexado</span>
                                    <button class="Br flex" onclick="anexarDocumento('cardOutros', 'outros_documentos.pdf')" style="padding: 5px 12px; font-size: 12px; border: 1px solid #ccc; border-radius: 4px; align-items: center; gap: 5px; cursor: pointer;">
                                        <img src="{{ asset('icons/AdicionarDocumento.svg') }}" alt="" style="width: 14px;"> Anexar
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex" style="position: fixed; bottom: 0; left: 240px; right: 0; background: var(--cor-branco); padding: 15px 45px; justify-content: flex-end; gap: 15px; border-top: 1px solid #ddd; box-shadow: 0 -2px 10px rgba(0,0,0,0.05); z-index: 999;">
                <a href="#" class="Br flex-center" style="width: 170px; height: 40px; border: 1px solid #ccc; border-radius: 4px; text-decoration: none; color: var(--cor-texto); font-weight: 700;">Cancelar</a>

                <button class="Br" style="width: 170px; height: 40px; border: 1px solid #ccc; border-radius: 4px; font-weight: 700; cursor: pointer; color: var(--cor-texto);">Salvar Rascunho</button>

                <a href="#" class="flex-center" style="width: 170px; height: 40px; border-radius: 4px; background-color: var(--cor-verde); text-decoration: none; color: #ffffff; font-weight: 700; border: none; cursor: pointer;">Realizar Inscrição</a>
            </div>

            <div class="modal fade" id="modalSucesso" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border: none; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); background: #fff;">
                        <div class="modal-body text-center" style="padding: 30px;">
                            <img src="{{ asset('icons/check.svg') }}" alt="Sucesso" style="width: 50px; margin-bottom: 15px;">
                            <h4 style="font-weight: 700; color: var(--cor-texto);">Cadastro Atualizado!</h4>
                            <p class="text-muted" style="margin-top: 10px;">Seus dados pessoais foram salvos com sucesso para esta inscrição.</p>
                            <button type="button" data-bs-dismiss="modal" style="background-color: var(--cor-verde); padding: 8px 35px; border: none; border-radius: 4px; color: #ffffff; font-weight: 600; margin-top: 15px; cursor: pointer; width: 120px;">Ok</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalErro" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border: none; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); background: #fff;">
                        <div class="modal-body text-center" style="padding: 30px;">
                            <div class="flex-center" style="width: 50px; height: 50px; border: 3px solid var(--cor-vermelho); border-radius: 50%; margin: 0 auto 15px auto;">
                                <span style="color: var(--cor-vermelho); font-weight: 700; font-size: 24px; font-family: Arial, sans-serif;">X</span>
                            </div>
                            <h4 style="font-weight: 700; color: var(--cor-texto);">Ops! Algo deu errado</h4>
                            <p class="text-muted" id="txtModalErro" style="margin-top: 10px; font-size: 14px;"></p>
                            <button type="button" data-bs-dismiss="modal" style="background-color: var(--cor-vermelho); padding: 8px 35px; border: none; border-radius: 4px; color: #ffffff; font-weight: 600; margin-top: 15px; cursor: pointer; width: 120px;">Ok</button>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <script src="{{ asset('js/inscricao.js') }}"></script>

        </main>

</body>

</html>