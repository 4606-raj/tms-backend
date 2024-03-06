<?php

namespace Database\Seeders;
use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sources')->truncate();
        $source = [
        [
            'name' => 'Citizen',
            'status' => '1',
            
        ],
        [
            'name' => 'PPP Operator',
            'status' => '1',
            
        ],
        [
            'name' => 'Department',
            'status' => '1',
            
        ],
        [
            'name' => 'DCRIM',
            'status' => '1',
            
        ],
    ];
    DB::table('sources')->insert($source);
    }
}
