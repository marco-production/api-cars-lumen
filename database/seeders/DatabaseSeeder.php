<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //php artisan db:seed --class=UsersTableSeeder

    public function run()
    {
        $this->call('UsersTableSeeder');
    }
}
