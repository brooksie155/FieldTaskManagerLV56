<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

use Illuminate\Support\Facades\DB;
use App\Models\Client as elClient;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

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
    public function getAction(int $id) : IlluminateResponse 
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
    public function listAction(
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
    public function searchAction(
        Request $request,
        string $order = 'id', 
        string $orderDir = 'desc') : IlluminateResponse       
    {
 
// will be similar in all controllers ... move to trait        
        $searchParams = json_decode($request->get('search'), true) ?? [];
        foreach($searchParams as $fieldName => $value) {            
            if (!in_array($fieldName, $this->searchableFields)) {
                continue;
            }
            $this->whereColumnConditions[] = [$fieldName, $value];
        }            
// --- 
        
        return $this->listAction($order, $orderDir);
    }
    
    /**
     * TESTING : 
     * 
     * curl -X POST 
     *  -d "firstname=Bob&lastname=jim" 
     *  -H "X-Requested-With: XMLHttpRequest" 
     *  http://thefield-tm.test/api/clients/add
     * 
     * Uses $request->validate which will return a json response to AJAX requests
     * - redirects to / on web based requests....?
     * 
     * @param Request $request
     * @return IlluminateResponse
     * 
     */
    public function addAction(Request $request)  : IlluminateResponse 
    {
        $fieldMeta = $this->elClient->getFieldMeta();
        $validated = $request->validate($fieldMeta);       

        try {
            $result = elClient::create($validated);            
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
    
    
    public function updateAction(Request $request, int $id)  : IlluminateResponse 
    {
        
    }
     
    public function deleteAction(int $id)  : IlluminateResponse 
    {
        $result = elClient::where('id', $id)->delete();
        return Response($result);        
    }
    
    public function restoreAction(int $id)  : IlluminateResponse 
    {
        $result = elClient::withTrashed()
            ->where('id', $id)
            ->restore();
        
        return Response($result);        
    }
    
    public function listDeletedAction()  : IlluminateResponse 
    {
        return Response(elClient::onlyTrashed()->get());        
    }
        
        
        
        
      
    
    
}

