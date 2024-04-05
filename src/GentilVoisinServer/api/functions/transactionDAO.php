<?php  
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    // Récupère toutes les données de la table TRANSACTION
    function getAllUser() {
    $host = "devbdd.iutmetz.univ-lorraine.fr";
    $username = "varon1u_appli";
    $mdp = "TOCtoc12";
    $db_name = "varon1u_SAE401SAH"; 

    $connexion = mysqli_connect($host,$username,$mdp,$db_name);
    $requete = mysqli_query($connexion,"SELECT * FROM TRANSACTION");

    $json_array = array();
    while($row = mysqli_fetch_assoc($requete)) {
        $json_array[] = $row;
    }

    return json_encode($json_array);
    }

    // Récupère une transaction à l'aide de son id
    function getTransactionByIdTransaction(string $id_transaction) {
        $host = "devbdd.iutmetz.univ-lorraine.fr";
        $username = "varon1u_appli";
        $mdp = "TOCtoc12";
        $db_name = "varon1u_SAE401SAH"; 
    
        $connexion = mysqli_connect($host,$username,$mdp,$db_name);
        $requete = mysqli_query($connexion,"SELECT * FROM FAVORIS WHERE id_transaction = '".$id_transaction."'");
    
        $json_array = array();
        while($row = mysqli_fetch_assoc($requete)) {
            $json_array[] = $row;
        }
    
        return json_encode($json_array);
    }

    // Récupère les transactions d'un utilisateur
    function getTransactionByIdUser(string $id_user) {
        $host = "devbdd.iutmetz.univ-lorraine.fr";
        $username = "varon1u_appli";
        $mdp = "TOCtoc12";
        $db_name = "varon1u_SAE401SAH"; 
    
        $connexion = mysqli_connect($host,$username,$mdp,$db_name);
        $requete = mysqli_query($connexion,"SELECT * FROM FAVORIS WHERE id_user = '".$id_user."'");
    
        $json_array = array();
        while($row = mysqli_fetch_assoc($requete)) {
            $json_array[] = $row;
        }
    
        return json_encode($json_array);
    }
?>