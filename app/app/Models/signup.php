<?php

class signup {
    function signup($email,$password){
        $test = new connection;
        $conn = $test->connection();
        
           if($conn->connect_error){
           die('conection failed :'.$conn->connect_error);
           echo "error";
           }else{
           mysqli_query($conn,"INSERT INTO `users` (`email`, `password`) VALUES ('$email','$password')");
           header("Location: login");
           }
    }
    
}