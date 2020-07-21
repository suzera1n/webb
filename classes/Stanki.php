<?php
class Stanki extends table{
    public $stanok_id = 0;
    public $name = '';
    public $type_id = 0;
    public $date_start = '';
    public $srok_exp = '';
    public $date_end = '';
    public $komplekt_id = 0;


    public function validate(){
        if(!empty($this->name)&&
            !empty($this->type_id)&&
            !empty($this->date_start)&&
            !empty($this->date_end)&&
            !empty($this->srok_exp)&&
            !empty($this->komplekt_id)){
            return true;
        }
        return false;
    }
}