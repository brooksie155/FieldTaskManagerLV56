<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Helpers\CrudModel\CrudModelTrait;
use App\Models\Helpers\CrudModel\CrudModelInterface;

class Respondent extends Model
{
    use SoftDeletes;
    use CrudModelTrait;
    

     /**
     * Table name
     *
     * @var string$table
     */   
    protected $table = 'respondents';         
    
    /**
     * @var array $fieldMeta !Also require recruiter(id)!
     */
    private $fieldMeta = [
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'email',
        'phone' => 'numeric',
        'age' => 'numeric',
        'social_economic_grade' => 'string|in:A,B,C1,C2,D,E',
        'gender' => 'string|in:male,female,other',
        'gender_other' => 'required_if:gender,other',
        'profile' => 'string'          
    ]; 
    
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
    public function project() : Project
    {
        return $this->belongsToMany(Project::class, 'project_id')
            ->using(ProjectRespondents::class);
              
        // ? may need to define join fields ?
          
    }
    
    /**
     * 
     * @return HasMany
     */
    public function responses() : HasMany
    {
        // fk = projects.research_client_id
        return $this->hasMany(TaskResponse::class);
    }
    
    /**
     * 
     * @return \App\Models\Task
     */
    public function recruiter() : Recruiter
    {
        return $this->belongsTo(Recruiter::class, 'project_id');
              
        // ? may need to define join fields ?
          
    }    
            
}
