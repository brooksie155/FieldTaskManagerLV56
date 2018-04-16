<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersRespondents extends Model
{
    use SoftDeletes;

//    const CREATED_AT = 'created_at';      // default(s)
//    const UPDATED_AT = 'updated_at';

     /**
     * Table name
     *
     * @var string$table
     */   
    protected $table = 'users_respondents';         
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /*
     * @var Array $guarded, allows all fields to be inserted/updated, we will 
     * control what in the controller as the update and create have different 
     * requirements - i.e. insert all, update only comments
     */
     protected $guarded = ['created_at', 'deleted_at', 'updated_at'];    

    /**
     * 
     * @return \App\Models\Task
     */
    public function project() : Project
    {
        return $this->belongsToMany(Project::class, 'project_id')
            ->using(ProjectRespondents::class);
       
        
        // ? may need to define join fields ?
        
        
    }
}
