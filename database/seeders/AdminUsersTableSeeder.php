<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registration_date = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('users')->insert([
           'name'=>'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now(),
            'password' => Hash::make('12345'),
            'remember_token'=>Str::random(10),
            'created_at' => $registration_date,
            'updated_at' => $registration_date,
            'is_admin'=>1,
        ]);
    }
}
