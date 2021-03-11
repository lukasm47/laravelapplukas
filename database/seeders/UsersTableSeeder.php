<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        User::create([
            'name' => 'Juan',
            'username' => 'Juanito',
            'email' => 'hola@correogmail.com',
            'password' => bcrypt('1234567')
        ]);

        factory(User::class, 10)->create();

    }
}
