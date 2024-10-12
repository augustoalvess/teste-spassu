<?php

namespace Tests\Unit;

use App\Domain\Register\Services\AutorService;
use Tests\TestCase;

class AutorUnitTest extends TestCase
{
    /** @test */
    public function create_autor()
    {
        $data = ['codau' => -1, 'nome' => 'Autor de teste'];
        $result = AutorService::insert($data);
        $this->assertTrue($result);
    }

    /** @test */
    public function read_autor()
    {
        $model = AutorService::find(-1);
        $this->assertTrue(!empty($model));
    }

    /** @test */
    public function update_autor()
    {
        $data = ['nome' => 'Autor editado'];
        $result = AutorService::update($data, -1);
        $this->assertTrue($result);
    }

    /** @test */
    public function delete_autor()
    {
        $result = AutorService::delete(-1);
        $this->assertTrue($result);
    }
}
