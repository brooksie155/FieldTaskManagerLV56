<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    
    const CREATED_AT = 'created_at';      // default(s)
    const UPDATED_AT = 'updated_at';

     /**
     * Table name
     *
     * @var string $table
     */   
    // protected $table = 'projects';         // by default this is the expected name
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;    
    
    /**
     * @var array $dates 
     */
    protected $dates = ['due'];

    /**
     * @var array $gaurded
     */
    protected $guarded = ['created_at','deleted_at','updated_at'];  
    
    /**
     * OneToOne Relationship with Client
     * 
     * @return App\Model\Client
     */
    public function client() : Client
    {
        return $this->belongsTo(Client::class);
    }
    
    /**
     * A project has one researcher
     * 
     * @return \UsersReserchers
     */
    public function researcher() : UsersReserchers
    {
        return $this->belongsTo(UsersReserchers::class, 'researcher_id'); 
    }
    
    /**
     * 
     * @return \App\Models\Task
     */
    public function tasks() // : Task or array/collection
    {
        // will lookup on 'project_id' by defafult
        return $this->hasMany(Task::class);
    }
    
    /**
     * @return \App\Models\UsersRespondents
     */
    public function respondents() : HasManyThrough 
    {
        return $this->hasManyThrough(
            UsersRespondents::class, 
            ProjectRespondents::class, 
            'project_id',               // fk on ProjectRespondents in join table
            'respondent_id',            // fk on UsersRespondents in join table
            'id',                       // pk on Projects (this)
            'id'                        // px on UserRespondents 
        );
    }
}
