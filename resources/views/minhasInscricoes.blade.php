<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Inscrições</title>


<link rel="stylesheet" href="{{ asset('css/style.css') }}?v=18">


</head>
<body>
    <main class="mural-ifc-page">
        <aside class="mural-ifc-sidebar">
            <div class="mural-ifc-logo">
                <img src="{{ asset('icons/IFCfull.svg') }}" alt="Instituto Federal">
            </div>


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

    <section class="mural-ifc-content">
        <header class="mural-ifc-header">
            <div>
                <h1>MINHAS INSCRIÇÕES</h1>
                <p>Acompanhe o status das suas inscrições</p>
            </div>
        </header>

        @if(isset($user))
        <section class="admin-candidate-info" style="max-width:1010px; margin-top:12px; padding:12px; background:#fff; border-radius:8px; box-shadow:0 1px 2px rgba(0,0,0,0.04);">
            <h3 style="margin:0 0 8px 0;">Dados do Candidato</h3>
            <div style="display:flex; gap:20px; flex-wrap:wrap;">
                <div><strong>Nome:</strong> {{ $user->name }}</div>
                <div><strong>Email:</strong> {{ $user->email }}</div>
                @if(isset($perfil) && $perfil)
                    <div><strong>CPF:</strong> {{ $perfil->cpf }}</div>
                    <div><strong>Telefone:</strong> {{ $perfil->telefone }}</div>
                @endif
                @if(isset($endereco) && $endereco)
                    <div><strong>CEP:</strong> {{ $endereco['cep'] ?? '' }}</div>
                    <div><strong>Logradouro:</strong> {{ $endereco['logradouro'] ?? '' }}, {{ $endereco['numero'] ?? '' }}</div>
                    <div><strong>Bairro/Cidade:</strong> {{ $endereco['bairro'] ?? '' }} / {{ $endereco['cidade'] ?? '' }}-{{ $endereco['estado'] ?? '' }}</div>
                    <div><strong>Celular:</strong> {{ $endereco['celular'] ?? '' }}</div>
                @endif
            </div>
        </section>
        @endif

        <section class="admin-cand-card">
        @if(session('success'))
            <div style="max-width:1010px; margin-top:12px; padding:10px; background:#e6ffed; border:1px solid #c7f0d0; color:#0b6b27; border-radius:6px;">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div style="max-width:1010px; margin-top:12px; padding:10px; background:#ffecec; border:1px solid #f1c0c0; color:#8b1a1a; border-radius:6px;">
                {{ session('error') }}
            </div>
        @endif
            <table class="admin-cand-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Edital</th>
                        <th>Descrição</th>
                        <th>Cadastro</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($inscricoes as $insc)
                    <tr>
                        <td>{{ sprintf('%04d', $insc->id) }}</td>
                        <td>{{ $insc->edital_id ?? '-' }}</td>
                        <td>Inscrição #{{ $insc->id }}</td>
                        <td>{{ optional($insc->created_at)->format('d/m/Y') ?? '-' }}</td>
                        <td>
                            <span class="admin-cand-status gray">{{ $insc->situacao ?? 'Pendente' }}</span>
                        </td>
                        <td>
                            <a href="/minhas-inscricoes/{{ $insc->id }}" class="admin-cand-action">☰✎</a>
                            @if($insc->caminho_ficha_inscricao)
                                <a href="{{ route('inscricoes.download', ['id' => $insc->id, 'field' => 'ficha']) }}" style="margin-left:8px;">Ficha</a>
                            @endif
                            @if($insc->caminho_identidade)
                                <a href="{{ route('inscricoes.download', ['id' => $insc->id, 'field' => 'identidade']) }}" style="margin-left:8px;">Identidade</a>
                            @endif
                            @if($insc->caminho_diploma)
                                <a href="{{ route('inscricoes.download', ['id' => $insc->id, 'field' => 'diploma']) }}" style="margin-left:8px;">Diploma</a>
                            @endif
                            @if($insc->caminho_curriculo_lattes)
                                <a href="{{ route('inscricoes.download', ['id' => $insc->id, 'field' => 'curriculo']) }}" style="margin-left:8px;">Currículo</a>
                            @endif
                            @if($insc->caminho_comprovante_eleitoral)
                                <a href="{{ route('inscricoes.download', ['id' => $insc->id, 'field' => 'comprovante']) }}" style="margin-left:8px;">Comprovante</a>
                            @endif
                            @if($insc->caminho_certificado_militar)
                                <a href="{{ route('inscricoes.download', ['id' => $insc->id, 'field' => 'militar']) }}" style="margin-left:8px;">Militar</a>
                            @endif
                            @if($insc->outros_documentos)
                                <a href="{{ route('inscricoes.download', ['id' => $insc->id, 'field' => 'outros']) }}" style="margin-left:8px;">Outros</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;">Nenhuma inscrição encontrada.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </section>

        <div style="max-width: 1010px; display: flex; justify-content: space-between; align-items: center; margin-top: 18px; color: #33383d;">
            <span>1-5 de 5 inscrições</span>

            <div style="display: flex; gap: 8px;">
                <button type="button" style="width: 36px; height: 34px; border: 1px solid #c5c5c5; border-radius: 6px; background: #ffffff; color: #777777;">
                    ‹
                </button>

                <button type="button" style="width: 36px; height: 34px; border: 1px solid #c5c5c5; border-radius: 6px; background: #ffffff; color: #333333;">
                    ›
                </button>
            </div>
        </div>
    </section>
</main>


</body>
</html>

