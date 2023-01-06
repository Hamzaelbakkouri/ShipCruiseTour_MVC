<?php
class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {

    $this->view('pages/index');
  }

  public function about()
  {

    $this->view('pages/about');
  }
  public function login()
  {

    $this->view('pages/login');
  }
  public function loginadmin()
  {

    $this->view('pages/loginadmin');
  }
  public function portdash()
  {

    $this->view('pages/portdash');
  }
  public function naviredash()
  {

    $this->view('pages/naviredash');
  }
  public function cruisedash()
  {

    $this->view('pages/cruisedash');
  }
  public function register()   
  {

    $this->view('pages/register');
  }
  public function cruise()
  {
    if(isset($_SESSION['name'])&&isset($_SESSION['email'])){
      $this->view('pages/cruise');
    }else{
      
      $this->view('pages/login');
    }
  }

  // dashboards

  public function addcruise(){
    if(isset($_SESSION['name'])&&isset($_SESSION['email'])){
      $this->view('dashboard/addcruise');
    }else{
      $this->view('pages/loginadmin');
    }
    
  } 
  public function addport(){

    $this->view('dashboard/addport');
  }
  public function addship(){

    $this->view('dashboard/addship');
  }

}
