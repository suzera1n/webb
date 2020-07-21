<?php
class StankiMap extends basemap {

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM stanki");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT stanki.stanok_id,stanki.name, type_stanok.name AS type_id, komplekt.name as komplekt_id,stanki.date_start,stanki.date_end,stanki.srok_exp"
            . " FROM stanki
            INNER JOIN type_stanok ON stanki.type_id=type_stanok.type_id 
            INNER JOIN komplekt ON stanki.komplekt_id=komplekt.komplekt_id LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findAll1($ofset=0,$limit=30)
    {
        $res = $this->db->query("SELECT stanki.stanok_id,stanki.name, type_stanok.name AS type_id, komplekt.name as komplekt_id,stanki.date_start,stanki.date_end,stanki.srok_exp"
            . " FROM stanki
            INNER JOIN type_stanok ON stanki.type_id=type_stanok.type_id 
            INNER JOIN komplekt ON stanki.komplekt_id=komplekt.komplekt_id WHERE stanki.date_start >= CURRENT_DATE LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

}