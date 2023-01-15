<?php

class Navire extends Controller
{
    function __construct()
    {
        $this->port=$this->model('ship');
    }
    

    public function addship()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $data = [
                'name' => trim($_POST['name_ship']),
                'num_room' => trim($_POST['num_room']),
                'num_place' => trim($_POST['num_place']),
            ];
            if($this->port->addship($data)==TRUE)
            {
                header('Location:../pages/naviredash');
                exit();
            }
        }
    }

    public function deleteship($id_p)
    {
        if($this->port->deleteship($id_p)==true)
        {
            header('Location:'.URLROOT.'/pages/naviredash');
            
        }
    }
}