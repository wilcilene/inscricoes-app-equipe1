<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Edital</title>
    <style>
        body{font-family:Arial; padding:20px; max-width:600px}
        label{display:block; margin-top:15px; font-weight:bold}
        input, textarea{width:100%; padding:8px; margin-top:5px; border:1px solid #ccc; border-radius:4px}
        .btn{background:#0d6efd; color:white; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; margin-top:15px}
        .error{color:#dc3545; font-size:12px}
    </style>
</head>
<body>
    <h1>Editar Edital</h1>
    
    <form action="{{ route('admin.editais.update', $edital) }}" method="POST">
    @csrf
    @method('PUT')

        <label>Nome do Edital:</label>
        <input type="text" name="nome" value="{{ old('nome', $edital->nome) }}" required>
        @error('nome') <div class="error">{{ $message }}</div> @enderror

        <label>Descrição:</label>
        <textarea name="descricao" rows="5" required>{{ old('descricao', $edital->descricao) }}</textarea>
        @error('descricao') <div class="error">{{ $message }}</div> @enderror

        <label>Data Início Inscrição:</label>
        <input type="date" name="data_inicio_inscr" value="{{ old('data_inicio_inscr', $edital->data_inicio_inscr) }}" required>

        <label>Data Fim Inscrição:</label>
        <input type="date" name="data_fim_inscr" value="{{ old('data_fim_inscr', $edital->data_fim_inscr) }}" required>

        <label>Data Início Recurso:</label>
        <input type="date" name="data_inicio_rev" value="{{ old('data_inicio_rev', $edital->data_inicio_rev) }}" required>

        <label>Data Fim Recurso:</label>
        <input type="date" name="data_fim_rev" value="{{ old('data_fim_rev', $edital->data_fim_rev) }}" required>

        <button type="submit" class="btn">Atualizar Edital</button>
        <a href="{{ route('admin.editais.index') }}" style="margin-left:10px">Cancelar</a>
    </form>

</body>
</html>