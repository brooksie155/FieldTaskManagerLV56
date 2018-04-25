<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\CrudController\CrudControllerInterface;
use App\Http\Controllers\Helpers\CrudController\CrudControllerTrait;

use Illuminate\Database\Eloquent\Model;
use App\Models\Respondent as RespondentModel;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

/**
 * Description of RespondentManager
 *
 * @author stephenb
 */
class RespondentManager extends Controller
{
    use CrudControllerTrait;     
    
    /**
     * @var array $searchableFields
     */
    protected $searchableFields = [
        'firstname', 'lastname', 'email', 'phone', 'age', 'social_economic_grade','gender'
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
        $this->model = new RespondentModel();
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
    
    /**
     * On login display notifications about project/task status, and if something needs
     * to be done
     * 
     *   *** Another Trait ? - Notifications...
     * 
     */
    public function getNotications()
    {
        
    }
   
}
