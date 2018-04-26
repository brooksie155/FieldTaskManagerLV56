<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Helpers\CrudModel\CrudModelTrait;
use App\Models\Helpers\CrudModel\CrudModelInterface;

/**
 * Admin Users - initially this would be theField staff 
 */
class AdminUser extends Model implements CrudModelInterface
{
    use SoftDeletes;
    use CrudModelTrait;
    
    /**
     * @var array $fieldMeta  -- fields not required on update !!
     */
    private $fieldMeta = [
        'firstname'  => 'required|string',
        'lastname'   => 'required|string',
        'email'      => 'required|email|unique:admin_users',
        'phone'      => 'numeric',
        'totp'       => 'string',
        'password'   => 'string|min:8'
    ];       
    
     /**
     * Table name
     *
     * @var string$table
     */   
    protected $table = 'admin_users';         
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /*
     * @var Array $guarded, allows all fields to be inserted/updated, we will 
     * control what in the controller as the update and create have different 
     * requirements - i.e. insert all, update only comments
     */
     protected $guarded = ['created_at', 'deleted_at', 'updated_at'];    
     
    /**
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }
    
    

}