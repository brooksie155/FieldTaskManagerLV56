<?php

use Illuminate\Database\Seeder;
use App\Models\UsersResearchers;

/**
 * Description of Researchers
 *
 * @author stephenb
 */
class ResearchersTableSeeder extends Seeder
{
    
    public function run()
    {    

        DB::table('users_researchers')->delete();
        UsersResearchers::create([
            'firstname' => 'steve',
            'lastname' => 'brooks',
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'password' => 'password'           
        ]);
        
        UsersResearchers::create([
            'firstname' => 'laura',
            'lastname' => 'brooks',
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'password' => 'password'           
        ]);        
    }           
}
