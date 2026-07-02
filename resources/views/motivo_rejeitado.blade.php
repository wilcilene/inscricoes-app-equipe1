<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Motivo da Rejeição</title>

    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @include('global.sidebarAdmin')
</head>

<body>

    <div class="layout">

        <main class="pagina">

            <h1 class="titulo">
                Motivo da Rejeição
            </h1>

            <p class="subtitulo">
                Informe o motivo da rejeição da candidatura.
            </p>

            @if(session('success'))
            <div class="alert-topo sucesso">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert-topo">
                {{ $errors->first() }}
            </div>
            @endif

            <section class="painel">



                <form
                    action="{{ route('historico.rejeitar', $candidatura->id) }}"
                    method="POST"
                    class="formulario">

                    @csrf

                    <textarea
                        name="motivo"
                        required
                        placeholder="Descreva o motivo da rejeição"></textarea>

                    <div class="flex gap-15 mt-20">
                        <button type="submit" class="btn-card">
                            Salvar
                        </button>

                        <a
                            href="{{ route('candidaturas.detalhe', $candidatura->id) }}"
                            class="btn-card Vm">
                            Cancelar
                        </a>
                    </div>
                </form>

            </section>

        </main>

    </div>

</body>

</html>