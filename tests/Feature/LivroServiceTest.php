<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\LivroService;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use stdClass;

class LivroServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $livroService;

    public function setUp(): void
    {
        parent::setUp();
        $this->livroService = app(LivroService::class);
    }

    /** @test */
    public function cadLivro()
    {

        $autores = 'teste';
            
        $assuntos = 'descricao';

        $livroData = new stdClass();

        $livroData = [
            'titulo' => 'Livro Teste',
            'editora' => 'Editora Teste',
            'edicao' => 1,
            'ano_publicacao' => 2023,
            'preco' => '29,99',
            'autores' => $autores,
            'assuntos' => $assuntos,
        ];

        $response = $this->livroService->store($livroData);

        $this->assertInstanceOf(Livro::class, $response);

        // Verifique se o livro foi criado no banco de dados
        $this->assertDatabaseHas('livros', [
            'titulo' => 'Livro Teste',
            'editora' => 'Editora Teste',
            'edicao' => '1ª edição',
            'ano_publicacao' => 2023,
            'valor' => 29.99,
        ]);

        // Verifique se os relacionamentos com autores foram criados
        foreach ($autores as $autor) {
            $this->assertDatabaseHas('livro_autores', [
                'livro_id' => $response->id,
                'autor_id' => $autor->id,
            ]);
        }

        // Verifique se os relacionamentos com assuntos foram criados
        foreach ($assuntos as $assunto) {
            $this->assertDatabaseHas('livro_assuntos', [
                'livro_id' => $response->id,
                'assunto_id' => $assunto->id,
            ]);
        }
    }
}
