<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\CrudModel\CrudModelInterface;

class PasswordReset extends Model implements CrudModelInterface
{
    /**
     * Table name
     *
     * @var string$table
     */   
    protected $table = 'password_resets';         
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var array $fieldMeta  -- fields not required on update !!
     */
    private $fieldMeta = [
       'user_id'  => 'required|numeric',
       'user_type' => 'required|in:admin,recruiter,research_client',
       'token' => 'string'
    ];        

    /**
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }   
    
    /**
     * Override boot() to add functionality to add created_at timestamp, as oppose
     * to setting $this->timestamps = true which will also try to set updated_at
     */
    public static function boot()
    {
        parent::boot();
        
        static::creating(function($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
    
    /**
     * Override update method to prevent updates on the table
     * 
     * @return null
     */
    public function update(array $attributes = [], array $options = []) : bool
    {
        return false;
    }
}
