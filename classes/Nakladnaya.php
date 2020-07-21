<?php
class Nakladnaya extends table{
    public $naklad_id = 0;
    public $name = '';
    public $sklad_id = 0;
    public $date_start = '';
    public $price = '';
    public $remont = '';
    public $remont_stanka = '';

    public function validate(){
        if(!empty($this->name)&&
            !empty($this->sklad_id)&&
            !empty($this->date_start)&&
            !empty($this->price)&&
            !empty($this->remont)&&
            !empty($this->remont_stanka)){
            return true;
        }
        return false;
    }
}