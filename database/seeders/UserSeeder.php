<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->create([
            'first_name' => 'Ivan',
            'last_name' => 'Ferreira',
            'email'=> 'inetto.ferreira@gmail.com',
            'password' => bcrypt('Password1')
        ]);

        \App\Models\User::factory()->count(5)->create();
    }
}
