<?php
class Adminway extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('admin');
    }
    public function index()
    {
        redirect('index');
    }

    
        function loginController(){
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
                    $this->createadminSession($loggedInUser);
                    
                  }
                  else {
                    // Load View
                    $this->view('pages/cruisedash', $data);
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


    public function admin(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['namecr']),
                'img' => trim($_POST['img']),
                'prix' => trim($_POST['price']),
                'nbr' => trim($_POST['num_night']),
                'port' => trim($_POST['ports']),
                'dated' => trim($_POST['date_depart']),
            ];

            if($this->userModel->addcruise($data)){
                // Redirect to login
                flash('ading_success');
                redirect('pages/cruisedash');
              } else {
                die('Something went wrong');
              }
              {
                $this->view('dashboard/addcruise', $data);
              }
            
            }
            
    }
    public function createadminSession($user){
        $_SESSION['id'] = $user->id_admin;
        $_SESSION['email'] = $user->email;
        redirect('pages/cruisedash');
      }
  
      // Logout & Destroy Session
      public function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        session_destroy();
        redirect('pages/cruise');
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

?>
