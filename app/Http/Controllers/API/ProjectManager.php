<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Project as elProject;
use App\Models\Task as elTask;



/**
 * Description of ProjectManager
 *
 * @author stephenb
 */
class ProjectManager extends Controller
{
    /**
     * Get specified project
     * 
     * @todo : 
     *  - include #tasks
     *  - task progress [no response, partial, complete]
     *  - include #respondents
     *  - sorting and filtering options
     * 
     *  - use middleware to determine if project is accessable by user, i.e. if 
     *    they are a respondent
     * 
     * @param int $id
     * @return \App\Http\Controllers\API\IlluminateResponse
     */
    public function getProject(int $id) : IlluminateResponse 
    {
        return Response(elProject::where('id', $id)->get());
    }
    
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
