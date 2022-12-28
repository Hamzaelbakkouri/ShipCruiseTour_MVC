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

    $this->view('pages/cruise');
  }

  // dashboards

  public function addcruise($data){

    $this->view('dashboard/addcruise',$data);
  } 
  public function addport(){

    $this->view('dashboard/addport');
  }
  public function addship(){

    $this->view('dashboard/addship');
  }

}
