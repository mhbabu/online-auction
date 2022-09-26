<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'id' => '1x101',
            'type_name' => 'Admin',
            'is_registrable' => 1,
            'status' => 1,
            'is_archive' => 1,
            'created_at' => Carbon::now()->format('Y-m-d', 'H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d', 'H:i:s'),
            'updated_by' => 1,
            'deleted_by' => null
        ]);

        DB::table('user_types')->insert([
            'id' => '2x202',
            'type_name' => 'Customer',
            'is_registrable' => 1,
            'status' => 1,
            'is_archive' => 0,
            'created_at' => Carbon::now()->format('Y-m-d', 'H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d', 'H:i:s'),
            'updated_by' => 1,
            'deleted_by' => null
        ]);

        DB::table('user_types')->insert([
            'id' => '3x303',
            'type_name' => 'Operator',
            'is_registrable' => 1,
            'status' => 1,
            'is_archive' => 0,
            'created_at' => Carbon::now()->format('Y-m-d', 'H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d', 'H:i:s'),
            'updated_by' => 1,
            'deleted_by' => null
        ]);

    }
}
