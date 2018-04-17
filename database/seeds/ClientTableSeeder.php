<?php

use Illuminate\Database\Seeder;
use App\Models\Client;

/**
 * Description of ClientTableSeeder
 *
 * @author stephenb
 */
class ClientTableSeeder extends Seeder
{
    public function run()
    {    

        DB::table('clients')->delete();
        Client::create([
            'firstname' => 'steve',
            'lastname' => 'brooks',
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'company' => 'BromideTech',
            'address' => '44 Acacia Avenue',        
        ]);
        
        Client::create([
            'firstname' => 'bob',
            'lastname' => 'afet',
            'email' => 'bon@fet.com',
            'phone' => '01234 567890',
            'company' => 'BobAfet.com',
            'address' => '44 Acacia Avenue',        
        ]);

        Client::create([
            'firstname' => 'jim',
            'lastname' => 'crabapple',
            'email' => 'jim@crab.com',
            'phone' => '01234 567890',
            'company' => 'CrabApple Studios',
            'address' => '44 Acacia Avenue',        
        ]);
        
    }
        
}
