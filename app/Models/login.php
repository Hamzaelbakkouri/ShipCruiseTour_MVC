<?php session_start()?>
<?php

class login {
    function loginAdmin($email,$password){
        $test = new connection;
        $conn = $test->connection();
        $admin = $conn->prepare("SELECT * FROM `admin` WHERE `email`= ? and `password`= ?");
        $admin->execute([$email,$password]);
        $row =  $admin->fetch();
        if(isset($row)){
        $name = str_replace("@gmail.com","",$email);
        $_SESSION['admin'] = $name;
        header("Location: dachBoard");
        }else{
            header("location:login");            
        }            
    }
    function loginUser($email,$password){
        $test = new connection;
        $conn = $test->connection();
        $sql = "SELECT * FROM `users`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        if($email == $row["email"] && md5($password) == $row["password"]){
        $name = str_replace("@gmail.com","",$email);
        $_SESSION['user'] = $name;
        $_SESSION['id'] = $row["id"];
        header("Location: home");
        }else{
            header("location:login");            
        }
        }
        }
    }
}
