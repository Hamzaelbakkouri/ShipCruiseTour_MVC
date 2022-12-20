<?php

class loginController {
    function loginController(){
        if(isset($_POST['submit'])){
            if(isset($_POST['admin'])){
                $email = $_POST['user_email'];
                $password = $_POST['user_password'];
                $login = new login;
                $login->loginAdmin($email,$password);
            }else{
                $email = $_POST['user_email'];
                $password = $_POST['user_password'];
                $login = new login;
                $login->loginUser($email,$password);
            }
        }     
    }
}