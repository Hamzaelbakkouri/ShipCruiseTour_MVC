<?php

class admin
{
    public function __construct(){
        $this->db = new Database;

      }

    function loginAdmin($email,$password){
        $this->db->query("SELECT * FROM `admin` WHERE `email`= ? and `password`= ?");
        $row = $this->db->resultset([$email,$password]);
        // $row =  $admin->fetch();
        if(isset($row)){
        $name = str_replace("@gmail.com","",$email);
        $_SESSION['admin'] = $name;
        redirect('cruisedash');
        }else{
            redirect('loginadmin');
        }
    }

    public function addCruise($data)
    {
        $this->db->query("INSERT INTO croisiere(prix_cruise, image, `nb_nuit`, `port_depart`, `date-depart`) values
        (:prix, :img, :nbrNuits, :portD, :dateD)");
        // $this->db->query("INSERT INTO port(id_cruise, id_port) values(:id_c, :id_p)");
        // $this->db->bind(":id_c",     $data['id_c']);
        $this->db->bind(":prix",     $data['prix']);
        $this->db->bind(":img",      $data['img']);
        $this->db->bind(":nbrNuits", $data['nbr']);
        $this->db->bind(":portD",    $data['port']);
        $this->db->bind(":dateD",    $data['dated']);
        // $this->db->bind(":titre",    $data['name']);
        

        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }

    public function deleteCruise($id)
    {

        $this->db->query("DELETE from croisiere where id_croisiere = :id");
        $this->db->bind(":id", $id);
        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }

    public function updateCruise($data)
    {
        $this->db->query("UPDATE croisiere SET id_navire = :id_n, prix = :prix, image = :img, nbrNuits = :nbrNuits, portDepart = :portD, itenairaire = :iten, dateDepart = :dateD, titre = :titre where id_croisiere = :id_c");
        $this->db->bind(":id_c", $data['id_c']);
        $this->db->bind(":prix", $data['prix']);
        $this->db->bind(":id_n", $data['id_n']);
        $this->db->bind(":img", $data['img']);
        $this->db->bind(":nbrNuits", $data['nbr']);
        $this->db->bind(":portD", $data['port']);
        $this->db->bind(":iten", $data['iten']);
        $this->db->bind(":dateD", $data['date']);
        $this->db->bind(":titre", $data['titre']);

        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }

    public function addPort($data)
    {
        $this->db->query("INSERT INTO port(id_port, nom, pays) values (:id, :n, :p)");
        $this->db->bind(":id", $data['id']);
        $this->db->bind(":n", $data['nom']);
        $this->db->bind(":p", $data['p']);

        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }

    public function deletePort($id)
    {
        $this->db->query("DELETE from port where id_port = :id");
        $this->db->bind(":id", $id);

        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }

    public function updatePort($data)
    {
        $this->db->query("UPDATE port SET nom = :n, pays = :p where id_port = :id");
        $this->db->bind(":id", $data['id']);
        $this->db->bind(":n", $data['nom']);
        $this->db->bind(":p", $data['p']);

        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }

    public function addShip($data)
    {
        $this->db->query("INSERT INTO navire(id_navire, nom, nbrChambre, nbrPlace) values(:id, :n, :nc, :np)");
        $this->db->bind(":id", $data['id']);
        $this->db->bind(":n", $data['nom']);
        $this->db->bind(":nc", $data['nc']);
        $this->db->bind(":np", $data['np']);

        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }

    public function deleteShip($id)
    {
        $this->db->query("DELETE FROM navire where id_navire = :id");
        $this->db->bind(":id", $id);
        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }

    public function updateShip($data)
    {
        $this->db->query("UPDATE navire set nom = :n, nbrChambre = :nc, nbrPlace = :np where id_navire = :id");
        $this->db->bind(":id", $data['id']);
        $this->db->bind(":n", $data['nom']);
        $this->db->bind(":nc", $data['nc']);
        $this->db->bind(":np", $data['np']);

        if ($this->db->execute())
            return 'ok';
        else
            return 'error';
    }
}

?>