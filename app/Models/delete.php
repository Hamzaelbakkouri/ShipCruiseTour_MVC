<?php

class delete {
    function delete($ID){
        $test = new connection;
        $conn = $test->connection();
        $sql="DELETE FROM `products` WHERE `id-product`=$ID";
        $resultat = mysqli_query($conn,$sql);
        if ($resultat) {
            header("Location:dachBoard");
        }
    }
}
