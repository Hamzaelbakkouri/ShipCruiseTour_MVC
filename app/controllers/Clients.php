<?php
  class Clients extends Controller {
    protected $clientModel;

    public function __construct(){
        $this->clientModel = $this->model('Client');
    }
    
    public function home(){
     
      $this->view('clients/home');
    }

    public function about(){

      $this->view('clients/about');
    }

    public function reservations(){

      $this->view('pages/reservations');
    }
    public function myreservations(){

      $this->view('clients/myreservations');
    }
    public function contact(){

      $this->view('pages/contact');
    }
  }