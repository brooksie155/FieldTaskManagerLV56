<?php

use Illuminate\Database\Seeder;
use App\Models\UsersRespondents;

/**
 * Description of RespondentsTableSeeder
 *
 * @author stephenb
 */
class RespondentsTableSeeder extends Seeder
{
    public function run()
    {      
        DB::table('users_respondents')->delete();
       
        UsersRespondents::create([
            'firstname' => 'jim',
            'lastname' => 'bob',
            'email' => 'jim@bob.com',
            'phone' => '010',
            'password' => 'password'           
        ]);
        
        UsersRespondents::create([
            'firstname' => 'Frank',
            'lastname' => 'Stark',
            'email' => 'frank@stark.com',
            'phone' => '020',
            'password' => 'password'           
        ]);    
    }
}
