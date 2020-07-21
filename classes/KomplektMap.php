<?php
class KomplektMap extends basemap {


    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM komplekt");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT komplekt.komplekt_id,nakladnaya.name as naklad_id, komplekt.name"
            . " FROM komplekt
            INNER JOIN nakladnaya ON komplekt.naklad_id=nakladnaya.naklad_id
             LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}