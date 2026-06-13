<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Editais</title>
    <style>
        body{font-family:Arial; padding:20px}
        .card{border:1px solid #ddd; padding:15px; margin:10px 0; border-radius:5px}
        .btn{background:#0d6efd; color:white; padding:8px 15px; text-decoration:none; border-radius:4px; display:inline-block}
        .btn-danger{background:#dc3545}
        .alert{background:#d4edda; color:#155724; padding:10px; border-radius:4px; margin:10px 0}
    </style>
</head>
<body>
    <h1>Gerenciar Editais</h1>
    
    <a href="{{ route('admin.editais.create') }}" class="btn">+ Novo Edital</a>
    
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @forelse($editais as $edital)
        <div class="card">
            <h3>{{ $edital->nome }}</h3>
            <p><strong>Inscrições:</strong> {{ date('d/m/Y', strtotime($edital->data_inicio_inscr)) }} até {{ date('d/m/Y', strtotime($edital->data_fim_inscr)) }}</p>
            <p><strong>Recurso:</strong> {{ date('d/m/Y', strtotime($edital->data_inicio_rev)) }} até {{ date('d/m/Y', strtotime($edital->data_fim_rev)) }}</p>
            <p>{{ Str::limit($edital->descricao, 150) }}</p>
            
            <a href="{{ route('admin.editais.edit', $edital) }}" class="btn">Editar</a>
            
            <form action="{{ route('admin.editais.destroy', $edital) }}" method="POST" style="display:inline">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja remover?')">Remover</button>
            </form>
        </div>
    @empty
        <p>Nenhum edital cadastrado ainda. Clique em "Novo Edital" pra começar.</p>
    @endforelse

</body>
</html>