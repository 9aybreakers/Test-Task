<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $registration_date = Carbon::now()->format('Y-m-d H:i:s');

        for ($i = 0; $i < 5; $i++) {

            DB::table('users')->insert([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at'=>now(),
                'password' => Hash::make('password'),
                'remember_token'=>Str::random(10),
                'created_at' => $registration_date,
                'updated_at' => $registration_date,
                'is_admin'=>0,
            ]);
        }
    }
}
