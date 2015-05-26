<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        // !!! All existing users are deleted !!!
        DB::table('users')->delete();

        User::create([
            'ad'        => 'Administrator',
            'ogrno'     => '111'
            'soyad'     => 'Abi',
            'email'     => 'admin@klu.edu.tr',
            'password'  => Hash::make('admin'),
        ]);
    }

}