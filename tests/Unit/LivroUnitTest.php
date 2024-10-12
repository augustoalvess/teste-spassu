<?php

namespace Tests\Unit;

use App\Domain\Register\Services\AssuntoService;
use App\Domain\Register\Services\AutorService;
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
    public function create_livro_autores() {
        AutorService::insert(['codau' => -1, 'nome' => 'Autor de teste 1']);
        AutorService::insert(['codau' => -2, 'nome' => 'Autor de teste 2']);
        $data = ['autores' => [
            ['id' => -1, 'autor_codau' => -1],
            ['id' => -2, 'autor_codau' => -2]
        ]];
        $model = LivroService::find(-1);
        $result = LivroService::insertLivroAutores($data, $model);
        $this->assertTrue($result);
    }

    /** @test */
    public function create_livro_assuntos() {
        AssuntoService::insert(['codas' => -1, 'descricao' => 'Assunto de teste 1']);
        AssuntoService::insert(['codas' => -2, 'descricao' => 'Assunto de teste 2']);
        $data = ['autores' => [
            ['id' => -1, 'assunto_codas' => -1],
            ['id' => -2, 'assunto_codas' => -2]
        ]];
        $model = LivroService::find(-1);
        $result = LivroService::insertLivroAssuntos($data, $model);
        $this->assertTrue($result);
    }

    /** @test */
    public function read_livro()
    {
        $model = LivroService::find(-1);
        $this->assertTrue(!empty($model));
    }

    /** @test */
    public function update_livro()
    {
        $data = ['titulo' => 'Livro editado'];
        $result = LivroService::update($data, -1);
        $this->assertTrue($result);
    }

    /** @test */
    public function update_livro_autores() {
        $data = ['autores' => [
            ['id' => -1, 'autor_codau' => -2]
        ]];
        $model = LivroService::find(-1);
        $result = LivroService::updateLivroAutores($data, $model);
        $this->assertTrue($result);

    }

    /** @test */
    public function update_livro_assuntos() {
        $data = ['assuntos' => [
            ['id' => -1, 'assunto_codas' => -2]
        ]];
        $model = LivroService::find(-1);
        $result = LivroService::updateLivroAssuntos($data, $model);
        $this->assertTrue($result);
    }

    /** @test */
    public function delete_livro()
    {
        $result = LivroService::delete(-1);
        AutorService::delete(-1);
        AutorService::delete(-2);
        AssuntoService::delete(-1);
        AssuntoService::delete(-2);
        $this->assertTrue($result);
    }
}
