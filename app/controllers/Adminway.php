<?php
class Adminway extends Controller
{
  protected $adminModel;


    public function __construct()
    {
        $this->adminModel = $this->model('admin');
    }
    public function index()
    {
        redirect('pages/index');
    }

    
        function loginController(){
            if($this->isLoggedIn()){
                redirect('pages/cruisedash');
              }
        
              // Check if POST
              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST
                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [       
                  'email' => trim($_POST['emailadm']),
                  'password' => trim($_POST['passadm']),
                  'email_err' => '',
                  'password_err' => '',
                ];
                  // Check and set logged in user
                  $loggedInUser = $this->adminModel->loginAdmin($data['email'], $data['password']);
        
                  if($loggedInUser){
                    // User Authenticated!
                    // $this->view('pages/cruise', $data);
                    $this->createadminSession($loggedInUser);
                    
                  }
                  else {
                    // Load View
                    $this->view('pages/index', $data);
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

            if($this->adminModel->addcruise($data)){
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
        $_SESSION['id_admin'] = $user->id_u;
        $_SESSION['email_admin'] = $user->email;
        // redirect()
      }
  
      // Logout & Destroy Session
      public function logout(){
        unset($_SESSION['id_admin']);
        unset($_SESSION['email_admin']);
        session_destroy();
        redirect('pages/loginadmin');
      }
  
      // Check Logged In
      public function isLoggedIn(){
        if(isset($_SESSION['id_admin'])){
          return true;
        } else {
          return false;
        }
      }
}

?>