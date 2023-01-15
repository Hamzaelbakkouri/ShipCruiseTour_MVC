<?php

class Port extends database{
    protected $db;
    function __construct() { 
        $this->db = new Database;
    }

    function getPorts(){
        $this->db->query("SELECT `id_p`, `nom`, `pays` FROM `port`");
        $data = $this->db->resultset();
        return $data;
    }

    function addport($data){
        $this->db->query("INSERT INTO `port` (pays,nom) values (:p,:place)");
        $this->db->bind(":p", $data['pays']);
        $this->db->bind(":place", $data['place']);

        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }

    function deleteport($id_p){
        $stmt=$this->db->query("DELETE FROM `port` WHERE id_p=:id_p");
        if($stmt->execute()){
            return true;
        };
    }

}