@props([
    'editais',
    'tipoUsuarioId',
    'minhasInscricoes' => []
])

<div class="editais-topo">

    @if(session('erro'))
        <div class="alert-topo" data-alerta-topo>
            <i class="icone alerta"></i>
            <strong>Atenção!</strong>
            {{ session('erro') }}
        </div>
    @endif

    @if(session('sucesso'))
        <div class="alert-topo sucesso" data-alerta-topo>
            <i class="icone check"></i>
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="busca-container">
        <i class="icone buscar cz"></i>
        <input type="text" id="filtroEdital" class="busca-edital" placeholder="Buscar Editais...">
    </div>

    <select id="filtroStatus" class="filtro-select">
        <option value="todos">Todos</option>
        <option value="abertos">Inscrições abertas</option>
        <option value="encerrados">Encerrados</option>
    </select>

</div>

<div class="grid-editais">

@foreach($editais as $edital)

@php
    $bloqueado = now()->gt($edital->data_fim_inscr);

    $candidato = null;
    $inscricao = null;
    $inscrito = false;

    if (auth()->check() && $tipoUsuarioId == 2) {

        $candidato = \App\Models\Candidato::where('user_id', auth()->id())->first();

        if ($candidato) {

            $inscricao = \App\Models\Inscricao::where('edital_id', $edital->id)
                ->where('candidato_id', $candidato->id)
                ->first();

            $inscrito = $inscricao ? true : false;
        }
    }
@endphp

<div class="card-edital {{ $bloqueado ? 'card-bloqueado' : '' }}"
     data-nome="{{ strtolower($edital->nome) }}">

    <div class="card-topo"></div>

    <div class="card-corpo">

        <h2>EDITAL {{ $edital->nome }}</h2>

        <h3>{{ strtoupper($edital->descricao) }}</h3>

        <div class="card-data">
            <i class="icone calendario bk"></i>
            Data Limite: {{ \Carbon\Carbon::parse($edital->data_fim_inscr)->format('d/m/Y') }}
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <i class="icone usuario p bk"></i>
            {{ $edital->inscricoes_count }}
        </div>

        <p>{{ $edital->resumo }}</p>

        {{-- SE ABERTO --}}
        @if(!$bloqueado)

            {{-- NÃO LOGADO --}}
            @if(!auth()->check())

                <a href="{{ route('login') }}" class="btn-card">
                    <i class="icone adicionar wt"></i>
                    REALIZAR INSCRIÇÃO
                </a>

            @endif

            {{-- CANDIDATO LOGADO --}}
            @if(auth()->check() && $tipoUsuarioId == 2)

                {{-- JÁ INSCRITO --}}
                @if($inscrito && $inscricao)

                    <a href="{{ route('minhas-inscricoes.detalhe', $inscricao->id) }}"
                       class="btn-card eqc">

                        <i class="icone olho m cz"></i>
                        VER INSCRIÇÃO
                    </a>

                {{-- NÃO INSCRITO --}}
                @else

                    <a href="{{ route('inscrever', ['edital' => $edital->id]) }}"
                       class="btn-card">

                        <i class="icone adicionar wt"></i>
                        REALIZAR INSCRIÇÃO
                    </a>

                @endif

            @endif

            {{-- ADMIN --}}
            @if(auth()->check() && $tipoUsuarioId == 1)

                <div class="acoes-admin">

                    <a href="{{ route('admin.editais.editar', ['id' => $edital->id]) }}"
                       class="btn-card Br">

                        <i class="icone editar cz"></i>
                        EDITAR
                    </a>

                    <form method="POST"
                          action="{{ route('edital.destroy', $edital->id) }}">

                        @csrf
                        @method('DELETE')

                        <button class="btn-card Vm">
                            <i class="icone excluir wt"></i>
                            REMOVER
                        </button>

                    </form>

                </div>

            @endif

        {{-- ENCERRADO --}}
        @else

            <div class="btn-card eqc">
                Inscrições encerradas
            </div>

        @endif

    </div>

</div>

@endforeach

</div>

<script>
const campoBusca = document.getElementById('filtroEdital');
const filtro = document.getElementById('filtroStatus');
const cards = document.querySelectorAll('.card-edital');

function filtrarEditais() {

    const texto = campoBusca.value.toLowerCase().trim();
    const tipo = filtro.value;

    cards.forEach((card) => {

        const nome = (card.dataset.nome || '').toLowerCase();
        const bloqueado = card.classList.contains('card-bloqueado');

        let mostrar = nome.includes(texto);

        if (tipo === 'abertos') {
            mostrar = mostrar && !bloqueado;
        }

        if (tipo === 'encerrados') {
            mostrar = mostrar && bloqueado;
        }

        card.style.display = mostrar ? '' : 'none';
    });
}

campoBusca.addEventListener('input', filtrarEditais);
filtro.addEventListener('change', filtrarEditais);

filtrarEditais();

setTimeout(() => {
    const alerta = document.querySelector('[data-alerta-topo]');
    if (alerta) {
        alerta.style.transition = '0.5s';
        alerta.style.opacity = '0';
        setTimeout(() => alerta.remove(), 1000);
    }
}, 3000);
</script>