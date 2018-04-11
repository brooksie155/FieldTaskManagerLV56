<?php

use Illuminate\Database\Seeder;
use App\Client;

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
//            'deleted_at' => $time(),
//            'created_at' => $time(),
//            'updated_at' => $time(),            
        ]);
    }
        
}
