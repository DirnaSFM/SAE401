<?php  
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    // id_favori	id_user	id_mat	id_service	date_ajout
    // Récupère toutes les données de la table FAVORIS
    function getAllUser() {
        $host = "devbdd.iutmetz.univ-lorraine.fr";
        $username = "varon1u_appli";
        $mdp = "TOCtoc12";
        $db_name = "varon1u_sae401"; 
    
        $connexion = mysqli_connect($host,$username,$mdp,$db_name);
        $requete = mysqli_query($connexion,"SELECT * FROM FAVORIS");
    
        $json_array = array();
        while($row = mysqli_fetch_assoc($requete)) {
            $json_array[] = $row;
        }
    
        print(json_encode($json_array));
    }
?>