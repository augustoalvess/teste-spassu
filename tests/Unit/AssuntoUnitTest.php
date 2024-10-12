<?php

namespace Tests\Unit;

use App\Domain\Register\Services\AssuntoService;
use Tests\TestCase;

class AssuntoUnitTest extends TestCase
{
    /** @test */
    public function create_assunto()
    {
        $data = ['codas' => -1, 'descricao' => 'Assunto de teste'];
        $result = AssuntoService::insert($data);
        $this->assertTrue($result);
    }

    /** @test */
    public function read_assunto()
    {
        $assunto = AssuntoService::find(-1);
        $this->assertTrue(!empty($assunto));
    }

    /** @test */
    public function update_assunto()
    {
        $data = ['descricao' => 'Assunto editado'];
        $result = AssuntoService::update($data, -1);
        $this->assertTrue($result);
    }

    /** @test */
    public function delete_assunto()
    {
        $result = AssuntoService::delete(-1);
        $this->assertTrue($result);
    }
}
