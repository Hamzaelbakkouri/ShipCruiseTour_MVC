<?php
  class Admins extends Controller {
    protected $adminModel;

    public function __construct(){
        $this->adminModel = $this->model('Admin');
    }

    
    public function dashboard(){
        $product =  $this->adminModel->getcruise();

        $data = [
            'product' => $product
        ];
        $this->view('admins/dashboard', $data);
    }


    public function addport(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'portname' => trim($_POST['portname']),
                'country' => trim($_POST['country']),
            ];

            if($this->adminModel->addport($data)){
                redirect('admins/dashboard');
            }else{
                echo 'error adding port';
            }

        }else{
            $data = [
                'portname' => '',
                'country' => '',
            ];

            $this->view('admins/addport', $data);
        }
    }


    public function addship(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'rooms' => trim($_POST['rooms']),
                'places' => trim($_POST['places']),
            ];

            if($this->adminModel->addship($data)){
                redirect('admins/dashboard');
            }else{
                echo 'error adding ship';
            }

        }else{
            $data = [
                'name' => '',
                'rooms' => '',
                'places' => '',
            ];

            $this->view('admins/addship', $data);
        }
    }


    public function addcruise(){


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "./uploads/" . $filename;


            $itinerary = implode(',' ,$_POST['itinerary']);


            $data = [
                'image' => $filename,
                'title' => trim($_POST['title']),
                'departuredate' => trim($_POST['departuredate']),
                'departureport' => trim($_POST['departureport']),
                'duration' => trim($_POST['duration']),
                'ship' => trim($_POST['ship']),
                'destination' => trim($_POST['destination']),
                'itinerary' => $itinerary,
            ];

            move_uploaded_file($tempname, $folder);


            if($this->adminModel->addcruise($data)){
                redirect('admins/dashboard');
            }else{
                echo 'error adding cruise';
                die();
            }

        }else{

            $product =  $this->adminModel->getport();
            $ship =  $this->adminModel->getship();



            $data = [
                'title' => '',
                'departuredate' => '',
                'departureport' => '',
                'name' => '',
                'duration' => '',
                'destination' => '',
                'Itinerary' => '',
                'product' => $product,
                'ship' => $ship,
            ];

            $this->view('admins/addcruise', $data);
        }

    }
    

    public function deletecruise($idcruise)
    {
        $this->adminModel->deletecruise($idcruise);
        redirect('admins/dashboard');
    }


    public function addRoom(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'shipname' => trim($_POST['shipname']),
                'roomnumber' => trim($_POST['roomnumber']),
                'roomtype' => trim($_POST['roomtype']),
            ];

            if($this->adminModel->addRoom($data)){
                redirect('admins/dashboard');
            }else{
                echo 'error adding ship';
            }

        }else{
            $product =  $this->adminModel->getship();
            $type =  $this->adminModel->getType();

            $data = [
                'shipname' => '',
                'roomnumber' => '',
                'roomtype' => '',
                'product' => $product,
                'type' => $type,
            ];


            $this->view('admins/addRoom', $data);
        }
    }


    public function addRoomType(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'type' => trim($_POST['type']),
                'capacity' => trim($_POST['capacity']),
                'price' => trim($_POST['price']),

            ];

            if($this->adminModel->addType($data)){
                redirect('admins/dashboard');
            }else{
                echo 'error adding ship';
            }

        }else{
            $product =  $this->adminModel->getship();
            $type =  $this->adminModel->getType();

            $data = [
                'type' => '',
                'capacity' => '',
                'price' => '',
            ];


            $this->view('admins/addRoomType', $data);
        }
    }
    

  }