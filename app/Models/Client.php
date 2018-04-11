<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
        
//    const CREATED_AT = 'created_at';      // default(s)
//    const UPDATED_AT = 'updated_at';

     /**
     * Table name
     *
     * @var string$table
     */   
//    protected $table = 'clients';         // by default this is the expected name
    
    
    /**
     * The connection name for the model.
     *
     * @var string
     */
//    protected $connection = 'mysql';      // default
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * @var array $dates (can also be used to 
     */
    protected $dates = ['deleted_at'];    
    
    /*
     * @var Array $guarded, allows all fields to be inserted/updated, we will 
     * control what in the controller as the update and create have different 
     * requirements - i.e. insert all, update only comments
     */
     protected $guarded = ['creaetd_at','deleted_at','updated_at'];    
     
     
    
    
}
