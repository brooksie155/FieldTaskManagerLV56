<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CrudController\CrudControllerInterface;
use App\Http\Controllers\Helpers\CrudController\CrudControllerTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\ResearchClientUser as ResearchClientUserModel;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

/**
 * Manage client CRUD interactions
 */
class ResearchClientUserManager extends Controller
{
    use CrudControllerTrait;     
    
    /**
     * @var array $searchableFields
     */
    protected $searchableFields = [
        'firstname', 'lastname', 'email', 'phone', 'research_client_id'
    ];
    
    /**
     * @var App\Models\Client
     */
    private $model; 
    
    /**
     * 
     */
    public function __construct()
    {
        $this->model = new ResearchClientUserModel();
    }
    
    /**
     * 
     * @return \App\Http\Controllers\API\Model
     */
    public function getModel() : Model
    {
        return $this->model;
    }    
    
    /**
     * 
     * @return array
     */
    public function getSearchableFields() : array
    {
        return $this->searchableFields;
    }           
}

