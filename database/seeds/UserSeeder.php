<?php

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
        DB::table('user')->delete();

        DB::table('user')->insert([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'phone' => '13088888888',
            'email' => 'admin@domain.com'
        ]);
    }
}
