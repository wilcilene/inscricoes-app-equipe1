<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Edital;
use App\Models\Inscricao;
use App\Models\HistoricoStatus;
use App\Models\Status;

class IniciarPeriodoRevisao extends Command
{
    /**
     * Nome do comando.
     */
    protected $signature = 'revisao:iniciar';

    /**
     * Descrição do comando.
     */
    protected $description = 'Inicia automaticamente o período de revisão dos editais';

    /**
     * Executa o comando.
     */
    public function handle()
    {
        $hoje = Carbon::today();

        $statusConfirmado = Status::whereRaw('LOWER(status) = ?', ['comfirmado'])
            ->orWhereRaw('LOWER(status) = ?', ['confirmado'])
            ->first();

        $statusPendente = Status::whereRaw('LOWER(status) = ?', ['pendente'])
            ->first();

        if (!$statusConfirmado) {
            $this->error('Status "Comfirmado/Confirmado" não encontrado.');
            return Command::FAILURE;
        }

        if (!$statusPendente) {
            $this->error('Status "Pendente" não encontrado.');
            return Command::FAILURE;
        }

        $editais = Edital::whereDate('data_inicio_rev', $hoje)->get();

        if ($editais->isEmpty()) {
            $this->info('Nenhum edital inicia revisão hoje.');
            return Command::SUCCESS;
        }

        $totalAtualizadas = 0;

        foreach ($editais as $edital) {

            $inscricoes = Inscricao::where('edital_id', $edital->id)
                ->where('status_id', $statusConfirmado->id)
                ->get();

            foreach ($inscricoes as $inscricao) {

                $inscricao->status_id = $statusPendente->id;
                $inscricao->save();

                HistoricoStatus::create([
                    'inscricao_id' => $inscricao->id,
                    'status_id' => $statusPendente->id,
                    'observacao' => 'Status alterado automaticamente para pendente no início do período de revisão.',
                ]);

                $totalAtualizadas++;
            }
        }

        $this->info("{$totalAtualizadas} inscrição(ões) atualizada(s) para Pendente.");

        return Command::SUCCESS;
    }
}