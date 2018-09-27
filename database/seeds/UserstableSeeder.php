<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([
            'name'=>'Shamir Imtiaz',
            'password'=>bcrypt('123456'),
            'email'=>'shamir@gmail.com',
            'admin'=>1,
            'avatar'=>asset('avatars/avatar.png')
        ]);

        App\User::create([
            'name'=>'Rajib Riki',
            'password'=>bcrypt('123456'),
            'email'=>'rajib@gmail.com',
            'avatar'=>asset('avatars/avatar.png')
        ]);
    }
}
