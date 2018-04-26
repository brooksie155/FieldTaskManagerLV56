<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Helpers\CrudModel\CrudModelTrait;
use App\Models\Helpers\CrudModel\CrudModelInterface;

class Project extends Model implements CrudModelInterface
{
    use SoftDeletes;
    use CrudModelTrait;
    
    const CREATED_AT = 'created_at';      // default(s)
    const UPDATED_AT = 'updated_at';

    /**
     * Table name
     *
     * @var string $table
     */   
    protected $table = 'projects';         
    
    /**
     * @var array $fieldMeta  -- fields not required on update !!
     */
    private $fieldMeta = [
       'name'  => 'required|string',
       'description' => 'string',
       'introduction' => 'string',
       'research_client_id' => 'numeric',    // Reference ?
       'due' => 'date',
       'status' => 'required|in:proposed, active, post-processing, delivered'            
    ];        
        
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;    
    
    /**
     * @var array $dates 
     */
    protected $dates = ['due'];

    /**
     * @var array $gaurded
     */
    protected $guarded = ['created_at','deleted_at','updated_at'];  
    
    /**
     * OneToOne Relationship with Client
     * 
     * @return App\Model\Client
     */
    public function client() : Client
    {
        return $this->belongsTo(Client::class);
    }
    
    /**
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }    
    
    /**
     * A project has one researcher
     * 
     * @return \UsersReserchers
     */
    public function researcheClient() : ResearchClient
    {
        return $this->belongsTo(ResearchClient::class, 'research_client_id'); 
    }
    
    /**
     * 
     * @return HasMany
     */
    public function tasks() : HasMany
    {
        // will lookup on 'project_id' by defafult
        return $this->hasMany(Task::class);
    }
    
    /**
     * 
     * @return HasMany
     */
    public function respondentProfileQuestions() : HasMany
    {
        return $this->hasMany(RespondentProfileQuestion::class);
    }
    
    /**
     * @return \App\Models\UsersRespondents
     */
    public function respondents() : HasManyThrough 
    {
        return $this->hasManyThrough(
            Respondents::class, 
            ProjectRespondents::class, 
            'project_id',               // fk on ProjectRespondents in join table
            'respondent_id',            // fk on UsersRespondents in join table
            'id',                       // pk on Projects (this)
            'id'                        // px on Respondents 
        );
    }
}
