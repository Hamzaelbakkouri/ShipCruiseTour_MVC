<?php
  class Users extends Controller {
    protected $userModel;

    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST);

        // Init data
        $data =[
          'firstName' => trim($_POST['firstName']),
          'lastName' => trim($_POST['lastName']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'firstName_err' => '',
          'lastName_err' => '',
          'email_err' => '',
          'password_err' => '',
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }

        // Validate Name
        if(empty($data['firstName'])){
          $data['firstName_err'] = 'Pleae enter your first name';
        }

        if(empty($data['lastName'])){
          $data['lastName_err'] = 'Pleae enter your last name';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['firstName_err']) && empty($data['password_err']) && empty($data['lastName_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'firstName' => '',
          'lastName' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'firstName_err' => '',
          'lastName_err' => '',
          'email_err' => '',
          'password_err' => '',
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',  
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['idusers'] = $user->idusers;
      $_SESSION['email'] = $user->email;
      $_SESSION['firstName'] = $user->firstName;
      $_SESSION['lastName'] = $user->lastName;
      $_SESSION['role'] = $user->role;
      if($user->role == 0){
        redirect('admins/dashboard');
      }else{
        redirect('clients/home');
      }
    }

    public function logout(){
      unset($_SESSION['idusers']);
      unset($_SESSION['email']);
      unset($_SESSION['firstName']);
      unset($_SESSION['lastName']);
      unset($_SESSION['role']);
      session_destroy();
      redirect('users/login');
    }

    public function isLoggedIn(){
      if(isset($_SESSION['idusers'])){
        return true;
      } else {
        return false;
      }
    }
  }