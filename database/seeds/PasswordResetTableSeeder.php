<?php

use Illuminate\Database\Seeder;
use App\Models\PasswordReset;

/**
 * Description of PasswordResetTableSeeder
 *
 * @author brooksie
 */
class PasswordResetTableSeeder extends Seeder
{
    public function run()
    {    
        DB::table('password_resets')->delete();
        PasswordReset::create([
            'user_type' => 'recruiter',
            'user_id' => 1,
            'token' => '1234abcd5678'
        ]);
    }
}
