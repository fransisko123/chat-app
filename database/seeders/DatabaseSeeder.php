<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ChatSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Iko',
            'email' => 'iko@gmail.com',
            'password' => bcrypt('123qweasd'),
        ]);

        User::factory()->create([
            'name' => 'Iko2',
            'email' => 'iko2@gmail.com',
            'password' => bcrypt('123qweasd'),
        ]);

        $this->call(ChatSeeder::class);
    }
}
