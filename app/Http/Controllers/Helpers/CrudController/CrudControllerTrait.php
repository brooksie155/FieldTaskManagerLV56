<?php

namespace App\Http\Controllers\Helpers\CrudController;

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

}
