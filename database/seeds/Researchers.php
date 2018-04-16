<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Researchers
 *
 * @author brooksie
 */
class Researchers 
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
