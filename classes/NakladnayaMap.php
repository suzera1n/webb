<?php
class NakladnayaMap extends basemap {

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM nakladnaya");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT nakladnaya.naklad_id,sklad.adress as sklad_id, nakladnaya.name,nakladnaya.date_start,nakladnaya.price,nakladnaya.remont,nakladnaya.remont_stanka"
            . " FROM nakladnaya
            INNER JOIN sklad ON nakladnaya.sklad_id=sklad.sklad_id
             LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}