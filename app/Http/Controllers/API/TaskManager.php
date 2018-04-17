<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\API;

/**
 * Description of TaskManager
 *
 * @author stephenb
 */
class TaskManager 
{
    /**
     * - if for respondent, return info with their response 
     * - if researcher, return task info with links or data for all responses
     *   & allow editing of task
     *   & display which respondents have completed the task, or partially completed ...
     *   (& option to send reminder...)
     */
    public function getTask()
    {}
    
    public function updateTask()
    {}
    
    /**
     * saveTask to handle both options ??
     */
    public function createTask()
    {}    
    
    public function deleteTask()
    {}
    
    /**
     * new or updated
     */
    public function saveResponseForTask()
    {}
    
    /**
     * ?
     */
    public function deleteResponseForTask()
    {}
    
    /**
     * send a link with a token so the respondent does not require to login
     * in order to upload - or should we require login in order to confirm identity?
     */
    public function sendUploadLink()
    {}            
    
}
