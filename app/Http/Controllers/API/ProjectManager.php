<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CrudController\CrudControllerInterface;
use App\Http\Controllers\Helpers\CrudController\CrudControllerTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project as elProject;
use App\Models\Task as elTask;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;


/**
 * Description of ProjectManager
 *
 * @author stephenb
 */
class ProjectManager extends Controller implements CrudControllerInterface
{
    
    use CrudControllerTrait; 
    
    /**
     * @var array $searchableFields
     */
    protected $searchableFields = [
        'name', 'researcher_id', 'client_id', 'due', 'status'
    ];
    
    /**
     * @var array $whereColumnConditions
     */    
    protected $whereColumnConditions = [];
    
    /**
     * @var App\Models\project
     */
    private $modelElProject; 
    
    /**
     * 
     */
    public function __construct()
    {
        $this->modelElProject = new elProject();
    }
    
    /**
     * 
     * @return \App\Http\Controllers\API\Model
     */
    public function getModel() : Model
    {
        return $this->modelElProject;
    }
    
    /**
     * 
     * @param int $id
     * @return IlluminateResponse
     */
//    public function getAction(int $id) : IlluminateResponse 
//    {
//        return Response(elProject::where('id', $id)->get());
//    }
//    
    /**
     * Get list of projects filter on status/researcher, order by due date/name/id
     */
    public function listProjects()
    {}
    
    /**
     * Get list of projects for given respondent
     * (maybe listProjects can auto-filter when the logged in user is a respondent)
     */
    public function listProjectsForRespondent()
    {} 
    
    /**
     * mark project as deleted
     * 
     * - Research User only!!
     */
    public function deleteProject()
    {}
    
    /**
     * update project info
     * 
     * - Research user only
     */
    public function updateProject()
    {}
    
    public function createProject()
    {
       
    }
    
    public function addRespondent()
    {
    }    
}
