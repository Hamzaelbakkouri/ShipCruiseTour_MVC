<?php

class ship extends database{
    protected $db;
    function __construct() {
        $this->db = new Database;
    }
    
    function getship(){
        $this->db->query("SELECT `id_n`, `nom`, `nbr_ch`, `nbr_place` FROM `navire`");
        $data = $this->db->resultset();
        return $data;
    }

    function gatNavire(){
        $sql = "SELECT `id_n`, `nom`, `nbr_ch`, `nbr_place` FROM `navire`";
        $stmt=$this->db->query($sql);
        $data=$stmt->db->resultset();
        return $data;
    }

    public function addship($data){
        $this->db->query("INSERT INTO `navire` (nom, nbr_ch, nbr_place) values(:n , :ch_num , :place_num)");
        $this->db->bind(":n", $data['name']);
        $this->db->bind(":ch_num", $data['num_room']);
        $this->db->bind(":place_num", $data['num_place']);
        
        if ($this->db->execute())
            return 'ok';
    }

    public function deletenavire($id_navire){
        $stmt=$this->db->prepare("DELETE FROM `navire` WHERE id_n=:id_navire");
        $stmt->bind(':id_navire',$id_navire);
        if($stmt->execute()){
            return true;
        };
    }



}