<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MetaSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // meta site seeder
        DB::table('meta_site')->insert([
            'meta_title' => 'Atresna Creative Indonesia',
            'meta_description' => 'Total Solution For Your Digital Company',
            'meta_keyword' => 'Web Development, Web Master, Laravel Developer, Design Web, PHP Developer ',
        ]);
    }
}
