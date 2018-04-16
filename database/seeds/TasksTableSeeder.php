<?php

use Illuminate\Database\Seeder;
use App\Models\Task;


/**
 * Description of TasksTableSeeder
 *
 * @author stephenb
 */
class TasksTableSeeder extends Seeder
{
    public function run()
    {      
        $dt = new \DateTimeImmutable();
        
        DB::table('tasks')->delete();
       
        Task::create([
            'summary' => 'Task 101',
            'description' => 'The first dummy project T1',
            'type' => 'video',
            'project_id' => 1,
            'project_task_number' => 1,
            'due' => $dt->modify('+2 month'),
        ]);
        
        Task::create([
            'summary' => 'Task 102',
            'description' => 'The first dummy project T2',
            'type' => 'text',
            'project_id' => 1,
            'project_task_number' => 2,
            'due' => $dt->modify('+2 month'),
        ]);    
        
        Task::create([
            'summary' => 'Task 103',
            'description' => 'The first dummy project T3',
            'type' => 'audio',
            'project_id' => 1,
            'project_task_number' => 3,
            'due' => $dt->modify('+2 month'),
        ]);
        
        Task::create([
            'summary' => 'Task 104',
            'description' => 'The first dummy project T4',
            'type' => 'select_one',
            'project_id' => 1,
            'project_task_number' => 4,
            'due' => $dt->modify('+2 month'),
        ]); 
        
        Task::create([
            'summary' => 'Task 105',
            'description' => 'The first dummy project T5',
            'type' => 'select_multiple',
            'project_id' => 1,
            'project_task_number' => 5,
            'due' => $dt->modify('+2 month'),
        ]);
        
        Task::create([
            'summary' => 'Task 106',
            'description' => 'The first dummy project T6',
            'type' => 'image',
            'project_id' => 1,
            'project_task_number' => 6,
            'due' => $dt->modify('+2 month'),
        ]); 
        
        Task::create([
            'summary' => 'Task 201',
            'description' => 'The second dummy project T1',
            'type' => 'image',
            'project_id' => 2,
            'project_task_number' => 1,
            'due' => $dt->modify('+2 month'),
        ]);         
        
    }}
