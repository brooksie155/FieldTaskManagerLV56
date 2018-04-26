<?php

use Illuminate\Database\Seeder;
use App\Models\Recruiter;

/**
 * Description of RecruitersTableSeeder
 *
 * @author brooksie
 */
class RecruitersTableSeeder extends Seeder
{
    public function run() 
    {
        DB::table('recruiters')->delete();        
        
        Recruiter::create([
            'firstname' => 'steve',
            'lastname' => 'brooks',
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'password' => 'password'           
        ]);
        
        Recruiter::create([
            'firstname' => 'laura',
            'lastname' => 'brooks',
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'password' => 'password'           
        ]);        
    }
     
    
}
