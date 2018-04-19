<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CrudController\CrudControllerInterface;
use App\Http\Controllers\Helpers\CrudController\CrudControllerTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client as elClient;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

/**
 * Manage client CRUD interactions
 */
class ClientManager extends Controller
{
    use CrudControllerTrait;     
    
    /**
     * @var array $searchableFields
     */
    protected $searchableFields = [
        'firstname', 'lastname', 'email', 'phone', 'company'
    ];
    
    /**
     * @var array $whereColumnConditions
     */    
    private $whereColumnConditions = [];
    
    /**
     * @var App\Models\Client
     */
    private $elClient; 
    
    /**
     * 
     */
    public function __construct()
    {
        $this->elClient = new elClient();
    }
    
    /**
     * 
     * @return \App\Http\Controllers\API\Model
     */
    public function getModel() : Model
    {
        return $this->elClient;
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

