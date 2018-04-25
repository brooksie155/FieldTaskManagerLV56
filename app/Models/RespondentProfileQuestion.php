<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Helpers\CrudModel\CrudModelTrait;
use App\Models\Helpers\CrudModel\CrudModelInterface;

/**
 * Description of RespondentProfileQuestion
 *
 * @author brooksie
 */
class RespondentProfileQuestion extends Model implements CrudModelInterface
{
    use SoftDeletes;
    use CrudModelTrait;
    
    /**
     * @var array $fieldMeta  -- fields not required on update !!
     */
    private $fieldMeta = [
        'project_id' => 'required|numeric',
        'question_order' => 'required|numeric',
        'question' => 'required|string',
        'type' => 'required|in:text,select_one,select_multiple',
        'minimum_requirement' => 'numeric'
    ];
    
   /**
     * @return array
     */
    public function getFieldMeta() : array
    {
        return $this->fieldMeta;
    }   

    /**
     * A profile question relates to 1 project
     * 
     * @return \Project
     */
    public function project() : Project
    {
        return $this->belongsTo(Project::class); 
    }
}
