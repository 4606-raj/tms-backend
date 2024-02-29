<?php

namespace Database\Seeders;
use App\Models\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('channels')->truncate();
        Channel::create([
            'name' => 'Helpline',
            'status' => '1',
            
        ],
        [
            'name' => 'Email',
            'status' => '1',
            
        ],
        [
            'name' => 'Social Media',
            'status' => '1',
            
        ],
        [
            'name' => 'CM Window',
            'status' => '1',
            
        ],
        [
            'name' => 'CP Grams',
            'status' => '1',
            
        ],
        [
            'name' => 'Grievance Module',
            'status' => '1',
            
        ],
        [
            'name' => 'PSCM Office',
            'status' => '1',
            
        ],
        [
            'name' => 'Through a visit to ADC Office',
            'status' => '1',
            
        ],
        );
    }
}
