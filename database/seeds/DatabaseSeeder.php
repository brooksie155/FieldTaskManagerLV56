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
        $this->call(AdminUsersTableSeeder::class);
        $this->call(PasswordResetTableSeeder::class);
        $this->call(ProjectRespondentsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(RecruitersTableSeeder::class);
        $this->call(ResearchClientTableSeeder::class);
        $this->call(ResearchClientUserTableSeeder::class);
        $this->call(RespondentProfileQuestionTableSeeder::class);
        $this->call(RespondentsTableSeeder::class);
        $this->call(TaskRespondentsResponsesTableSeeder::class);
        $this->call(TasksTableSeeder::class);

    }
}
