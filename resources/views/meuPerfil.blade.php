<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="{{ asset('css/meuPerfil.css') }}">
    <link rel="stylesheet" href="{{ asset('global/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   
</head>
<body>

@include('global.sidebarCandidato')

<div class="layout">

    <main class="pagina">
        <main class="main-content">
            <div class="page-header">
                <h1>MEU PERFIL</h1>
                <p>Altere seus dados para inscrição</p>
            </div>

            @if(session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('perfil.store') }}" method="POST" class="profile-form">
                @csrf
                
                <div class="form-card">
                    <h2>Dados Pessoais</h2>
                    <hr class="form-divider">

                    <div class="form-group full-width">
                        <label for="nome_completo">Nome Completo*:</label>
                        <input type="text" id="nome_completo" name="nome_completo" value="{{ old('nome_completo', $user->name) }}" placeholder="Preencher">
                    </div>

                    <div class="form-grid grid-4">
                        <div class="form-group">
                            <label for="cpf">CPF*:</label>
                            <input type="text" id="cpf" name="cpf" value="{{ old('cpf', $candidato->cpf) }}" placeholder="000.000.000-00">
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento*:</label>
                            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', $candidato->data_nascimento ? $candidato->data_nascimento->format('Y-m-d') : '') }}">
                        </div>
                        <div class="form-group">
                            <label for="genero">Gênero*:</label>
                            <select id="genero" name="genero">
                                <option value="">Selecione</option>
                                <option value="M" {{ old('genero', $candidato->genero) == 'M' ? 'selected' : '' }}>Masculino</option>
                                <option value="F" {{ old('genero', $candidato->genero) == 'F' ? 'selected' : '' }}>Feminino</option>
                                <option value="NB" {{ old('genero', $candidato->genero) == 'NB' ? 'selected' : '' }}>Não Binário</option>
                                <option value="O" {{ old('genero', $candidato->genero) == 'O' ? 'selected' : '' }}>Outro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="naturalidade">Naturalidade (Estado)*:</label>
                            <select id="naturalidade" name="naturalidade">
                                <option value="">Selecione</option>
                                @php
                                    $estados = [
                                        'AC' => 'Acre', 'AL' => 'Alagoas', 'AP' => 'Amapá', 'AM' => 'Amazonas', 
                                        'BA' => 'Bahia', 'CE' => 'Ceará', 'DF' => 'Distrito Federal', 'ES' => 'Espírito Santo', 
                                        'GO' => 'Goiás', 'MA' => 'Maranhão', 'MT' => 'Mato Grosso', 'MS' => 'Mato Grosso do Sul', 
                                        'MG' => 'Minas Gerais', 'PA' => 'Pará', 'PB' => 'Paraíba', 'PR' => 'Paraná', 
                                        'PE' => 'Pernambuco', 'PI' => 'Piauí', 'RJ' => 'Rio de Janeiro', 'RN' => 'Rio Grande do Norte', 
                                        'RS' => 'Rio Grande do Sul', 'RO' => 'Rondônia', 'RR' => 'Roraima', 'SC' => 'Santa Catarina', 
                                        'SP' => 'São Paulo', 'SE' => 'Sergipe', 'TO' => 'Tocantins'
                                    ];
                                @endphp

                                @foreach($estados as $sigla => $nome)
                                    <option value="{{ $sigla }}" {{ old('naturalidade', $candidato->estado) == $sigla ? 'selected' : '' }}>
                                        {{ $nome }} ({{ $sigla }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-grid grid-2">
                        <div class="form-group">
                            <label for="mae">Mãe*:</label>
                            <input type="text" id="mae" name="mae" value="{{ old('mae', $candidato->mae) }}" placeholder="Preencher">
                        </div>
                        <div class="form-group">
                            <label for="pai">Pai:</label>
                            <input type="text" id="pai" name="pai" value="{{ old('pai', $candidato->pai) }}" placeholder="Preencher">
                        </div>
                    </div>

                    <div class="form-group full-width style-atuacao">
                        <label for="area_atuacao">Área Profissional de Atuação do Candidato*:</label>
                        <input type="text" id="area_atuacao" name="area_atuacao" value="{{ old('area_atuacao', $candidato->area_atuacao) }}" placeholder="Preencher">
                    </div>
                </div>

                <div class="form-card">
                    <h2>Endereço e Contato</h2>
                    <hr class="form-divider">

                    <div class="form-grid grid-address">
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" id="cep" name="cep" value="{{ old('cep', $endereco->cep) }}" placeholder="00.000-000">
                        </div>
                        <div class="form-group item-logradouro">
                            <label for="logradouro">Logradouro:</label>
                            <input type="text" id="logradouro" name="logradouro" value="{{ old('logradouro', $endereco->logradouro) }}" placeholder="Preencher">
                        </div>
                    </div>

                    <div class="form-grid grid-3">
                        <div class="form-group">
                            <label for="numero">Número:</label>
                            <input type="text" id="numero" name="numero" value="{{ old('numero', $endereco->numero_end) }}" placeholder="00000">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" id="complemento" name="complemento" value="{{ old('complemento', $endereco->complemento) }}" placeholder="Preencher">
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" id="bairro" name="bairro" value="{{ old('bairro', $endereco->bairro) }}" placeholder="Preencher">
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-salvar">Salvar Alterações</button>
                </div>
            </form>
        </main>
    </div>

</body>
</html>