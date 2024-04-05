<?php  
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    // Récupère toutes les données de la table MATERIEL
    function getAllUser() {
        $host = "devbdd.iutmetz.univ-lorraine.fr";
        $username = "varon1u_appli";
        $mdp = "TOCtoc12";
        $db_name = "varon1u_SAE401SAH";  
    
        $connexion = mysqli_connect($host,$username,$mdp,$db_name);
        $requete = mysqli_query($connexion,"SELECT * FROM MATERIEL");
    
        $json_array = array();
        while($row = mysqli_fetch_assoc($requete)) {
            $json_array[] = $row;
        }
    
        return json_encode($json_array);
    }

    // Récupère un matériel à l'aide de son id
    function getMaterielById(string $id_materiel) {
        $host = "devbdd.iutmetz.univ-lorraine.fr";
        $username = "varon1u_appli";
        $mdp = "TOCtoc12";
        $db_name = "varon1u_SAE401SAH"; 
    
        $connexion = mysqli_connect($host,$username,$mdp,$db_name);
        $requete = mysqli_query($connexion,"SELECT * FROM MATERIEL WHERE id_materiel = '".$id_materiel."'");
    
        $json_array = array();
        while($row = mysqli_fetch_assoc($requete)) {
            $json_array[] = $row;
        }
    
        return json_encode($json_array);
    }
?>