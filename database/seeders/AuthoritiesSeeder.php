<?php

namespace Database\Seeders;

use App\Models\Authority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuthoritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Schema::disableForeignKeyConstraints();
        DB::table('authorities')->truncate();
        Schema::enableForeignKeyConstraints();

        $authorities = [ 
        ['name' => 'Admin', 'status' => 1],
        ['name' => 'OPERATOR', 'status' => 1],
        ['name' => 'AGENT', 'status' => 1],
        ['name' => 'PROCESS', 'status' => 1],
        ['name' => 'TECHNICAL', 'status' => 1],
        ['name' => 'DCRIM', 'status' => 1],
        ['name' => 'ZCRIM', 'status' => 1],
        ['name' => 'CHATBOT', 'status' => 1],
        ];
   
    DB::table('authorities')->insert($authorities);
    }
}
