<?php

use Illuminate\Database\Seeder;
use App\Models\ResearchClient;

/**
 * Description of ClientTableSeeder
 *
 * @author stephenb
 */
class ClientTableSeeder extends Seeder
{
    public function run()
    {    

        DB::table('research_clients')->delete();
        ResearchClient::create([
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'company' => 'BromideTech',
            'address' => '44 Acacia Avenue',     
            'website' => 'brooksie-net.co.uk'
        ]);
        
        ResearchClient::create([
            'email' => 'bon@fet.com',
            'phone' => '01234 567890',
            'company' => 'BobAfet.com',
            'address' => '44 Acacia Avenue',  
            'website' => 'scrabble-net.com'
        ]);

        ResearchClient::create([
            'email' => 'jim@crab.com',
            'phone' => '01234 567890',
            'company' => 'CrabApple Studios',
            'address' => '44 Acacia Avenue',  
            'website' => 'thefield-uk.com'
        ]);
        
    }
        
}
