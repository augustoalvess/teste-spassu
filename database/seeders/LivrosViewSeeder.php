<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivrosViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DROP VIEW IF EXISTS livros_view");
        DB::statement("
            CREATE OR REPLACE VIEW livros_view AS (
                
            )
        ");        
    }
}
