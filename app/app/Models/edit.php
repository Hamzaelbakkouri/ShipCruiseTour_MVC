<?php 

class edit {
    function edit($nom,$price,$category,$qanti,$ID){
        $test = new connection;
        $conn = $test->connection();
        $sql ="UPDATE  `products` SET `label`='$nom',`quantity`=$qanti,`price`=$price ,`id-category`=$category  WHERE `id-product`=$ID" ;
        $resultat = mysqli_query($conn,$sql);
        return $resultat;
    }
    function list($ID){
        $test = new connection;
        $conn = $test->connection();
        $sql="SELECT * FROM `products` WHERE `id-product` =$ID LIMIT 1";
        $resultat = mysqli_query($conn,$sql);
        return $resultat;
    }
    function category(){
        $test = new connection;
        $conn = $test->connection();
        $ret = mysqli_query($conn, "SELECT * FROM `category`");
        return $ret;
    }
}