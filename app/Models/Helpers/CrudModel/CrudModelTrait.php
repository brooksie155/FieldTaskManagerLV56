<?php

namespace App\Models\Helpers\CrudModel;

/**
 * Common methods for Models implementing a crud interface
 *
 * @author stephenb
 */
trait CrudModelTrait 
{
    /**
     * Prep field meta for updates, remove 'required' 
     * 
     * @return array
     */
    public function getFieldMetaForUpdate() : array
    {
        foreach ($this->getFieldMeta() as $field => $meta) {
            $fieldMetaForUpdate[$field] = str_replace(
                'required|', 
                '', 
                $meta
            );
        }
        
        return $fieldMetaForUpdate ?? [];
     } 
    
}
