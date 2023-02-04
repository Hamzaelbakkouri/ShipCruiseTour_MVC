<?php
  class Pages extends Controller {
    protected $pagesModel;

    public function __construct(){
      $this->pagesModel = $this->model('client');
    }
    
    public function index(){
     
      $this->view('pages/index');
    }

    public function about(){

      $this->view('pages/about');
    }

    public function reservations(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'reservation' => $_POST['reservation'],
        ];

        if($this->pagesModel->addRoom($data)){
          redirect('admins/dashboard');
      }else{
          echo 'error adding ship';
      }

        if($this->pagesModel->addType($data)){
            redirect('admins/dashboard');
        }else{
            echo 'error adding ship';
        }

    }else{
      $product =  $this->pagesModel->displayReservations();
      $type = $this->pagesModel->getRoomType();

        $data = [
          'product' => $product,
          'roomType' => $type
      ];


        $this->view('pages/reservations', $data);
    }





      $product =  $this->pagesModel->displayReservations();
      $type = $this->pagesModel->getRoomType();



        $data = [
            'product' => $product,
            'roomType' => $type
        ];
        $this->view('pages/reservations', $data);


    }
    public function contact(){

      $this->view('pages/contact');
    }
  }