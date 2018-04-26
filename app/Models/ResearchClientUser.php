<?php

// A.K.A - researcher is a client

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Helpers\CrudModel\CrudModelTrait;
use App\Models\Helpers\CrudModel\CrudModelInterface;

class ResearchClientUser extends Model implements CrudModelInterface
{
    use SoftDeletes;
    use CrudModelTrait;
        
    /**
     * @var array $fieldMeta  !Also require research_client_id to be linked!
     */
    private $fieldMeta = [
       'research_client_id' => 'required|numeric',
       'firstname'  => 'required|string',
       'lastname'   => 'required|string',
       'email'      => 'email',
       'phone'      => 'numeric',
       'totp'       => 'string',
    ];    
    
     /**
     * Table name
     *
     * @var string$table
     */   
    protected $table = 'research_client_users';         
    
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
     * @return \App\Models\ResearchClient
     */
    public function client() : ResearchClient
    {
        return $this->belongsTo(ResearchClient::class, 'id');
    }

    /**
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }    
}