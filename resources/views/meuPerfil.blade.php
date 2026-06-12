<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - IFC</title>
	<link rel="stylesheet" href="{{ asset('css/meuPerfil.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="layout-container">
        
        <aside class="sidebar">
            <div class="logo-container">
                <div class="logo-img-wrapper">
                    <img src="{{ asset('icons/IFCfull.svg') }}" alt="Logo Instituto Federal" class="if-logo-img">
                </div>
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li class="{{ ($activePage ?? '') === 'inicio' ? 'active' : '' }}"><a href="/"><i class="fa-solid fa-house"></i> Início</a></li>
                    <li class="{{ ($activePage ?? '') === 'perfil' ? 'active' : '' }}"><a href="/perfil"><i class="fa-solid fa-user"></i> Meu perfil</a></li>
                    <li class="{{ ($activePage ?? '') === 'inscricoes' ? 'active' : '' }}"><a href="#"><i class="fa-solid fa-id-card-clip"></i> Minhas Inscrições</a></li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <a href="#" class="btn-sair">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Sair
                </a>
            </div>
        </aside>

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

            <form action="{{ route('perfil.store') }}" method="POST" class="profile-form">
                @csrf
                
                <div class="form-card">
                    <h2>Dados Pessoais</h2>
                    <hr class="form-divider">

                    <div class="form-group full-width">
                        <label for="nome_completo">Nome Completo*:</label>
                        <input type="text" id="nome_completo" name="nome_completo" value="{{ old('nome_completo', $perfil->nome_completo) }}" placeholder="Preencher">
                    </div>

                    <div class="form-group full-width">
                        <label for="nome_social">Nome Social (se houver):</label>
                        <input type="text" id="nome_social" name="nome_social" value="{{ old('nome_social', $perfil->nome_social) }}" placeholder="Preencher">
                    </div>

                    <div class="form-grid grid-4">
                        <div class="form-group">
                            <label for="cpf">CPF*:</label>
                            <input type="text" id="cpf" name="cpf" value="{{ old('cpf', $perfil->cpf) }}" placeholder="000.000.000-00">
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento*:</label>
                            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', $perfil->data_nascimento) }}">
                        </div>
                        <div class="form-group">
                            <label for="genero">Gênero*:</label>
                            <select id="genero" name="genero">
                                <option value="">Selecione</option>
                                <option value="Masculino" {{ old('genero', $perfil->genero) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Feminino" {{ old('genero', $perfil->genero) == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                                <option value="Outro" {{ old('genero', $perfil->genero) == 'Outro' ? 'selected' : '' }}>Outro</option>
                            </select>
                        </div>
                       <div class="form-group">
    <label for="naturalidade">Naturalidade*:</label>
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
            <option value="{{ $sigla }}" {{ old('naturalidade', $perfil->naturalidade) == $sigla ? 'selected' : '' }}>
                {{ $nome }} ({{ $sigla }})
            </option>
        @endforeach
    </select>
</div>
                    </div>

                    <div class="form-grid grid-2">
                        <div class="form-group">
                            <label for="mae">Mãe*:</label>
                            <input type="text" id="mae" name="mae" value="{{ old('mae', $perfil->mae) }}" placeholder="Preencher">
                        </div>
                        <div class="form-group">
                            <label for="pai">Pai:</label>
                            <input type="text" id="pai" name="pai" value="{{ old('pai', $perfil->pai) }}" placeholder="Preencher">
                        </div>
                    </div>

                    <div class="form-group full-width style-atuacao">
                        <label for="area_atuacao">Área Profissional de Atuação do Candidato*:</label>
                        <input type="text" id="area_atuacao" name="area_atuacao" value="{{ old('area_atuacao', $perfil->area_atuacao) }}" placeholder="Preencher">
                    </div>
                </div>

                <div class="form-card">
                    <h2>Endereço e Contato</h2>
                    <hr class="form-divider">

                    <div class="form-grid grid-address">
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" id="cep" name="cep" value="{{ old('cep', $perfil->cep) }}" placeholder="00.000-000">
                        </div>
                        <div class="form-group item-logradouro">
                            <label for="logradouro">Logradouro:</label>
                            <input type="text" id="logradouro" name="logradouro" value="{{ old('logradouro', $perfil->logradouro) }}" placeholder="Preencher">
                        </div>
                    </div>

                    <div class="form-grid grid-3">
                        <div class="form-group">
                            <label for="numero">Número:</label>
                            <input type="text" id="numero" name="numero" value="{{ old('numero', $perfil->numero) }}" placeholder="00000">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" id="complemento" name="complemento" value="{{ old('complemento', $perfil->complemento) }}" placeholder="Preencher">
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" id="bairro" name="bairro" value="{{ old('bairro', $perfil->bairro) }}" placeholder="Preencher">
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