<?php  
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    // Récupère toutes les données de la table UTILISATEUR
    function getAllUser() {
        $host = "devbdd.iutmetz.univ-lorraine.fr";
        $username = "varon1u_appli";
        $mdp = "TOCtoc12";
        $db_name = "varon1u_sae401"; 
    
        $connexion = mysqli_connect($host,$username,$mdp,$db_name);
        $requete = mysqli_query($connexion,"SELECT * FROM UTILISATEUR");
    
        $json_array = array();
        while($row = mysqli_fetch_assoc($requete)) {
            $json_array[] = $row;
        }
    
        print(json_encode($json_array));
    }

    function getUserById(string $id_user) {
        $host = "devbdd.iutmetz.univ-lorraine.fr";
        $username = "varon1u_appli";
        $mdp = "TOCtoc12";
        $db_name = "varon1u_sae401"; 
    
        $connexion = mysqli_connect($host,$username,$mdp,$db_name);
        $requete = mysqli_query($connexion,"SELECT * FROM UTILISATEUR WHERE id_user = '".$id_user."'");
    
        $json_array = array();
        while($row = mysqli_fetch_assoc($requete)) {
            $json_array[] = $row;
        }
    
        print(json_encode($json_array));
    }

    // A tester
    
   // function addUser(string $user_id, string $pseudo, string $mdpasse, string $nom, string $prenom, string $adresse, string $tel, string $rayon_dep, string $nb_jeton){
    //    $requete = mysqli_query($connexion,"INSERT INTO UTILISATEUR(id_user, pseudo, mdp, nom, prenom, adresse, tel, rayon_dep, nb_jeton) VALUES ('".$id_user."','".$pseudo."','".$mdpasse."','".$nom."','".$prenom."','".$adresse."','".$tel."','".$rayon_dep."','".$nb_jeton."') ");
    //};

    getAllUser();
?>