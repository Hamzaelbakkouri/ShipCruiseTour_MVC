<?php
ob_start();
require_once '../app/Controllers/HomeController.php';
$home = new HomeController();
$pages = ['home', 'about', 'contact'];
if(isset($_GET['page'])){
    if($_GET['page']==="jewellery"){
        $page = $_GET['page'];
        $home->jewellery($page);
    }elseif($_GET['page']==="dachBoard"){
        $page = $_GET['page'];
        $home->dh($page);
    }elseif($_GET['page']==="disconnect"){
        $home->disconnect();
    }elseif($_GET['page']==="signuppage"){
        $home->signup();
    }elseif($_GET['page']==="login"){
        $home->login();
    }elseif($_GET['page']==="addNew"){
        $home->addNew();
    }elseif(strlen($_SERVER['REQUEST_URI'])===strlen("/public/editpage")){
        header('location: dachBoard');
    }elseif(strlen($_SERVER['REQUEST_URI'])===strlen("/public/delete")){
        header('location: dachBoard');
    }elseif(strpos($_GET['page'], "editpage") !== false){
        $ID = str_replace("/public/editpage?id-product=","",$_SERVER['REQUEST_URI']);
        $home->edit($ID);
    }elseif(strpos($_GET['page'], "delete") !== false){
        $ID = str_replace("/public/delete?id-product=","",$_SERVER['REQUEST_URI']);
        $home->delete($ID);
    }
    elseif(in_array($_GET['page'],$pages)){
        $page = $_GET['page'];
        $home->index($page);
    }else{
        $home->index0('dachBoard');
    }
}else{
    $home->index0('dachBoard');
}
?>