<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
</head>

<body>

<!-- POPUP -->
<div id="modalHomenagem" class="modal">

    <div class="modal-conteudo">

        <h1 class="titulo">🙏 Agradecimentos</h1>

        <p class="mb-15">
            O projeto <strong>PFE (PFE For Edital)</strong> foi desenvolvido com o objetivo de facilitar o processo de inscrições em editais do Instituto Federal Catarinense.
        </p>

        <p class="mb-15">
            Agradecemos a todos que contribuíram direta ou indiretamente.
        </p>

        <p class="mb-15">
            Em especial, deixamos nossa homenagem a:
        </p>

        <p class="mb-20">
            <strong>
                Eduardo Michel Karschimarski, Felipe Lopes de Goes Couto, Gabriele do Nascimento Cardoso,  
                Guilherme Augusto Soares de Souza, Kalleb de Oliveira, Kamile Galcovski,  
                Livia Cristine de Mendonça Costa, Luan Henrique de Souza,  
                Miguel Ângelo Bonin, Nelson Dias Ponciano Scarin, Renan Ramlov,  
                Vinicius Alves de Almeida.
            </strong>
        </p>

        <button class="btn Vm" onclick="fecharModal()">
            Fechar
        </button>

    </div>

</div>
<script>
function abrirModal() {
    document.getElementById('modalHomenagem').style.display = 'flex';
}

function fecharModal() {
    document.getElementById('modalHomenagem').style.display = 'none';
}

// fechar clicando fora do modal
window.onclick = function(event) {
    const modal = document.getElementById('modalHomenagem');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}
</script>
</body>
</html>