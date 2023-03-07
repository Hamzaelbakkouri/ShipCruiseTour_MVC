<?php

class ship
{

    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }



    public function getship()
    {
        $stmt = $this->db->query("SELECT * FROM navire");
        $stmt->execute();
        return $this->db->fetchAll();
    }


    public function insertship($name, $rooms, $places)
    {
         $sql =("INSERT INTO navire(name, rooms_number, places_number) VALUES (:name, :rooms, :places) ");
         $this->db->query($sql);
         $this->db->bind(':name', $name);
         $this->db->bind(':places', $rooms);
         $this->db->bind(':rooms', $places);
         $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_ship($id)
    {
        $sql = "DELETE FROM `navire` WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
}
