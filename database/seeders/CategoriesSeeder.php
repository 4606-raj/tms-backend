<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();

        $categories = [
        [ 'name' => 'Management','cat_id' => 0,'status' => 1],
        ['name' => 'Technical','cat_id' => 0,'status' => 1],
        ['name' => 'Aayushman Card','cat_id' => 1,'status' => 1],
        ['name' => 'Add Related','cat_id' => 1,'status' => 1 ],
        ['name' => 'Bank Account And IFSCn','cat_id' => 1,'status' => 1],
        ['name' => 'CasteCategory','cat_id' => 1,'status' => 1],
        ['name' => 'Change of HOF','cat_id' => 1,'status' => 1],
        ['name' => 'Covid Related','cat_id' => 1,'status' => 1],
        ['name' => 'Delete Related','cat_id' => 1,'status' => 1 ],
        ['name' => 'DOB','cat_id' => 1,'status' => 1],
        ['name' => 'Engagement','cat_id' => 1,'status' => 1],
        ['name' => 'Exclusion','cat_id' => 1,'status' => 1],
        ['name' => 'Family address related','cat_id' => 1,'status' => 1],
        ['name' => 'Gender','cat_id' => 1,'status' => 1],
        ['name' => 'Income Related','cat_id' => 1,'status' => 1],
        ['name' => 'IsDivyang','cat_id' => 1,'status' => 1],
        ['name' => 'Marital Status','cat_id' => 1,'status' => 1],
        ['name' => 'Mark as Alive','cat_id' => 1,'status' => 1],
        ['name' => 'Mark as Dead','cat_id' => 1,'status' => 1],
        ['name' => 'Member Merge to other state related','cat_id' => 1,'status' => 1],
        ['name' => 'Merge Family Related','cat_id' => 1,'status' => 1],
        ['name' => 'Mobile No','cat_id' => 1,'status' => 1],
        ['name' => 'Name','cat_id' => 1,'status' => 1],
        ['name' => 'Operator ID related','cat_id' => 1,'status' => 1],
        ['name' => 'Others','cat_id' => 1,'status' => 1],
        [ 'name' => 'PAN Card No','cat_id' => 1,'status' => 1],
        ['name' => 'Pension Related','cat_id' => 1, 'status' => 1],
        [
            'name' => 'PPP ID creation/Updation related',
            'cat_id' => 1,
            'status' => 1
        ],
        [
            'name' => 'Qualification',
            'cat_id' => 1,
            'status' => 1
        ],
        [
            'name' => 'Ration Card',
            'cat_id' => 1,
            'status' => 1
        ],
        [
            'name' => 'Residing in Haryana Since',
            'cat_id' => 1,
            'status' => 1
        ],
        [
            'name' => 'Single Member Family Related',
            'cat_id' => 1,
            'status' => 1
        ],
        [
            'name' => 'Split Option Related',
            'cat_id' => 1,
            'status' => 1
        ],
        [
            'name' => 'VoterID No',
            'cat_id' => 1,
            'status' => 1
        ],
        [
            'name' => 'Aayushman Card',
            'cat_id' => 3,
            'status' => 1
        ],
        [
            'name' => 'Add Related',
            'cat_id' => 4,
            'status' => 1
        ],
        [
            'name' => 'Unwanted Member Add',
            'cat_id' => 4,
            'status' => 1
        ],
        [
            'name' => 'Bank Account And IFSC',
            'cat_id' => 5,
            'status' => 1
        ],
        [
            'name' => 'bank account And IFSC code',
            'cat_id' => 5,
            'status' => 1
        ],
        [
            'name' => 'Incorrect verified',
            'cat_id' => 6,
            'status' => 1
        ],
        [
            'name' => 'Not verified',
            'cat_id' => 6,
            'status' => 1
        ],
        [
            'name' => 'Verified',
            'cat_id' => 6,
            'status' => 1
        ],
        [
            'name' => 'Change',
            'cat_id' => 7,
            'status' => 1
        ],
        [
            'name' => 'Incorrect HOF',
            'cat_id' => 7,
            'status' => 1
        ],
        [
            'name' => 'Covid Related',
            'cat_id' => 8,
            'status' => 1
        ],
        [
            'name' => 'Appointment issue',
            'cat_id' => 9,
            'status' => 1
        ],
        [
            'name' => 'Not received confirmation mail',
            'cat_id' => 9,
            'status' => 1
        ],
        [
            'name' => 'Not received OTP',
            'cat_id' => 9,
            'status' => 1
        ],
        [
            'name' => 'Payment issue',
            'cat_id' => 9,
            'status' => 1
        ],
        [
            'name' => 'Rejection reason for Marriage certificate',
            'cat_id' => 9,
            'status' => 1
        ],
        [
            'name' => 'Status of Marriage certificate',
            'cat_id' => 9,
            'status' => 1
        ],
        [
            'name' => 'Vivah Shagun Yojna Related',
            'cat_id' => 9,
            'status' => 1
        ],
        [
            'name' => 'Delete Related',
            'cat_id' => 10,
            'status' => 1
        ],
        [
            'name' => 'Change',
            'cat_id' => 11,
            'status' => 1
        ],
        [
            'name' => 'Incorrect mentioned',
            'cat_id' => 11,
            'status' => 1
        ],
        [
            'name' => 'Change',
            'cat_id' => 12,
            'status' => 1
        ],
        [
            'name' => 'Incorrect occupation',
            'cat_id' => 12,
            'status' => 1
        ],
        [
            'name' => 'Area Exclusion',
            'cat_id' => 13,
            'status' => 1
        ],
        [
            'name' => 'CBDT',
            'cat_id' => 13,
            'status' => 1
        ],
        [
            'name' => 'Electricity',
            'cat_id' => 13,
            'status' => 1
        ],
        [
            'name' => 'Private Sector Employees Exclusion',
            'cat_id' => 13,
            'status' => 1
        ],
        [
            'name' => 'change',
            'cat_id' => 14,
            'status' => 1
        ],
        [
            'name' => 'Incorrect mentioned',
            'cat_id' => 14,
            'status' => 1
        ],
        [
            'name' => 'Gender',
            'cat_id' => 15,
            'status' => 1
        ],
        [
            'name' => 'Income Verified status',
            'cat_id' => 16,
            'status' => 1
        ],
        [
            'name' => 'Incorrect verified',
            'cat_id' => 16,
            'status' => 1
        ],
        [
            'name' => 'Not verified',
            'cat_id' => 16,
            'status' => 1
        ],
        [
            'name' => 'Change',
            'cat_id' => 17,
            'status' => 1
        ],
        [
            'name' => 'Incorrect IsDivyang',
            'cat_id' => 17,
            'status' => 1
        ],
        [
            'name' => 'Change',
            'cat_id' => 18,
            'status' => 1
        ],
        [
            'name' => 'Incorerct Marital Status',
            'cat_id' => 18,
            'status' => 1
        ],
        [
            'name' => 'Mark as Alive',
            'cat_id' => 19,
            'status' => 1
        ],
        [
            'name' => 'Incorrect',
            'cat_id' => 20,
            'status' => 1
        ],
        [
            'name' => 'Mark as Dead',
            'cat_id' => 20,
            'status' => 1
        ],
        [
            'name' => 'Member Merge to other state',
            'cat_id' => 21,
            'status' => 1
        ],
        [
            'name' => 'Merge',
            'cat_id' => 22,
            'status' => 1
        ],
        [
            'name' => 'Unmerge',
            'cat_id' => 22,
            'status' => 1
        ],
        [
            'name' => 'Mobile No',
            'cat_id' => 23,
            'status' => 1
        ],
        [
            'name' => 'Change',
            'cat_id' => 24,
            'status' => 1
        ],
        [
            'name' => 'Spelling Mistake',
            'cat_id' => 24,
            'status' => 1
        ],
        [
            'name' => 'Operator ID related',
            'cat_id' => 25,
            'status' => 1
        ],
        [
            'name' => 'Others',
            'cat_id' => 26,
            'status' => 1
        ],
        [
            'name' => 'PAN Card No',
            'cat_id' => 27,
            'status' => 1
        ],
        [
            'name' => 'Not received pension',
            'cat_id' => 28,
            'status' => 1
        ],
        [
            'name' => 'old age Pension status',
            'cat_id' => 28,
            'status' => 1
        ],
        [
            'name' => 'Widow/Isdivyang pension applied issue',
            'cat_id' => 28,
            'status' => 1
        ],
        [
            'name' => 'All ready exist',
            'cat_id' => 29,
            'status' => 1
        ],
        [
            'name' => 'details not show',
            'cat_id' => 29,
            'status' => 1
        ],
        [
            'name' => 'File not submit',
            'cat_id' => 29,
            'status' => 1
        ],
        [
            'name' => 'option is Freeze',
            'cat_id' => 29,
            'status' => 1
        ],
        [
            'name' => 'OTP not received',
            'cat_id' => 29,
            'status' => 1
        ],
        [
            'name' => 'Qualification',
            'cat_id' => 30,
            'status' => 1
        ],
        [
            'name' => 'Ration Card status',
            'cat_id' => 31,
            'status' => 1
        ],
        [
            'name' => 'Rejection reason',
            'cat_id' => 31,
            'status' => 1
        ],
        [
            'name' => 'when Ration Card issue',
            'cat_id' => 31,
            'status' => 1
        ],
        [
            'name' => 'Change',
            'cat_id' => 32,
            'status' => 1
        ],
        [
            'name' => 'Incorrect Residing in harayana Since',
            'cat_id' => 32,
            'status' => 1
        ],
        [
            'name' => 'Residing in Haryana Since',
            'cat_id' => 32,
            'status' => 1
        ],
        [
            'name' => 'Single Member Family Related',
            'cat_id' => 33,
            'status' => 1
        ],
        [
            'name' => 'Split',
            'cat_id' => 34,
            'status' => 1
        ],
        [
            'name' => 'Unsplit',
            'cat_id' => 34,
            'status' => 1
        ],
        [
            'name' => 'VoterID No',
            'cat_id' => 35,
            'status' => 1
        ]
        ];
    // Insert the categories into the database
    DB::table('categories')->insert($categories);
    }
}
