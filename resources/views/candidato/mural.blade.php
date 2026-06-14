<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mural de Editais</title>
</head>
<body>

<div class="container">
    <h1>Mural de Editais</h1>

    <div class="lista-editais">
        {{-- Início do Loop --}}
        @forelse ($editais as $edital)
            <div class="card-edital" style="border: 1px solid #ccc; margin-bottom: 15px; padding: 15px;">
                {{-- Exibe o título do edital --}}
                <h2>{{ $edital->titulo }}</h2>

                {{-- Exibe o conteúdo/descrição --}}
                <p>{{ $edital->conteudo }}</p>

                {{-- Exibe a data formatada se ela existir --}}
                @if($edital->data_fim)
                    <small>Prazo final: {{ \Carbon\Carbon::parse($edital->data_fim)->format('d/m/Y') }}</small>
                @endif
            </div>
        @empty
            {{-- Caso o banco de dados não tenha nenhum edital cadastrado --}}
            <p>Nenhum edital disponível no mural no momento.</p>
        @endforelse
        {{-- Fim do Loop --}}
    </div>
</div>

</body>
</html>
