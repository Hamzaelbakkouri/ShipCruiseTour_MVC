<?php 

class HomeController{
     function __construct ()
    {
        session_start();
        require "../autoloader.php";
    }
    public function index0($page){
        if($_SESSION['admin']==null){
            header("location: login");
        }
        header("location:dachBoard");
    }
    public function index($page){
        if($_SESSION['user']==null){
            if(isset($_SESSION['admin'])){
                header("location: dachBoard");
            }else{
                header("location: login");
            }
        }
        include('../app/Views/'.$page.'.php');
    }
    public function jewellery($page){
        if($_SESSION['user']==null){
            header("location: login");
        }
          $prod = new product;
          $resultat=$prod->list();
          include('../app/Views/'.$page.'.php');
    }
    public function noAccess($page){
        if($_SESSION['admin']==null){
            header("location: login");
        }
        $cat = new edit;
        $ret=$cat->category();
        include('../app/Views/noAccess.php');
    }
    public function dh($page){
        if($_SESSION['admin']==null){
            header("location: login");
        }
        require("../app/Models/dh.php");
        $test = new dh;
        $resultat = $test->dh();
        if(isset($_POST['search'])){
            $name = $_POST['search'];
            if($name===""){
                header("location: dachBoard");
            }else{
                $resultat = $test->search($name);
            }
        }
        include('../app/Views/'.$page.'.php');
    }
    public function addNew(){
        if($_SESSION['admin']==null){
            header("location: login");
        }
        require("addNewController.php");
        $cat = new edit;
        $ret=$cat->category();
        require("../app/Views/addNew.php");
        $test = new addNewController;
        $test->addNewController();
    }
    public function edit($ID){
        if($_SESSION['admin']==null){
            header("location: login");
        }
        require("editController.php");
        $list = new edit;
        $resultat=$list->list($ID);
        $cat = new edit;
        $ret=$cat->category();
        require("../app/Views/editpage.php");
        $test = new editController;
        $test->editController($ID);
    }
    function delete($ID){
        $del= new delete;
        $del->delete($ID);
    }
    function signup(){
        require("signupController.php");
        require("../app/Views/signuppage.php");
        $sign = new signupcontrol;
        $sign->signupcontrol();
    }
    function login(){
        require("loginController.php");
        if((isset($_SESSION['admin'])) OR (isset($_SESSION['user']))){
            require("disconnect.php");
            $dis = new disconnect;
            $dis->disconnect();
        }
        require("../app/Views/login.php");
        $login = new loginController;
        $login->loginController();
    }
    function disconnect(){
        require("disconnect.php");
        $dis = new disconnect;
        $dis->disconnect();
    }
}
?>