<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Candidato;
use App\Models\Edital;
use App\Models\Inscricao;
use App\Models\TipoUsuario;

class InscricaoUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_upload_inscricao_and_prevent_duplicate()
    {
        Storage::fake('public');

        $tipoUsuario = TipoUsuario::create([
            'tipo_usuario' => 'candidato',
        ]);

        $user = User::factory()->create([
            'tipo_usuario_id' => $tipoUsuario->id,
        ]);

        $edital = Edital::create([
            'nome' => 'Edital de Teste',
            'descricao' => 'Edital para testes',
            'data_inicio_inscr' => '2026-01-01',
            'data_fim_inscr' => '2026-12-31',
            'data_inicio_rev' => '2027-01-01',
            'data_fim_rev' => '2027-01-31',
        ]);

        // criar candidato vinculado ao user (usar campos mínimos exigidos pela migration)
        $candidato = Candidato::create([
            'cpf' => '00000000000',
            'data_nascimento' => '1990-01-01',
            'usuer_id' => $user->id,
            'mae' => 'Mae Teste',
            'pai' => 'Pai Teste',
            'area_atuacao' => 'Teste',
            'genero' => 'O',
            'estado' => 'MG',
        ]);

        $ficha = UploadedFile::fake()->create('ficha.pdf', 100, 'application/pdf');
        $doc = UploadedFile::fake()->create('doc.pdf', 100, 'application/pdf');

        $response = $this->actingAs($user)->post(route('candidato.inscricao.enviar'), [
            'vaga' => 'Vaga Teste',
            'edital_id' => 1,
            'ficha_inscricao' => $ficha,
            'documento_habilitacao' => $doc,
        ]);

        $response->assertSessionHas('success');

        $insc = Inscricao::first();
        $this->assertNotNull($insc);
        $this->assertEquals($candidato->id, $insc->candidato_id);

        // arquivos gravados
        Storage::disk('public')->assertExists($insc->caminho_ficha_inscricao);
        Storage::disk('public')->assertExists($insc->caminho_identidade ?? $insc->caminho_diploma);

        // tentativa de duplicar para o mesmo edital deve retornar erro
        $response2 = $this->actingAs($user)->post(route('candidato.inscricao.enviar'), [
            'vaga' => 'Vaga Teste',
            'edital_id' => 1,
            'ficha_inscricao' => $ficha,
            'documento_habilitacao' => $doc,
        ]);

        $response2->assertSessionHas('error');
    }
}
