<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Inscrições - IFC</title>
    
    @vite(['resources/css/style.css', 'public/css/minhasInscricoes.css'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="layout-container">
        
        <aside class="sidebar">
            
            <div class="logo-container" style="padding: 30px 24px; text-align: center; display: flex; justify-content: center; align-items: center;">
                <div class="logo-img-wrapper" style="width: 100%; max-width: 200px;">
                    <img src="{{ asset('icons/IFCfull.svg') }}" alt="Logo Instituto Federal" class="if-logo-img" style="width: 100%; height: auto; object-fit: contain;">
                </div>
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-house"></i> Início
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-user"></i> Meu perfil
                        </a>
                    </li>
                    <li class="{{ $activePage === 'inscricoes' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa-solid fa-address-card"></i> Minhas Inscrições
                        </a>
                    </li>
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
                <h1>MINHAS INSCRIÇÕES</h1>
                <p>Acompanhe o status da sua inscrição</p>
            </div>

            <div class="table-card">
                <table class="tabela-inscricoes">
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
                        @foreach($inscricoes as $inscricao)
                            <tr>
                                <td>{{ $inscricao['id'] }}</td>
                                <td>{{ $inscricao['edital'] }}</td>
                                <td>{{ $inscricao['descricao'] }}</td>
                                <td>{{ $inscricao['cadastro'] }}</td>
                                <td>
                                    <span class="badge badge-{{ $inscricao['classe'] }}">
                                        {{ $inscricao['situacao'] }}
                                    </span>
                                </td>
                                <td>
                                    <a href="#" class="btn-acao-editar">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="table-pagination">
                    <span>1-10 de 12 Editais</span>
                    <div class="pagination-buttons">
                        <button class="btn-pag" disabled><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="btn-pag"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>

        </main>

    </div>

</body>
</html>