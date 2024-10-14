<?php

namespace Tests\Feature;

use Tests\TestCase;

class RelatorioTest extends TestCase
{
    /** @test */
    public function generate_relatorio()
    {
        $response = $this->post('/relatorios/generate');
        $response->assertStatus(200);
    }
}
