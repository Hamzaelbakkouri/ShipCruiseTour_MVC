<?php
  class Users extends Controller{
    
    protected $userModel;
    
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index(){
      redirect('index');
    }
    
    public function register(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('login');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'name' => trim($_POST['nameregi']),
          'email' => trim($_POST['emailregi']),
          'password' => trim($_POST['passregi']),
         
        ];
        

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        //Execute
        if($this->userModel->register($data)){
            // Redirect to login
            flash('register_success', 'You are now registered and can log in');
            redirect('pages/login');
          } else {
            die('Something went wrong');
          }
        } 
        else {
          // Load View
          $this->view('pages/register');   
        }{
          // IF NOT A POST REQUEST

        // Init data
        $data = [
          'name' => '',
          'email' => '',
          'password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
        ];
        
        // Load View
        $this->view('pages/register', $data);
      }
    }
    
    
    public function login(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('cruise');
      }
      
      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'email' => trim($_POST['emailuse']),
          'password' => trim($_POST['passuse']),
          'email_err' => '',
          'password_err' => '',
        ];
        
        
        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);
        // var_dump($data);
            if($loggedInUser){
            // User Authenticated!
            // $this->view('pages/cruise', $data);
            $this->createUserSession($loggedInUser);
            
          }
          else {
            // Load View
            $this->view('pages/login', $data);
          }
        
        } else {
            // If NOT a POST

            // Init data
            $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
        ];
      
        // Load View
        $this->view('Users/login');
      }
    }
    
    
    
    // Create Session With User Info
      public function createUserSession($user){
       $_SESSION['id'] = $user->id_u;
       $_SESSION['email'] = $user->email;
       $_SESSION['name'] = $user->Fname;
       redirect('pages/cruise');
       
      }
      // Logout & Destroy Session
      public function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['name']);
          session_destroy();
          redirect('pages/login');
        }
        
        // Check Logged In
        public function isLoggedIn(){
            if(isset($_SESSION['id'])){
              return true;
            } else {
              return false;
            }
          }
        }