<?php

class Ports extends Controller
{
    function __construct()
    {
        $this->port=$this->model('Port');
    }

    public function addport()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $data = [
                'pays' => trim($_POST['pays']),
                'place' => trim($_POST['nom']), 
            ];
            if($this->port->addport($data)==TRUE)
            {
                header('Location:../pages/portdash');
                exit();
            }
        }
    }

    public function deleteport($id_p)
    {
        if($this->port->deleteport($id_p)==true)
        {
            header('Location:'.URLROOT.'/pages/portdash');
            
        }
    }
}