<?php

use Illuminate\Database\Seeder;
use App\Models\ResearchClientUser;

/**
 * Description of Researchers
 *
 * @author stephenb
 */
class ResearchClientUserTableSeeder extends Seeder
{
    
    public function run()
    {    

        DB::table('research_client_users')->delete();
        ResearchClientUser::create([
            'research_client_id' => 1,
            'firstname' => 'steve',
            'lastname' => 'brooks',
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'password' => 'password'           
        ]);
        
        ResearchClientUser::create([
            'research_client_id' => 1,            
            'firstname' => 'laura',
            'lastname' => 'brooks',
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'password' => 'password'           
        ]);        
    }           
}