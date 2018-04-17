<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\API;

/**
 * Description of ResearcherManager
 *
 *  !Researcher & Respondent manager quite similar... use of some shared code
 *  maybe useful while keeping separate controllers in order to maintain 
 * 
 * @author stephenb
 */
class ResearcherManager 
{
    /**
     * On login display notifications about project/task status, and if something needs
     * to be done
     */
    public function getNotications()
    {
        
    }
    
    public function updateResearcherInfo()
    {}

    /**
     * Mark deleted - Researcher only
     */
    public function deleteResearcher()
    {
        
    }
    
    public function createResearcher()
    {
        
    }
    
    /**
     * projects Researcher linked to  (filter on status)
     */
    public function getProjects()
    {
        
    }
    
    /**
     * List all respondents, with filtering and search options
     * Researcher only
     */
    public function listResearchers()
    {}    
    
    
    
    
}
