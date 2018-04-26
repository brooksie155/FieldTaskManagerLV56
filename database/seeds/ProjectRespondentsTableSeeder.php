<?php

use Illuminate\Database\Seeder;
use App\Models\ProjectRespondents;

/**
 * Description of RespondentsTableSeeder
 *
 * @author stephenb
 */
class ProjectRespondentsTableSeeder extends Seeder
{
    public function run()
    {      
        DB::table('x_project_respondents')->delete();
       
        ProjectRespondents::create([
            'respondent_id' => 1,
            'project_id' => 1,        
        ]);
        
        ProjectRespondents::create([
            'respondent_id' => 2,
            'project_id' => 2,                 
        ]);    
    }
}