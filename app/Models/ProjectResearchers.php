<?php

use \Illuminate\Database\Eloquent\Relations\Pivot;

namespace App\Models;

/**
 * In prep if projects require to tbe linked to multiple projects... possibly
 * all researchers can see all projects and each project with only have one 
 * researcher as the 'lead' researcher. Therefore will only be a one-many
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
    protected $table = 'x_project_researchers';         
    
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
