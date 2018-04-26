<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CrudController\CrudControllerInterface;
use App\Http\Controllers\Helpers\CrudController\CrudControllerTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\ResearchClient as ResearchClientModel;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

/**
 * Manage client CRUD interactions
 */
class ResearchClientManager extends Controller
{
    use CrudControllerTrait;     
    
    /**
     * @var array $searchableFields
     */
    protected $searchableFields = [
        'email', 'phone', 'company','website'
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
        $this->model = new ResearchClientModel();
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

