<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->count(29)->create();
        User::factory()->create([
            'name' => 'Imer',
            'email' => 'imer@imer.com'
        ]);
    }
}
