<?php
class Cruise
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }


    public function getCruises()
    {
        $this->db->query("SELECT cruise.*, port.name as start_port FROM cruise  inner join port where cruise.start_port = port.id AND `start_date` > NOW() ");
        $this->db->execute();
        return $this->db->fetchAll();
    }

    function addtrajet($id_croi, $id_port)
    {
        $sql = "INSERT INTO `road` (`ID_port`, `ID_cruise`) VALUES ( '$id_port','$id_croi')";
        $stmt = $this->db->query($sql);
        $stmt->execute();
    }

    function gettrajet($param)
    {
        $this->db->query("SELECT * FROM `road` r INNER JOIN `port` p ON r.ID_port = p.id WHERE r.ID_cruise = :id");
        $this->db->bind(':id' , $param);
        $this->db->execute();
        return $this->db->fetchAll();
    }

    public function getCruise($id)
    {
        $this->db->query("SELECT * FROM cruise WHERE ID_cruise=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->fetch();
    }



    public function insertCruise($name, $ship, $price, $picture, $nights, $ports, $date, $trajet)
    {


        $this->db->query("INSERT INTO `cruise` (`name`, `ship`, `price`,`picture`, `nights_number` ,`start_port`, `start_date`)
        VALUES(:name,:ship,:price,:picture,:nights,:start_port,:start_date)");
        $this->db->bind(':name', $name);
        $this->db->bind(':ship', $ship);
        $this->db->bind(':price', $price);
        $this->db->bind(':picture', $picture);
        $this->db->bind(':nights', $nights);
        $this->db->bind(':start_port', $ports);
        $this->db->bind(':start_date', $date);

        if ($this->db->execute()) {
            $sql = "SELECT MAX(ID_cruise) AS LastId FROM `cruise` limit 1";
            $stmt = $this->db->query($sql);
            $this->db->execute();

            $data = $stmt->fetch();
            for ($i = 0; $i < count($trajet); $i++) {
                $this->addtrajet($data['LastId'], $trajet[$i]);
            }
            return true;
        };
    }

    public function deletecruise($id)
    {

        $this->db->query("DELETE FROM cruise WHERE ID_cruise=:id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function search($param)
    {
        $sql = "SELECT * FROM `cruise` WHERE $param AND `start_date` > NOW() ";
        $this->db->query($sql);
        $this->db->execute();
        $result = $this->db->fetchAll();
        return $result;
    }

}
