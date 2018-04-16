<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientTableSeeder::class);
//        $this->call(ProjectResearchersTableSeeder::class);
        $this->call(ProjectRespondentsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ResearchersTableSeeder::class);
        $this->call(RespondentsTableSeeder::class);
        $this->call(TaskRespondentsResponsesTableSeeder::class);
        $this->call(TasksTableSeeder::class);

    }
}
