<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ['name' => 'Nguyen Van A', 'phone' => '012345678', 'grender' => '1', 'type' => '1', 'status' => '1' ],
            ['name' => 'Nguyen Van B', 'phone' => '012345678', 'grender' => '0', 'type' => '1', 'status' => '2' ],
            ['name' => 'Nguyen Van C', 'phone' => '012345678', 'grender' => '1', 'type' => '1', 'status' => '2' ],
            ['name' => 'Nguyen Van D', 'phone' => '012345678', 'grender' => '0', 'type' => '1', 'status' => '4' ],
        ];

        foreach($user as $value){
            DB::table('user')->insert($value);
        }
    }
}
