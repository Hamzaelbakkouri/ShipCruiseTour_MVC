<?php 

class Product
{
    function list(){
        $test = new connection;
        $conn = $test->connection();
        $sql="SELECT * FROM `products`";
        $resultat = mysqli_query($conn,$sql);
        return $resultat;
    }

}