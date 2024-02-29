<?php

namespace Database\Seeders;
use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sources')->truncate();
        Source::create([
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
        );
 
    }
}
