<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    
    const CREATED_AT = 'created_at';      // default(s)
    const UPDATED_AT = 'updated_at';

     /**
     * Table name
     *
     * @var string $table
     */   
    protected $table = 'tasks';         // by default this is the expected name
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;    
    
    /**
     * @var array $gaurded
     */
    protected $guarded = ['created_at','deleted_at','updated_at'];      
    
    /**
     * A project has one researcher
     * 
     * @return \UsersReserchers
     */
    public function project() : Project
    {
        // default will expect 'project_id' as forign key
        return belongsTo(Project::class);  
    }
    
    
}
