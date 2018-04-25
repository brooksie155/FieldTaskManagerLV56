<?php

use Illuminate\Database\Seeder;
use App\Models\RespondentProfileQuestion;

/**
 * Description of RecruitersTableSeeder
 *
 * @author brooksie
 */
class RespondentProfileQuestionTableSeeder extends Seeder
{
    public function run() 
    {
        DB::table('recruiters')->delete();        
        
        RespondentProfileQuestion::create([
            'project_id' => 1,      
            'question_order' => 1,
            'question' => 'Question 1',
            'type' => 'text',
        ]);
        
        RespondentProfileQuestion::create([
            'project_id' => 1,      
            'question_order' => 2,
            'question' => 'Question 2',
            'type' => 'select_one',    
            'response_options' => '{"A":"Option A", "B":"Option B"}'
        ]);     
        
        RespondentProfileQuestion::create([
            'project_id' => 1,      
            'question_order' => 3,
            'question' => 'Question 3',
            'type' => 'select_multiple',    
            'response_options' => '{"A":"Option A", "B":"Option B","C":"Option C"}',
            'minimum_requirement' => 2            
        ]);            
    }
     
    
}

