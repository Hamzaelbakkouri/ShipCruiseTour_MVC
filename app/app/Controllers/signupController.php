<?php

class signupcontrol {
    function signupcontrol(){
        if(isset($_POST['submit'])){
            $email = $_POST['user_email'];
            $password = md5($_POST['user_password']);
            $signup = new signup;
            $signup->signup($email,$password);
        }
    }
}
