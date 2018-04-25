<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Helpers\CrudModel\CrudModelTrait;
use App\Models\Helpers\CrudModel\CrudModelInterface;

class ResearchClient extends Model implements CrudModelInterface
{
//    const CREATED_AT = 'created_at';      // default(s)
//    const UPDATED_AT = 'updated_at';    
    
    use SoftDeletes;
    use CrudModelTrait;
    
    /**
     * The connection name for the model.
     *
     * @var string
     */
//    protected $connection = 'mysql';      // default    
    
    /**
     * @var array $fieldMeta  -- fields not required on update !!
     */
    private $fieldMeta = [
       'email'      => 'email',
       'phone'      => 'numeric',
       'company'    => 'required|string',
       'address'    => 'string',
       'website'    => 'url'
    ];    

     /**
     * Table name, by default 'clients' would be derived from the 
     * models class name and presumed
     *
     * @var string $table
     */   
    protected $table = 'research_clients';    
    
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
     * @return HasMany
     */
    public function project() : HasMany
    {
        // fk = projects.research_client_id
        return $this->hasMany(Project::class);
    }
    
    /**
     * 
     * @return HasMany
     */
    public function users() : HasMany
    {
        // fk = research_clients.research_client_id        
        return $this->hasMany(ResearcherClientUser::class);
    }

    /**
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }
       
}
