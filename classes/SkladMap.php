<?php
class SkladMap extends basemap {


    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM sklad");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT sklad.sklad_id,sklad.adress, organ.name AS organ_id,sklad.kol_vo, o.date_start as date_start"
            . " FROM sklad
            INNER JOIN organ ON sklad.organ_id=organ.organ_id 
            INNER JOIN organ o ON sklad.organ_id=o.organ_id 
             LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

}