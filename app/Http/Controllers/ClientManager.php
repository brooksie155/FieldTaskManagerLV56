<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;

use Illuminate\Support\Facades\DB;
use App\Client as elClient;

/**
 * Manage client CRUD interactions
 */
class ClientManager extends Controller
{
    public function getClient(int $id) : IlluminateResponse 
    {
        return Response(elClient::where('id', $id)->get());
    }

}
