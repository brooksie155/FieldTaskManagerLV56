<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CrudController\CrudControllerInterface;
use App\Http\Controllers\Helpers\CrudController\CrudControllerTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskResponse as TaskResponseModel;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

/**
 * Description of TaskResponses
 *
 * @author stephenb
 */
class TaskResponseManager extends Controller
{
    use CrudControllerTrait;     
    
    /**
     * search summary using wildcards?
     * 
     * @var array $searchableFields
     */
    protected $searchableFields = [
        'complete', 'respondent_id', 'project_id', 'task_id'
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
        $this->model = new TaskResponseModel();
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

    public function uploadFile()
    {}
    
    public function getResponsesForTask()
    {
        // GET search/?search={"task_id":1234}
        
    }
    
    /**
     *
     */
    public function getResponsesForProject()
    {
        // GET search/?search={"project_id":1234}
    }    
} 

