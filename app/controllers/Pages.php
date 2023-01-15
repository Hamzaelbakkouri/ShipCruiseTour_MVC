<?php
class Pages extends Controller
{
  
  public function __construct()
  {
    $this->port =$this->model('Port');
    $this->ship =$this->model('Ship');
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
  // public function portdash()
  // {
  //   $this->view('pages/portdash',$data);
  // }
  public function naviredash()
  {

    $this->view('pages/naviredash',$data);
  }
  public function cruisedash()
  {
      $this->view('pages/cruisedash',$data);
    
  }
  public function register()   
  {

    $this->view('pages/register');
  }
  public function cruise()
  {
    
    // var_dump($_SESSION);
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


  //functios 
  
  public function portdash(){
    
        $data=$this->port->getPorts();
        $this->view('pages/portdash',$data);
}

  public function shipdash(){
    
        $data=$this->ship->getship();
        $this->view('pages/naviredash',$data);
}

}