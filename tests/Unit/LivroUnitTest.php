<?php

namespace Tests\Unit;

use App\Domain\Register\Services\LivroService;
use Tests\TestCase;

class LivroUnitTest extends TestCase
{
    /** @test */
    public function create_livro()
    {
        $data = [
            'codl' => -1, 
            'titulo' => 'Livro de teste', 
            'editora' => 'Editora de teste',
            'edicao' => 12345,
            'anopublicacao' => '2024',
            'valor' => 50.00
        ];
        $result = LivroService::insert($data);
        $this->assertTrue($result);
    }

    /** @test */
    public function read_livro()
    {
        $assunto = LivroService::find(-1);
        $this->assertTrue(!empty($assunto));
    }

    /** @test */
    public function update_livro()
    {
        $data = ['titulo' => 'Livro editado'];
        $result = LivroService::update($data, -1);
        $this->assertTrue($result);
    }

    /** @test */
    public function delete_livro()
    {
        $result = LivroService::delete(-1);
        $this->assertTrue($result);
    }
}
