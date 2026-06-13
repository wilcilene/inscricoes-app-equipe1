<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Candidaturas</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { display: flex; background-color: #f8f9fa; min-height: 100vh; }
        
        .sidebar { width: 260px; background-color: #4a4a4a; color: #fff; padding: 20px 0; display: flex; flex-direction: column; justify-content: space-between; border-right: 4px solid #0091ff; flex-shrink: 0; }
        .nav-links { display: flex; flex-direction: column; }
        .nav-item { display: flex; align-items: center; padding: 15px 20px; color: #b3b3b3; text-decoration: none; font-size: 15px; transition: 0.2s; }
        .nav-item:hover { color: #fff; }
        .nav-item.active { color: #fff; font-weight: 500; opacity: 1; }
        .nav-item .material-icons-outlined { margin-right: 15px; font-size: 22px; color: #b3b3b3; }
        
        .btn-sair { background-color: #262626; margin: 20px; padding: 12px 20px; border-radius: 12px; text-align: left; color: #fff; text-decoration: none; display: flex; align-items: center; font-size: 15px; }
        .btn-sair .material-icons-outlined { margin-right: 15px; font-size: 22px; }

        .main-content { flex: 1; padding: 40px; display: flex; justify-content: center; align-items: flex-start; }
        .main-wrapper { width: 100%; max-width: 1050px; }

        .header { margin-bottom: 30px; }
        .header h1 { font-size: 42px; font-weight: 700; color: #333333; margin-bottom: 5px; }
        .header p { font-size: 18px; color: #666666; font-weight: 500; }

        .card-panel { background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.03); width: 100%; }

        .table-container { width: 100%; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        
        th { background-color: #c4c4c4; color: #1a1a1a; font-weight: 600; font-size: 16px; padding: 14px 16px; }
        th:first-child { border-top-left-radius: 8px; border-bottom-left-radius: 8px; }
        th:last-child { border-top-right-radius: 8px; border-bottom-right-radius: 8px; }

        td { padding: 14px 16px; color: #2c2c2c; font-size: 15px; font-weight: 500; border-bottom: 1px solid #e0e0e0; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }

        .status-badge { display: inline-block; padding: 6px 16px; border-radius: 8px; font-size: 14px; font-weight: 500; color: #fff; text-align: center; min-width: 100px; }
        .status-badge.pendente { background-color: #7a7a7a; }
        .status-badge.aprovado { background-color: #28a745; }
        .status-badge.rejeitado { background-color: #dc3545; }

        .btn-acao { color: #28a745; text-decoration: none; display: inline-flex; align-items: center; }
        .btn-acao:hover { opacity: 0.8; }

        .table-footer { display: flex; flex-direction: column; align-items: flex-end; margin-top: 25px; gap: 20px; }
        
        .pagination-container { display: flex; align-items: center; gap: 15px; color: #333; font-size: 15px; font-weight: 500; }
        .pagination-btn { border: 1px solid #cccccc; background: white; border-radius: 8px; padding: 6px 10px; display: inline-flex; align-items: center; justify-content: center; cursor: pointer; text-decoration: none; color: #333; }
        .pagination-btn:hover { background: #f0f0f0; }

        .btn-exportar { background-color: #289745; color: white; text-decoration: none; padding: 12px 28px; border-radius: 8px; font-weight: bold; font-size: 14px; text-transform: uppercase; border: none; box-shadow: 0 4px 6px rgba(40, 151, 69, 0.2); cursor: pointer; transition: 0.2s; }
        .btn-exportar:hover { background-color: #217d39; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="nav-links">
            <a href="#" class="nav-item active">
                <span class="material-icons-outlined"></span> 
            </a>
        </div>
        <a href="#" class="btn-sair">
            <span class="material-icons-outlined">logout</span> Sair
        </a>
    </aside>

    <main class="main-content">
        <div class="main-wrapper">
            
            <div class="header">
                <h1>Candidaturas</h1>
                <p>Avaliação dos candidatos</p>
            </div>

            <div class="card-panel">
                <div class="table-container">
                    <table>
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
                            {{-- Simulação dos Dados caso não venham do banco --}}
                            @php
                                $candidaturasSimuladas = [
                                    ['id' => '0001', 'edital' => '01/2024', 'nome' => 'Gabriela Silva', 'data' => '06/02/2023', 'status' => 'Pendente'],
                                    ['id' => '0002', 'edital' => '20/2026', 'nome' => 'Daniela Maria Gonçalves Pedrozo', 'data' => '01/09/2025', 'status' => 'Aprovado'],
                                    ['id' => '0003', 'edital' => '10/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'status' => 'Rejeitado'],
                                    ['id' => '0004', 'edital' => '15/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'status' => 'Pendente'],
                                    ['id' => '0005', 'edital' => '44/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'status' => 'Pendente'],
                                    ['id' => '0006', 'edital' => '44/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'status' => 'Rejeitado'],
                                    ['id' => '0007', 'edital' => '44/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'status' => 'Aprovado'],
                                    ['id' => '0008', 'edital' => '44/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'status' => 'Rejeitado'],
                                    ['id' => '0009', 'edital' => '15/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'status' => 'Pendente'],
                                    ['id' => '0010', 'edital' => '15/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'status' => 'Pendente'],
                                ];
                                
                                // Se o seu Controller já estiver enviando a variável $candidaturas, o Blade usará ela. Caso contrário, usa a simulação acima.
                                $listaCandidaturas = $candidaturas ?? json_decode(json_encode($candidaturasSimuladas));
                            @endphp

                            @foreach($listaCandidaturas as $item)
                            <tr>
                                <td>{{ $item->id ?? $item['id'] }}</td>
                                <td>{{ $item->edital ?? $item['edital'] }}</td>
                                <td>{{ $item->nome ?? $item['nome'] }}</td>
                                <td>{{ $item->data ?? $item['data'] }}</td>
                                <td>
                                    @php 
                                        $status = strtolower($item->status ?? $item['status']); 
                                        $statusMaturado = ($status == 'aprovado') ? 'aprovado' : (($status == 'rejeitado') ? 'rejeitado' : 'pendente');
                                    @endphp
                                    <span class="status-badge {{ $statusMaturado }}">
                                        {{ $item->status ?? $item['status'] }}
                                    </span>
                                </td>
                                <td>
                                    <a href="#" class="btn-acao">
                                        <span class="material-icons-outlined">edit_note</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <div class="pagination-container">
                        <span>1-10 de 50 candidatos</span>
                        <a href="#" class="pagination-btn">
                            <span class="material-icons-outlined">chevron_left</span>
                        </a>
                        <a href="#" class="pagination-btn">
                            <span class="material-icons-outlined">chevron_right</span>
                        </a>
                    </div>
                    
                    <button class="btn-exportar">Exportar (csv)</button>
                </div>
            </div>

        </div>
    </main>

</body>
</html>