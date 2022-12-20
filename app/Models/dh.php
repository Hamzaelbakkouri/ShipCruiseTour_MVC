<?php

class dh {
    function dh(){
        $test = new connection;
        $conn = $test->connection();
        $sql="SELECT * FROM `products`";
        $resultat = mysqli_query($conn,$sql);
        return $resultat;
    }
    function aff($cat){
        $test = new connection;
        $conn = $test->connection();
        $ret = mysqli_query($conn, "SELECT * FROM `category` WHERE `id`= $cat");
        return $ret;
    }
    function search($name){
        $test = new connection;
        $conn = $test->connection();
        $sql = "SELECT * from products WHERE label LIKE '%".$name."%'";
        $resultat = mysqli_query($conn,$sql);
        return $resultat;
    }
}