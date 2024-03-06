<?php

namespace Database\Seeders;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->truncate();
        $districts = [
        [
            'name' => 'AMBALA',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'BHIWANI',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'CHARKHI-DADRI',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'FARIDABAD',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'FATEHABAD',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'GURUGRAM',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'HISAR',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'JHAJJAR',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'JIND',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'KAITHAL',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'KARNAL',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'KURUKSHETRA',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'MAHENDERGARH',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'NUH',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'PALWAL',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'PANCHKULA',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'PANIPAT',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'REWARI',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'ROHTAK',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'SIRSA',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'SONIPAT',
            'state_id' => 13,
            'status' => '1',
            
        ],
        [
            'name' => 'YAMUNANAGAR',
            'state_id' => 13,
            'status' => '1',
            
        ],

    ];
    DB::table('districts')->insert($districts);
    }
}
