<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
//    const CREATED_AT = 'created_at';      // default(s)
//    const UPDATED_AT = 'updated_at';    
    
    /**
     * @var array $fieldMeta
     */
    private $fieldMeta = [
       'firstname'  => 'required|string',
       'lastname'   => 'required|string',
       'email'      => 'string',
       'phone'      => 'numeric',
       'company'    => 'required|string',
       'address'    => 'string'            
    ];    
    

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
    public function project() : HasMany
    {
        // fk = projects.client_id
        return $this->hasMany(Project::class);
    }
    
    /**
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }
            
    
}
