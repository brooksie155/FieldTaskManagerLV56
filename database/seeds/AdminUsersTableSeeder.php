<?php

use Illuminate\Database\Seeder;
use App\Models\AdminUser;

/**
 * Description of Researchers
 *
 * @author stephenb
 */
class AdminUsersTableSeeder extends Seeder
{
    
    public function run()
    {    

        DB::table('admin_users')->delete();
        AdminUser::create([
            'firstname' => 'steve',
            'lastname' => 'brooks',
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'password' => 'password'           
        ]);
        
        AdminUser::create([
            'firstname' => 'laura',
            'lastname' => 'brooks',
            'email' => 'foo@bar.com',
            'phone' => '01234 567890',
            'password' => 'password'           
        ]);        
    }           
}
