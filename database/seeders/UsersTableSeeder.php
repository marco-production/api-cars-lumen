<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        User::create([
            'fullname'=>'Marco Antonio De la cruz Santos',
            'email'=>'marco033F@hotmail.com',
            'slug'=>'marco-antonio-de-la-cruz-santos',
            'api_token'=>'yJsEhmB5HpnuvPMu',
        ]);
    }
}
