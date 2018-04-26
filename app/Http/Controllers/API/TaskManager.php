<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CrudController\CrudControllerInterface;
use App\Http\Controllers\Helpers\CrudController\CrudControllerTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task as TaskModel;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

/**
 * Description of TaskManager
 *
 * @author stephenb
 */
class TaskManager extends Controller
{
    use CrudControllerTrait;     
    
    /**
     * search summary using wildcards?
     * 
     * @var array $searchableFields
     */
    protected $searchableFields = [
        'summary', 'type', 'project_id', 'due'
    ];
    
    /**
     * @var App\Models\Task
     */
    private $model; 
    
    /**
     * 
     */
    public function __construct()
    {
        $this->model = new TaskModel();
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