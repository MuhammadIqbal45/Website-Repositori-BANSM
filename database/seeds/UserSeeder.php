<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Muhammad Iqbal Hanif Firdaus',
            'no_telfon' => '081234567890',
            'username' => 'muhammad_iqbal',
            'alamat' => 'Indonesia',
            'level' => 'ADMIN',
            'email' => 'iqbalhanif2000@gmail.com',
            'password' => bcrypt('1234567890'),
            'remember_token' => Str::random(60),
        ]);
    }
}
