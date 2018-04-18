<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

use Illuminate\Support\Facades\DB;
use App\Models\Client as elClient;

/**
 * Manage client CRUD interactions
 */
class ClientManager extends Controller
{
    /**
     * @var array $searchableFields
     */
    private $searchableFields = [
        'firstname', 'lastname', 'email', 'phone', 'company'
    ];
    
    /**
     * @var array $whereColumnConditions
     */    
    private $whereColumnConditions = [];
    
    /**
     * @var App\Models\Client
     */
    private $elClient; 
    
    /**
     * 
     */
    public function __construct()
    {
        $this->elClient = new elClient();
    }
    
    /**
     * 
     * @param int $id
     * @return IlluminateResponse
     */
    public function getClient(int $id) : IlluminateResponse 
    {
        return Response(elClient::where('id', $id)->get());
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
    public function listClients(
        string $order = 'id', 
        string $orderDir = 'desc', 
        int $limit = 50, 
        int $offset = 0 ) : IlluminateResponse
    {
                       
        $clients = $this->elClient
            ->where($this->whereColumnConditions)
            ->orderBy($order)
            ->take($limit)
            ->skip($offset)
            ->get();
                        
        return Response($clients);
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
    public function searchClients(
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
        
        return $this->listClients($order, $orderDir);
    }
    
    
    
}

