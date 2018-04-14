<?php

use \Illuminate\Database\Eloquent\Relations\Pivot;

namespace App\Models;

/**
 * Description of ProjectRespondents
 *
 * @author brooksie
 */
class ProjectRespondents extends Pivot
{
    
//    const CREATED_AT = 'created_at';      // default(s)
//    const UPDATED_AT = 'updated_at';    
    
    /**
     * Table name
     *
     * @var string$table
     */   
    protected $table = 'x_project_respondents';         
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;    
    
    /**
     * @var array $gaurded
     */
    protected $guarded = ['created_at','updated_at'];      
    
}
