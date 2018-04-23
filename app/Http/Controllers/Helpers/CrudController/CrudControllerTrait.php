<?php

namespace App\Http\Controllers\Helpers\CrudController;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

use Illuminate\Support\Facades\DB;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

/**
 * Provides boilerplate for controller CRUD actions
 * 
 * Expects implementing controllers to provide a getModel() method
 *
 * @author brooksie
 */
trait CrudControllerTrait 
{
    /**
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
     * List all clients
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
     * Add search parameters, expected as json array 
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
     * Uses $request->validate which will return a json response to AJAX requests
     * - redirects to / on web based requests....?
     * 
     * @param Request $request
     * @return IlluminateResponse
     * 
     */
    public function addAction(Request $request)  : IlluminateResponse 
    {
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
     * Update client
     * 
     * @param Request $request
     * @param int $id
     * @return IlluminateResponse
     */
    public function updateAction(Request $request, int $id)  : IlluminateResponse 
    {
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
     * Physically delete client
     * 
     * @param int $id
     * @return IlluminateResponse
     */
    public function expungeAction(int $id)  : IlluminateResponse 
    {
        return Response($this->getModel()::onlyTrashed()->where('id', $id)->forceDelete());        
    }    
    
}
