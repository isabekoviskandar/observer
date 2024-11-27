<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i=1; $i < 100 ; $i++) { 
            $random = rand(0 , ($i - 1));
            Agent::create([
                'parent_id' => $i == 1 ? 0 : $random,
                'name'=> $i == 1 ? 'PArent Agent' : ($random == 0 ? 'Parent Agent' : 'Child Agent - ' . $i),
                'tel'=>'+998950200926' . $i,
            ]);
        }
    }
}
