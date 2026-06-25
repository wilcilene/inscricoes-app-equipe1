<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detalhes da Candidatura</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @if(auth()->user()->tipo_usuario_id == 1)
    @include('global.sidebarAdmin')

    @elseif(auth()->user()->tipo_usuario_id == 2)
    @include('global.sidebarCandidato')

    @endif
</head>

<body>

    @php
    $statusAtual = strtolower($candidatura->status->status ?? 'pendente');

    $nomesDocumentos = [
    'caminho_ficha_inscricao' => 'Ficha de Inscrição',
    'caminho_identidade' => 'Documento de Identidade',
    'caminho_diploma' => 'Diploma',
    'caminho_curriculo_lattes' => 'Currículo Lattes',
    'caminho_comprovante_eleitoral' => 'Quitação Eleitoral',
    'caminho_certificado_militar' => 'Certificado Militar',
    ];
    @endphp

    <div class="layout">

        <main class="pagina">

            <section class="cand-detalhe-content">

                {{-- HEADER --}}
                <header class="cand-detalhe-header">
                    <h1>
                        Candidatura {{ $candidatura->candidato->user->name ?? 'Sem Nome' }}
                    </h1>
                </header>

                {{-- RESUMO --}}
                <section class="cand-detalhe-summary">

                    <div>
                        <span>Edital</span>
                        <strong>{{ $candidatura->edital->nome ?? 'Sem Edital' }}</strong>
                    </div>

                    <div>
                        <span>Candidato</span>
                        <strong>{{ $candidatura->candidato->user->name ?? 'Sem Nome' }}</strong>
                    </div>

                    <div>
                        <span>Data da Inscrição</span>
                        <strong>{{ $candidatura->created_at?->format('d/m/Y') ?? '-' }}</strong>
                    </div>

                    <div>
                        @php
                        $ultimoHistorico = $candidatura->historico
                        ->sortByDesc('updated_at')
                        ->first();

                        $status = strtolower(
                        $ultimoHistorico->status->status ?? 'pendente'
                        );
                        @endphp

                        @if($status == 'aprovado')

                        <Button class="btn-card">Aprovado</Button>

                        @elseif($status == 'rejeitado')

                        <Button class="btn-card Vm">Rejeitado</Button>

                        @else

                        <Button class="btn-card Br">Pedente</Button>

                        @endif
                    </div>

                </section>

                {{-- GRID --}}
                <section class="cand-detalhe-grid">

                    {{-- ESQUERDA --}}
                    <div class="cand-detalhe-left">

                        {{-- DADOS --}}
                        <section class="cand-detalhe-card dados">

                            <h2>Dados do Candidato</h2>

                            <div class="cand-detalhe-dados">

                                <p><span>Nome:</span> {{ $candidatura->candidato->user->name ?? '-' }}</p>
                                <p><span>CPF:</span> {{ $candidatura->candidato->cpf ?? '-' }}</p>

                                <p>
                                    <span>Data Nascimento:</span>
                                    {{ $candidatura->candidato->data_nascimento
                                    ? \Carbon\Carbon::parse($candidatura->candidato->data_nascimento)->format('d/m/Y')
                                    : '-' }}
                                </p>

                                <p><span>Sexo:</span> {{ $candidatura->candidato->genero ?? '-' }}</p>
                                <p><span>Email:</span> {{ $candidatura->candidato->user->email ?? '-' }}</p>
                                <p><span>Área:</span> {{ $candidatura->candidato->area_atuacao ?? '-' }}</p>

                                <p><span>Mãe:</span> {{ $candidatura->candidato->mae ?? '-' }}</p>
                                <p><span>Pai:</span> {{ $candidatura->candidato->pai ?? '-' }}</p>

                            </div>
                        </section>

                        {{-- HISTÓRICO --}}
                        <section class="cand-detalhe-card historico">

                            <h2>Histórico</h2>

                            @forelse($candidatura->historico->sortByDesc('updated_at') as $item)

                            @php
                            $status = strtolower($item->status->status ?? 'pendente');
                            @endphp

                            <div class="cand-historico-item completo">



                                @if($status == 'aprovado')
                                <div class="cand-historico-bolinha aprovado">
                                    <span class="icone check p wt"></span>
                                </div>

                                @elseif($status == 'rejeitado')
                                <div class="cand-historico-bolinha rejeitado">
                                    <span class="icone close p wt"></span>
                                </div>
                                @elseif($status == 'comfirmado')
                                <div class="cand-historico-bolinha aprovado">
                                    <span class="icone check p wt"></span>
                                </div>
                                @elseif($status == 'analizado')
                                <div class="cand-historico-bolinha aprovado">
                                    <span class="icone check p wt"></span>
                                </div>
                                @else
                                <div class="cand-historico-bolinha pedente">
                                    <span class="icone usuario  p wt"></span>
                                </div>
                                @endif



                                <div>

                                    <h3>{{ $item->status->status ?? 'Sem Status' }}</h3>

                                    <small>
                                        {{ $item->created_at?->format('d/m/Y H:i') }}
                                    </small>

                                    <p>
                                        {{ $item->observacao ?? 'Sem observação.' }}
                                    </p>

                                </div>

                            </div>

                            @empty

                            <div class="alert-topo">
                                Nenhum histórico encontrado.
                            </div>

                            @endforelse

                        </section>

                        @if(auth()->user()->tipo_usuario_id == 1)

                        <section class="cand-detalhe-card avaliacao">

                            <h2>Avaliação</h2>

                            @php
                            $ultimoHistorico = $candidatura->historico
                            ->sortByDesc('updated_at')
                            ->first();

                            $status = strtolower(
                            trim($ultimoHistorico->status->status ?? '')
                            );
                            @endphp

                            @if(!in_array($status, ['aprovado', 'rejeitado']))

                            <p class="avaliacao-texto">
                                Selecione o resultado da análise desta candidatura.
                            </p>

                            <div class="cand-avaliacao-acoes">

                                <form action="{{ route('candidaturas.aprovar', $candidatura->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" class="btn-card">
                                        Aprovar
                                    </button>
                                </form>

                                <a href="{{ route('historico.formRejeitar', $candidatura->id) }}"
                                    class="btn-card Vm">
                                    Rejeitar
                                </a>

                            </div>

                            @else

                            <p class="avaliacao-texto">
                                Avaliação realizada.
                            </p>

                            @endif

                        </section>
                        @elseif(auth()->user()->tipo_usuario_id == 2)


                        @endif





                    </div>
                    {{-- DOCUMENTOS --}}





                    <section class="cand-detalhe-card documentos">

                        <h2>Documentos</h2>



                        @php
                        $agora = now();

                        $statusAtual = strtolower($candidatura->status->status ?? 'pendente');

                        $dentroRevisao = $agora->between(
                        $candidatura->edital->data_inicio_rev,
                        $candidatura->edital->data_fim_rev
                        );

                        $podeEditar =
                        auth()->user()->tipo_usuario_id == 2
                        && $statusAtual === 'rejeitado'
                        && $dentroRevisao;
                        @endphp

                        @if($podeEditar)
                        @if(auth()->user()->tipo_usuario_id == 2)

                        <form action="{{ route('candidatura.reset', $candidatura->id) }}"
                            method="POST"
                            onsubmit="return confirm('Deseja reenviar sua candidatura para análise?');">

                            @csrf
                            @method('PUT')

                            <button class="btn-card Br">
                                Atualizar todos os documentos
                            </button>

                        </form>


                        @endif




                        @endif

                        @foreach($candidatura->getAttributes() as $campo => $valor)

                        @if(str_starts_with($campo, 'caminho_') && !empty($valor))

                        @php
                        $documentosEncontrados = true;

                        $titulo = $nomesDocumentos[$campo]
                        ?? ucwords(str_replace(['caminho_', '_'], ['', ' '], $campo));
                        @endphp



                        <div class="cand-documento">

                            <h3>{{ $titulo }}</h3>

                            <div class="cand-documento-row">

                                <span>{{ basename($valor) }}</span>

                                {{-- VISUALIZAR --}}
                                <a href="{{ route('documento.visualizar', [
                        'inscricao' => $candidatura->id,
                        'campo' => $campo
                    ]) }}" target="_blank">
                                    <span class="icone documento m cz"></span>
                                </a>

                                {{-- EDITAR DOCUMENTO --}}
                                @if($podeEditar)

                                <form action="{{ route('documento.editar', [
                            'inscricao' => $candidatura->id,
                            'campo' => $campo
                        ]) }}"
                                    method="POST"
                                    enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')

                                    <input type="file" name="documento" required>


                                </form>

                                @endif

                            </div>

                        </div>

                        @endif

                        @endforeach

                        @if(!$documentosEncontrados)
                        <div class="alert-topo">
                            Nenhum documento enviado.
                        </div>
                        @endif

                    </section>






                </section>




            </section>

        </main>

    </div>

</body>

</html>