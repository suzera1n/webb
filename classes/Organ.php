<?php
class Organ extends table{
    public $organ_id = 0;
    public $name = '';
    public $date_start = '';


    public function validate(){
        if(!empty($this->name)&&
            !empty($this->date_start)){
            return true;
        }
        return false;
    }
}