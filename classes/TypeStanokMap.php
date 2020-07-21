<?php
class TypeStanokMap extends basemap {

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT type_id, name"
                . "FROM type_stanok WHERE type_id = $id");
            return $res->fetchObject("Type");
        }
        return new TypeStanok();
    }

    public function save(TypeStanok $tp)
    {
        if ($tp->validate()) {
            if ($tp->type_id == 0) {
                return $this->insert($tp);
            } else {
                return $this->update($tp);
            }
        }
        return false;
    }
    private function insert(TypeStanok $tp){
        $name = $this->db->quote($tp->name);
        if ($this->db->exec("INSERT INTO type_stanok(name)"
                . " VALUES($name)") == 1) {
            $tp->type_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(TypeStanok $tp){
        $name = $this->db->quote($tp->name);
        if ( $this->db->exec("UPDATE type_stanok SET name = $name,". " WHERE type_id = ".$tp->type_id) == 1) {
            return true;
        }
        return false;
    }

    public function count()
    {
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM type_stanok");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT type_stanok.type_id,type_stanok.name"
            . " FROM type_stanok LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function arrType()
    {

        $res = $this->db->query("SELECT type_id AS id, name AS value FROM type_stanok");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}