<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Helpers\CrudModel\CrudModelTrait;
use App\Models\Helpers\CrudModel\CrudModelInterface;

class Task extends Model implements CrudModelInterface
{    
    use SoftDeletes;
    use CrudModelTrait;    
    
    const CREATED_AT = 'created_at';      // default(s)
    const UPDATED_AT = 'updated_at';

    /**
     * @var array $fieldMeta  -- fields not required on update !!
     */
    private $fieldMeta = [
        'summary' => 'required|string',
        'description' => 'required|string',
        'type' => 'string|in:video,audio,image,text,select_one,select_multiple',
        'response_options' => 'string|required_if:type,select_one|required_if:type,select_multiple',
        'minimum_requirement' => 'numeric|required_if:type,select_multiple',
        'project_task_number' => 'required|numeric',  // unique per project ... ?
        'project_id'    => 'required|numeric',      // fk link model ?
        'due' => 'date,'
    ];        
    
     /**
     * Table name, by default this is the expected name
     *
     * @var string $table
     */   
    protected $table = 'tasks';        
    
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
    
    /**
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }        
    
    
}
