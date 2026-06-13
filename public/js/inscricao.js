document.addEventListener('DOMContentLoaded', () => {
    
    const btnAtualizar = document.getElementById('btnAtualizarCadastro');
    const inputEmail = document.getElementById('emailPessoal');
    const inputNome = document.getElementById('nomePessoal');

    // Instâncias dos dois Pop-ups (Sucesso e Erro)
    const modalSucesso = new bootstrap.Modal(document.getElementById('modalSucesso'));
    const modalErro = new bootstrap.Modal(document.getElementById('modalErro'));
    
    const txtModalErro = document.getElementById('txtModalErro');

    // 1. VALIDAÇÃO DE DADOS COM POP-UPS CUSTOMIZADOS
    btnAtualizar.addEventListener('click', () => {
        // Validação se o nome está vazio
        if (!inputNome.value.trim()) {
            txtModalErro.textContent = 'Por favor, preencha o seu nome antes de atualizar.';
            modalErro.show();
            return;
        }

        // Validação do formato do e-mail
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(inputEmail.value)) {
            txtModalErro.textContent = 'O e-mail digitado é inválido. Verifique o formato e tente novamente.';
            modalErro.show();
            return;
        }

        // Se passar em tudo, exibe o Pop-up de Sucesso
        modalSucesso.show();
    });

    // 2. SIMULAÇÃO DE ANEXAR E EXCLUIR DOCUMENTOS
    window.anexarDocumento = function(idCard, nomeArquivo) {
        const cardBody = document.getElementById(idCard);
        
        const iconeCheck = '../icons/check.svg';
        const iconeDeletar = '../icons/deletar.svg';

        cardBody.innerHTML = `
            <div class="flex" style="justify-content: space-between; align-items: flex-start;">
                <strong style="color: var(--cor-texto); font-size: 14px;">${cardBody.dataset.titulo}</strong>
                <img src="${iconeCheck}" alt="OK" style="width: 18px; height: 18px;">
            </div>
            <p class="small text-muted" style="margin: 10px 0 0 0;">📄 ${nomeArquivo}</p>
            <div class="flex" style="justify-content: flex-end; gap: 10px; margin-top: 10px;">
                <button class="Br" style="padding: 4px 10px; font-size: 12px; border: 1px solid #ccc; border-radius: 4px;">Visualizar</button>
                <button class="Br flex-center" onclick="excluirDocumento('${idCard}')" style="padding: 4px 8px; border: 1px solid var(--cor-vermelho); border-radius: 4px; background: #fff; cursor: pointer;">
                    <img src="${iconeDeletar}" style="width: 14px;" alt="Excluir">
                </button>
            </div>
        `;
    };

    window.excluirDocumento = function(idCard) {
        const cardBody = document.getElementById(idCard);
        const iconeAdicionar = '../icons/AdicionarDocumento.svg';

        cardBody.innerHTML = `
            <strong style="color: var(--cor-texto); font-size: 14px; display: block; margin-bottom: 10px;">${cardBody.dataset.titulo}</strong>
            <div class="flex" style="justify-content: space-between; align-items: center; margin-top: 15px;">
                <span class="small text-danger" style="font-style: italic;">Nenhum arquivo anexado</span>
                <button class="Br flex" onclick="anexarDocumento('${idCard}', 'documento_enviado.pdf')" style="padding: 5px 12px; font-size: 12px; border: 1px solid #ccc; border-radius: 4px; align-items: center; gap: 5px; cursor: pointer;">
                    <img src="${iconeAdicionar}" alt="" style="width: 14px;"> Anexar
                </button>
            </div>
        `;
    };
});