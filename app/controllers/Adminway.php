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
            if(isset($_POST['submit'])){
                if(isset($_POST['admin'])){
                    $email = $_POST['user_email'];
                    $password = $_POST['user_password'];
                    $login = new admin;
                    $login->loginAdmin($email,$password);
                }
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
}
?>
