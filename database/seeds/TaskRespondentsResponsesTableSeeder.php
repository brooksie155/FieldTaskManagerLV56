<?php

use Illuminate\Database\Seeder;
use App\Models\TaskResponse;

/**
 * Description of TaskRespondentsResponsesTableSeeder
 *
 * @author stephenb
 */
class TaskRespondentsResponsesTableSeeder extends Seeder
{
    public function run()
    {         
        DB::table('task_responses')->delete();
       
        TaskResponse::create([
            'task_id' => 101,
            'respondent_id' => 1,
            'project_id' => 1,
            'response' => 'p101/r1_t101.mov',
            'complete' => true,
        ]);
        
        TaskResponse::create([
            'task_id' => 102,
            'respondent_id' => 1,
            'project_id' => 1,
            'response' => 'The quick brown fox ran over the hill',
            'complete' => true,
        ]);
         
        TaskResponse::create([
            'task_id' => 103,
            'respondent_id' => 1,
            'project_id' => 1,
            'response' => 'p101/r1_t103.mp3',
            'complete' => false,
        ]);
        
        TaskResponse::create([
            'task_id' => 201,
            'respondent_id' => 2,
            'project_id' => 2,
            'response' => 'p201/r2_t201.jpg',
            'complete' => true,
        ]);                
    }
}
