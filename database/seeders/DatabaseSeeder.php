<?php

namespace Database\Seeders;

use App\Models\ApiTask;
use App\Models\Task;
use App\Models\User;
use Database\Factories\ApiTaskFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(20)->create();
         Task::factory(20)->create();
        ApiTask::factory(20)->create();

//        ApiTaskFactory::factory(10)->create();



//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
