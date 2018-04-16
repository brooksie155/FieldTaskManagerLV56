<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

/**
 * Description of ProjectsTableSeeder
 *
 * @author stephenb
 */
class ProjectsTableSeeder extends Seeder
{
    public function run()
    {      
        $dt = new \DateTimeImmutable();
        
        DB::table('projects')->delete();
       
        Project::create([
            'name' => 'Projet 100',
            'description' => 'The first dummy project',
            'researcher_id' => 1,
            'client_id' => 1,
            'due' => $dt->modify('+3 month'),
            'status' => 'proposed'
        ]);
        
        Project::create([
            'name' => 'Projet 200',
            'description' => 'The second dummy project',
            'researcher_id' => 2,
            'client_id' => 1,
            'due' => $dt->modify('+3 month'),
            'status' => 'active'      
        ]);    
    }
}
