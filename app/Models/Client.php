<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
//    const CREATED_AT = 'created_at';      // default(s)
//    const UPDATED_AT = 'updated_at';    
    
    use SoftDeletes;
    
    /**
     * @var array $fieldMeta  -- fields not required on update !!
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
     * Table name, by default 'clients' would be derived from the 
     * models class name and presumed
     *
     * @var string $table
     */   
    protected $table = 'clients';         // 
    
    
    /**
     * The connection name for the model.
     *
     * @var string
     */
//    protected $connection = 'mysql';      // default
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];    
    
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
    
    public function getFieldMetaForUpdate() : array
    {
        foreach ($this->fieldMeta as $field => $meta) {
            $fieldMetaForUpdate[$field] = str_replace(
                'required|', 
                '', 
                $meta
            );
        }
        
        return $fieldMetaForUpdate ?? [];
     }
        
    
}
