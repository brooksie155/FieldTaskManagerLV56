<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Helpers\CrudModel\CrudModelTrait;
use App\Models\Helpers\CrudModel\CrudModelInterface;

/**
 * Description of Recruiter
 *
 * @author brooksie
 */
class Recruiter extends Model implements CrudModelInterface
{
    use SoftDeletes;
    use CrudModelTrait;
    
    /**
     * @var array $fieldMeta  -- fields not required on update !!
     */
    private $fieldMeta = [
       'firstname'  => 'required|string',
       'lastname' => 'required|lastname',
       'email' => 'required|email',
       'password' => 'string',   
       'phone' => 'numeric',
    ];       
    
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
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }       
    
    /**
     * 
     * @return \App\Models\Task
     */
    public function respondents() : HasMany
    {
        // will lookup on 'project_id' by defafult
        return $this->hasMany(Respondent::class);
    }   
    
}
