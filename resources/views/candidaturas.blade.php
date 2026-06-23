<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demonstração CSS Global</title>


    <link rel="stylesheet" href="{{ asset('global/style.css') }}">

    @if(auth()->user()->tipo_usuario_id == 1)
    @include('global.sidebarAdmin')

    @elseif(auth()->user()->tipo_usuario_id == 2)
    @include('global.sidebarCandidato')

    @endif

</head>

<body>

    <div class="layout">


        <!-- CONTEÚDO -->

        <main class="pagina">

            <h1 class="titulo">Demonstração CSS Global</h1>
            <p class="subtitulo">
                Página para testar componentes, ícones, botões, formulários e utilitários.
            </p>




            <!-- TABELA -->

            <section class="mt-20">

                <div class="tabela-container">

                    <table class="tabela">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Edital</th>
                                <th>Nome Completo</th>
                                <th>Cadastro</th>
                                <th>Situação</th>
                                <th>Ação</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($inscricoes as $item)

                            <tr>

                                <td>
                                    {{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}
                                </td>

                                <td>
                                    {{ $item->edital->nome }}
                                </td>

                                <td>
                                    {{ $item->candidato->user->name ?? 'Sem nome' }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </td>

                                <td>

                                    @if($item->status?->status == 'Aprovado')
                                    <span class="status status-ativo">Aprovado</span>

                                    @elseif( $item->status?->status  == 'Rejeitado')
                                    <span class="status status-rejeitado">Rejeitado</span>

                                    @else
                                    <span class="status status-pendente">Pendente</span>
                                    @endif

                                </td>

                                <td>

                                    <div class="tabela-acoes">


                                        <a href="{{ route('candidaturas.detalhe', $item->id) }}">
                                            <i class="icone editar vd"></i>
                                        </a>

                                    </div>

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                    <div class="rodape-tabela flex-between">

    <span class="tcz">

        {{ $inscricoes->firstItem() }}
        -
        {{ $inscricoes->lastItem() }}
        de
        {{ $inscricoes->total() }}
        candidatos

    </span>

    <div class="flex gap-10">

        @if($inscricoes->onFirstPage())

            

        @else

            <a
                href="{{ $inscricoes->previousPageUrl() }}"
                class="btn-card Br"
            >
                <i
                    class="icone setaBaixo cz"
                    style="transform:rotate(90deg)"
                ></i>
            </a>

        @endif

        @if($inscricoes->hasMorePages())

            <a
                href="{{ $inscricoes->nextPageUrl() }}"
                class="btn-card Br"
            >
                <i
                    class="icone setaBaixo cz"
                    style="transform:rotate(-90deg)"
                ></i>
            </a>

        @else

            <button class="btn-card Br" disabled>
                <i
                    class="icone setaBaixo cz"
                    style="transform:rotate(-90deg)"
                ></i>
            </button>

        @endif

        <a
            href="{{ route('candidaturas.exportar') }}"
            class="btn-card"
        >
            EXPORTAR (csv)
        </a>

    </div>

</div>
                </div>

            </section>


        </main>


    </div>

</body>

</html>