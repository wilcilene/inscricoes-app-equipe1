
<link rel="icon" href="global/img/icones/favicon-light.svg" media="(prefers-color-scheme:dark )">
    <link rel="icon" href="global/img/icones/favicon-dark.svg" media="(prefers-color-scheme:light )">

    <title>Editais IFC - Equipe 1</title>
<link rel="stylesheet" href="{{ asset('global/style.css') }}">


        <!-- MENU LATERAL -->

        <aside class="menu-lateral">

            <div class="flex-center p-20">
                <div class="IFCfull wt"></div>
            </div>

            <nav class="menu">

                <a href="/admin" class="item-menu ativo">
                    <i class="icone inicio wt m"></i>
                    <span>Início</span>
                </a>

                <a href="{{ route('admin.editais.cadastrar') }}" class="item-menu">
                    <i class="icone lista wt m"></i>
                    <span>Cadastrar Editais</span>
                </a>

                <a href="{{ route('candidaturas') }}" class="item-menu">
                    <i class="icone usuario wt m"></i>
                    <span>Candidaturas</span>
                </a>

                <a href="/admin" class="item-menu" onclick="abrirSobre(event)">
    <i class="icone sobre wt m"></i>
    <span>Sobre</span>
</a>

                <script>
document.addEventListener("DOMContentLoaded", function () {

    const modal = document.createElement("div");
    modal.className = "modal";

    modal.innerHTML = `
        
    <div class="modal-conteudo">
            <h1 class="titulo">Sobre o Sistema</h1>

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
                Guilherme Augusto Soares de Souza, Kalleb de Oliveira,  
                Livia Cristine de Mendonça Costa, Luan Henrique de Souza,  
                Miguel Ângelo Bonin, Nelson Dias Ponciano Scarin, Renan Ramlov,  
                Vinicius Alves de Almeida.
            </strong>
        </p>

            <button class="btn Vm" id="fecharSobreBtn">
                Fechar
            </button>

        </div>
    `;

    document.body.appendChild(modal);

    window.abrirSobre = function (event) {
        event.preventDefault();
        modal.classList.add("ativo");
    };

    function fechar() {
        modal.classList.remove("ativo");
    }

    modal.querySelector("#fecharSobreBtn").addEventListener("click", fechar);

    modal.addEventListener("click", function (event) {
        if (event.target === modal) {
            fechar();
        }
    });

});
</script>

            </nav>

            <div class="rodape-menu">

                <a href="/login" class="item-menu">
                    <i class="icone saida wt m"></i>
                    <span>Sair</span>
                </a>

            </div>

        </aside>