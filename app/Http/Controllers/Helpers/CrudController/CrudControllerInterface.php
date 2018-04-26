<?php

namespace App\Http\Controllers\Helpers\CrudController;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @author brooksie
 */
interface CrudControllerInterface 
{
    public function getModel() : Model;
    
    public function getSearchableFields() : array;
    
}
