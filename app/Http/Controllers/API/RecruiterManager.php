<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CrudController\CrudControllerInterface;
use App\Http\Controllers\Helpers\CrudController\CrudControllerTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminUser as RecruiterModel;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
/**
 * General user management - possibly require separate methods for Researchers 
 * and Respondents?
 *
 * @author stephenb
 */
class RecruiterManager extends Controller
{
    use CrudControllerTrait;     
    
    /**
     * @var array $searchableFields
     */
    protected $searchableFields = [
        'firstname', 'lastname', 'email', 'phone'
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
        $this->model = new RecruiterModel();
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
