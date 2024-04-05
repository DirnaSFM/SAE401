<?php  
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    // Récupère toutes les données de la table PANIER
    function getAllUser() {
        $host = "devbdd.iutmetz.univ-lorraine.fr";
        $username = "varon1u_appli";
        $mdp = "TOCtoc12";
        $db_name = "varon1u_SAE401SAH"; 
    
        $connexion = mysqli_connect($host,$username,$mdp,$db_name);
        $requete = mysqli_query($connexion,"SELECT * FROM PANIER");
    
        $json_array = array();
        while($row = mysqli_fetch_assoc($requete)) {
            $json_array[] = $row;
        }
    
        return json_encode($json_array);
    }

    // Récupère le panier d'un utilisateur
    function getPanierByIdUser(string $id_user) {
        $host = "devbdd.iutmetz.univ-lorraine.fr";
        $username = "varon1u_appli";
        $mdp = "TOCtoc12";
        $db_name = "varon1u_SAE401SAH"; 
    
        $connexion = mysqli_connect($host,$username,$mdp,$db_name);
        $requete = mysqli_query($connexion,"SELECT * FROM FAVORIS WHERE id_favoris = '".$id_user."'");
    
        $json_array = array();
        while($row = mysqli_fetch_assoc($requete)) {
            $json_array[] = $row;
        }
    
        return json_encode($json_array);
    }
?>