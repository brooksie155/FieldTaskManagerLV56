<?php

use Illuminate\Database\Seeder;
use App\Models\Respondent;

/**
 * Description of RespondentsTableSeeder
 *
 * @author stephenb
 */
class RespondentsTableSeeder extends Seeder
{
    public function run()
    {      
        DB::table('respondents')->delete();
       
        Respondent::create([
            'firstname' => 'jim',
            'lastname' => 'bob',
            'email' => 'jim@bob.com',
            'phone' => '010',
            'password' => 'password',
            'age' => 34,
            'social_economic_grade' => 'A',
            'gender' => 'male',
            'recruiter_id' => 1,
            'project_id' => 1
            
        ]);
        
        Respondent::create([
            'firstname' => 'Frank',
            'lastname' => 'Stark',
            'email' => 'frank@stark.com',
            'phone' => '020',
            'password' => 'password',
            'age' => 22,
            'social_economic_grade' => 'C1',
            'gender' => 'female',
            'recruiter_id' => 1,
            'project_id' => 1
        ]);    
    }
}
