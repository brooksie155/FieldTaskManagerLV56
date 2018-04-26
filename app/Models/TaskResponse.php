<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Helpers\CrudModel\CrudModelTrait;
use App\Models\Helpers\CrudModel\CrudModelInterface;

class TaskResponse extends Model implements CrudModelInterface
{
    use SoftDeletes;
    use CrudModelTrait;  

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
     * @var array $fieldMeta  -- fields not required on update !!
     */
    private $fieldMeta = [
        'response' => 'required|string',
        'complete' => 'boolean',
        'respondent_id' => 'required|integer',
        'project_id' => 'required|integer',
        'task_id'    => 'required|numeric'      // fk link model ?
    ];       
    
   /**
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }        
    
    /**
     * 
     * @return Task
     */
    public function task() : Task
    {
        // default will expect 'project_id' as forign key
        return belongsTo(Task::class);  
    }    
    
    /**
     * 
     * @return Task
     */
    public function respondent() : Respondent
    {
        return belongsTo(Respondent::class);  
    }      
    
    
    
}
