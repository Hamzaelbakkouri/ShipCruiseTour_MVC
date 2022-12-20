<?php

class addNew {
    function addNew($nom,$qanti,$price,$image,$category){
        
        $test = new connection;
        $conn = $test->connection();
        $sql = "INSERT INTO `products` (`label`, `quantity`, `price`, `img`, `id-category`) VALUES ( '$nom', '$qanti', '$price', '$image', '$category');";
        $resultat = $conn->prepare($sql);
        $resultat->execute() or die("Erreur lors de l'execution de la requete: ");
        if($resultat){
        }

    }
}