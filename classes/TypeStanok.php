<?php
class TypeStanok extends table{
    public $type_id = 0;
    public $name = '';



    public function validate(){
        if(
            !empty($this->name)){
            return true;
        }
        return false;
    }
}