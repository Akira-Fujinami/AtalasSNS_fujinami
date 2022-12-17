<?php

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
        //
        DB::table('users')->insert([
            'username'=>'akira',
            'mail'=>'akira@icloud.com',
            'password'=>bcrypt('akira'),
            'bio'=>'私は社会人です。',
        ]);
    }
}
