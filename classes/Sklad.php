<?php
class Sklad extends table{
    public $sklad_id = 0;
    public $adress = '';
    public $organ_id = 0;
    public $kol_vo = '';


    public function validate(){
        if(!empty($this->adress)&&
            !empty($this->organ_id)&&
            !empty($this->kol_vo)){
            return true;
        }
        return false;
    }
}