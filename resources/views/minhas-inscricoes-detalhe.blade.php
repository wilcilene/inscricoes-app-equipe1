<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acompanhamento da Inscrição</title>

```
<link rel="stylesheet" href="{{ asset('css/style.css') }}?v=22">
```

</head>
<body>
    <main class="mural-ifc-page">
        <aside class="mural-ifc-sidebar">
            <div class="mural-ifc-logo">
                <img src="{{ asset('icons/IFCfull.svg') }}" alt="Instituto Federal">
            </div>

```
        <nav class="mural-ifc-menu">
            <a href="/mural-editais" class="mural-ifc-menu-item">
                <img src="{{ asset('icons/inicio.svg') }}" alt="">
                <span>Início</span>
            </a>

            <a href="/perfil" class="mural-ifc-menu-item">
                <img src="{{ asset('icons/usuario.svg') }}" alt="">
                <span>Meu perfil</span>
            </a>

            <a href="/minhas-inscricoes" class="mural-ifc-menu-item active">
                <img src="{{ asset('icons/lista.svg') }}" alt="">
                <span>Minhas Inscrições</span>
            </a>
        </nav>
    </aside>

    <section class="mural-ifc-content" style="font-family: var(--fonte-principal), Arial, sans-serif;">
        <header class="mural-ifc-header" style="max-width: 1010px; margin-bottom: 26px;">
            <div>
                <h1 style="font-size: 42px;">MINHAS INSCRIÇÕES</h1>
                <p>Acompanhe o status da sua inscrição</p>
            </div>

            <a href="/minhas-inscricoes" style="background: #2b9d42; color: #ffffff; padding: 10px 24px; border-radius: 20px; text-decoration: none; font-weight: 800; box-shadow: 0 3px 5px rgba(0,0,0,0.25);">
                Voltar
            </a>
        </header>

        <section style="max-width: 1010px; background: #ffffff; border-radius: 8px; padding: 24px 34px; display: grid; grid-template-columns: repeat(4, 1fr); gap: 28px; margin-bottom: 24px; box-shadow: 0 2px 5px rgba(0,0,0,0.08);">
            <div>
                <p style="margin: 0 0 6px; color: #33383d; font-size: 16px;">Edital No.</p>
                <strong style="font-size: 24px; color: #33383d;">01/2026</strong>
            </div>

            <div>
                <p style="margin: 0 0 6px; color: #33383d; font-size: 16px;">Candidato</p>
                <strong style="font-size: 24px; color: #33383d;">Gabriela Silva</strong>
            </div>

            <div>
                <p style="margin: 0 0 6px; color: #33383d; font-size: 16px;">Data Submissão</p>
                <strong style="font-size: 24px; color: #33383d;">22/04/2026</strong>
            </div>

            <div>
                <p style="margin: 0 0 6px; color: #33383d; font-size: 16px;">Status</p>
                <span style="display: inline-block; background: #d71920; color: #ffffff; padding: 8px 20px; border-radius: 6px; font-size: 18px; font-weight: 800;">
                    Em análise
                </span>
            </div>
        </section>

        <section style="max-width: 1010px; display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
            <article style="background: #ffffff; border-radius: 8px; padding: 28px 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.08); min-height: 420px;">
                <h2 style="margin: 0 0 30px; color: #33383d; font-size: 26px; font-weight: 800;">
                    Histórico
                </h2>

                <div style="display: flex; flex-direction: column; gap: 28px;">
                    <div style="display: flex; gap: 16px; align-items: flex-start;">
                        <div style="width: 26px; min-width: 26px; height: 26px; border-radius: 50%; background: #2b9d42; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800;">
                            ✓
                        </div>

                        <div>
                            <strong style="display: block; font-size: 20px; color: #33383d; margin-bottom: 4px;">Submissão - 22/04/2026</strong>
                            <p style="margin: 0; color: #555555; font-size: 16px;">Submissão completa</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 16px; align-items: flex-start;">
                        <div style="width: 26px; min-width: 26px; height: 26px; border-radius: 50%; background: #2b9d42; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800;">
                            ✓
                        </div>

                        <div>
                            <strong style="display: block; font-size: 20px; color: #33383d; margin-bottom: 4px;">Homologação - 30/05/2026</strong>
                            <p style="margin: 0; color: #555555; font-size: 16px;">Inscrição homologada</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 16px; align-items: flex-start;">
                        <div style="width: 26px; min-width: 26px; height: 26px; border-radius: 50%; border: 2px solid #2b9d42; background: #ffffff;">
                        </div>

                        <div>
                            <strong style="display: block; font-size: 20px; color: #33383d; margin-bottom: 4px;">Análise Inscrição - 30/05/2026</strong>
                            <p style="margin: 0; color: #555555; font-size: 16px;">Aguardando análise da comissão</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 16px; align-items: flex-start;">
                        <div style="width: 26px; min-width: 26px; height: 26px; border-radius: 50%; border: 2px solid #c0c0c0; background: #ffffff;">
                        </div>

                        <div>
                            <strong style="display: block; font-size: 20px; color: #33383d; margin-bottom: 4px;">Resultado Preliminar - 30/05/2026</strong>
                            <p style="margin: 0; color: #555555; font-size: 16px;">Resultado ainda não publicado</p>
                        </div>
                    </div>
                </div>
            </article>

            <article style="background: #ffffff; border-radius: 8px; padding: 28px 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.08); min-height: 420px;">
                <h2 style="margin: 0 0 24px; color: #33383d; font-size: 26px; font-weight: 800;">
                    Documentos
                </h2>

                <div style="display: flex; flex-direction: column; gap: 14px;">
                    <div style="border: 1px solid #d0d0d0; border-radius: 8px; padding: 16px 18px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <strong style="display: block; color: #33383d; font-size: 17px; margin-bottom: 5px;">Comprovante de Ensino Médio</strong>
                            <p style="margin: 0; color: #666666; font-size: 15px;">diploma_ensino_medio.pdf</p>
                        </div>

                        <span style="color: #d71920; font-weight: 800;">PDF</span>
                    </div>

                    <div style="border: 1px solid #d0d0d0; border-radius: 8px; padding: 16px 18px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <strong style="display: block; color: #33383d; font-size: 17px; margin-bottom: 5px;">Comprovante de Ensino Superior</strong>
                            <p style="margin: 0; color: #666666; font-size: 15px;">diploma_ensino_superior.pdf</p>
                        </div>

                        <span style="color: #d71920; font-weight: 800;">PDF</span>
                    </div>

                    <div style="border: 1px solid #d0d0d0; border-radius: 8px; padding: 16px 18px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <strong style="display: block; color: #33383d; font-size: 17px; margin-bottom: 5px;">Ficha de Inscrição</strong>
                            <p style="margin: 0; color: #666666; font-size: 15px;">ficha_inscricao.pdf</p>
                        </div>

                        <span style="color: #d71920; font-weight: 800;">PDF</span>
                    </div>

                    <div style="border: 1px solid #d0d0d0; border-radius: 8px; padding: 16px 18px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <strong style="display: block; color: #33383d; font-size: 17px; margin-bottom: 5px;">Documento de Identificação</strong>
                            <p style="margin: 0; color: #666666; font-size: 15px;">documento_rg.pdf</p>
                        </div>

                        <span style="color: #d71920; font-weight: 800;">PDF</span>
                    </div>
                </div>
            </article>
        </section>
    </section>
</main>
```

</body>
</html>
