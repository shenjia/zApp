<?php
class FormModel extends CFormModel
{
    private $_labels;
    
    public function label($attribute) 
    {
        if (!isset($this->_labels)) {
            $this->_labels = $this->attributeLabels(); 
        }
        return $this->_labels[$attribute];
    }
    
}