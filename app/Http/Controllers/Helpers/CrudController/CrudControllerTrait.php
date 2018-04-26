<?php

namespace App\Http\Controllers\Helpers\CrudController;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

use Illuminate\Support\Facades\DB;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

use App\Models\Helpers\CrudModel\CrudModelInterface;

/**
 * Provides boilerplate for controller CRUD actions
 * 
 * Expects implementing controllers to provide a getModel() method to 
 * return an eloquent model instance, this is defined in the accompanying 
 * interface which should be implemented by controllers using this trait
 *
 * @author brooksie
 */
trait CrudControllerTrait 
{
    /**
     * @var array $whereColumnConditions
     */
    private $whereColumnConditions = [];
    
    /**
     * Requests a specific record from an eloquent model, expects primary key
     * to be id
     * 
     * @todo as an getPKey() method to the interface and require the controllers 
     * to provide this.
     * 
     * @param int $id
     * @return IlluminateResponse
     */
    public function getAction(int $id) : IlluminateResponse 
    {
        $model = $this->getModel();
        return Response($model::where('id', $id)->get());
    }
    
    /**
     * List action, invokes list request on an eloquent model with ordering, 
     * paging parameters
     * 
     * @param string $order
     * @param string $orderDir
     * @param int $limit
     * @param int $offset
     * @return IlluminateResponse
     */
    public function listAction(
        string $order = 'id', 
        string $orderDir = 'desc', 
        int $limit = 50, 
        int $offset = 0,
        bool $withTrashed = false) : IlluminateResponse
    {
        $model = $this->getModel();
        
        $modelInstance = $model
            ->where($this->whereColumnConditions)
            ->orderBy($order)
            ->take($limit)
            ->skip($offset);
        
        if ($withTrashed === true) {
            $modelInstance->withTrashed();
        }
                        
        return Response($modelInstance->get());
    }    
    
    /**
     * Decorates the list method by generating a list of search conditions, 
     * expected as json array. Searchable fields must be defined in the controller
     * using this trait
     *  
     * e.g.  ?search={'id':1, ...}
     * 
     * @param Request $request
     * @param string $order
     * @param string $orderDir
     * @return IlluminateResponse
     */
    public function searchAction(
        Request $request,
        string $order = 'id', 
        string $orderDir = 'desc') : IlluminateResponse       
    {
 
        $searchParams = json_decode($request->get('search'), true) ?? [];
        foreach($searchParams as $fieldName => $value) {            
            if (!in_array($fieldName, $this->searchableFields)) {
                continue;
            }
            $this->whereColumnConditions[] = [$fieldName, $value];
        }                    
        return $this->listAction($order, $orderDir);
    }    

    /**
     * Uses $request->validate which will return a json response to AJAX requests,
     * validates against meta list defined in the model
     * 
     * - redirects to / on web based requests, return errors for XHR requests
     * 
     * @param Request $request
     * @return IlluminateResponse
     * 
     */
    public function addAction(Request $request)  : IlluminateResponse 
    {
        if (!$this->getModel() instanceof CrudModelInterface) {
            return Response(get_class($this->getModel()) . " must implement CrudModelInterface for this action");
        }
        
        $fieldMeta = $this->getModel()->getFieldMeta();
        $validated = $request->validate($fieldMeta);       

        try {
            $result = $this->getModel()::create($validated);            
        }
        catch (QueryException $ex) {
            $msg = (getenv('APP_ENV') == 'dev')
                ? $ex->getMessage()
                :'DB Error'
            ;

            return Response($msg);
        }
        
        return Response($result);       
    }
    
   /**
     * Update CRUD model
     * 
     * @param Request $request
     * @param int $id
     * @return IlluminateResponse
     */
    public function updateAction(Request $request, int $id)  : IlluminateResponse 
    {
        
        if (!$this->getModel() instanceof CrudModelInterface) {
            return Response(get_class($this->getModel()) . " must implement CrudModelInterface for this action");
        }
        
        $fieldMeta = $this->getModel()->getFieldMetaForUpdate();
        $validated = $request->validate($fieldMeta);       

        try {
            $result = getModel()::where('id', $id)->update($validated);            
        }
        catch (QueryException $ex) {
            $msg = (getenv('APP_ENV') == 'dev')
                ? $ex->getMessage()
                :'DB Error'
            ;

            return Response($msg);
        }
        
        return Response($result);           
    }
     
    /**
     * Delete *mark as deleted* client
     * 
     * @param int $id
     * @return IlluminateResponse
     */
    public function deleteAction(int $id)  : IlluminateResponse 
    {
        $result = $this->getModel()::where('id', $id)->delete();
        return Response($result);        
    }
    
    /**
     * List *deleted* clients 
     * 
     * @return IlluminateResponse
     */
    public function deletedAction()  : IlluminateResponse 
    {
        return Response($this->getModel()::onlyTrashed()->get());        
    }    
    
    /**
     * Restore deleted client
     * 
     * @param int $id
     * @return IlluminateResponse
     */
    public function restoreAction(int $id)  : IlluminateResponse 
    {
        $result = $this->getModel()::withTrashed()->where('id', $id)->restore();
        
        return Response($result);        
    }
        
    /**
     * Physically delete record, must already by marked as deleted
     * 
     * @param int $id
     * @return IlluminateResponse
     */
    public function expungeAction(int $id)  : IlluminateResponse 
    {
        return Response($this->getModel()::onlyTrashed()->where('id', $id)->forceDelete());        
    }    
    
}
