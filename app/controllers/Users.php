<?php
  class Users extends Controller{
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
          // 'name_err' => '',
          // 'email_err' => '',
          // 'password_err' => '',
          // 'confirm_password_err' => ''
        ];

        // Validate email
        // if(empty($data['email'])){
        //     $data['email_err'] = 'Please enter an email';
        //     // Validate name
        //     if(empty($data['name'])){
        //       $data['name_err'] = 'Please enter a name';
        //     }
        // } else{
        //   // Check Email
        //   if($this->userModel->findUserByEmail($data['email'])){
        //     $data['email_err'] = 'Email is already taken.';
        //   }
        // }

        // Validate password
        // if(empty($data['passregi'])){
        //   $password_err = 'Please enter a password.';     
        // } elseif(strlen($data['passregi']) < 6){
        //   $data['password_err'] = 'Password must have atleast 6 characters.';
        // }

        // Validate confirm password
        // if(empty($data['confirm_password'])){                         
        //   $data['confirm_password_err'] = 'Please confirm password.';     
        // } else{
        //     if($data['password'] != $data['confirm_password']){
        //         $data['confirm_password_err'] = 'Password do not match.';
        //     }
        // }
         
        // Make sure errors are empty
        // if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // SUCCESS - Proceed to insert


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
        $this->view('users/login', $data);
      }
    }

    // Create Session With User Info
    public function createUserSession($user){
      $_SESSION['id_u'] = $user->id;
      $_SESSION['Email'] = $user->email;
      $_SESSION['FName'] = $user->name;
      redirect('pages/cruise');
    }

    // Logout & Destroy Session
    public function logout(){
      unset($_SESSION['emailuse']);
      unset($_SESSION['emailuse']);
      session_destroy();
      redirect('pages/login');
    }

    // Check Logged In
    public function isLoggedIn(){
      if(isset($_SESSION['id_u'])){
        return true;
      } else {
        return false;
      }
    }
  }