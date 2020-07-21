<?php
class OrganMap extends basemap {

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM organ");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT organ.organ_id,organ.date_start, organ.name"
            . " FROM organ
             LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}