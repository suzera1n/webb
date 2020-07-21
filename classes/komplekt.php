<?php
class komplekt extends table{
    public $komplekt_id = 0;
    public $name = '';
    public $naklad_id = 0;


    public function validate(){
        if(!empty($this->name)&&
            !empty($this->naklad_id)){
            return true;
        }
        return false;
    }
}