<?php

use App\Modules\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_type' => '1x101',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d','H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d','H:i:s'),
            'updated_by' => 1
        ]);

        User::create([
            'user_type' => '2x202',
            'name' => 'General User',
            'email' => 'gu@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d','H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d','H:i:s'),
            'updated_by' => 1
        ]);
    }
}
