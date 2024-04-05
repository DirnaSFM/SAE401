<?php
$nbjeton= 0;
$iduser =16;
$admin = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire de la première étape
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Récupérer les données du formulaire de la deuxième étape
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $tel = $_POST['tel'];
    $rayon = $_POST['rayon'];

    // Connexion à la base de données
    $db_config['SGBD'] = 'mysql';
    $db_config['HOST'] = 'devbdd.iutmetz.univ-lorraine.fr';
    $db_config['DB_NAME'] = 'varon1u_SAE401SAH';
    $db_config['USER'] = 'varon1u_appli';
    $db_config['PASSWORD'] = 'TOCtoc12';

    try {
        $db = new PDO($db_config['SGBD'] . ':host=' . $db_config['HOST'] . ';dbname=' . $db_config['DB_NAME'],
            $db_config['USER'], $db_config['PASSWORD']);

        // Préparer la requête d'insertion
        $query = "INSERT INTO UTILISATEUR (id_user, mdp, nom, prenom, adresse, tel, rayon, nb_jetons, admin) 
                  VALUES (:id, :mdp, :nom, :prenom, :adresse, :tel, :rayon, :jeton, :admin)";
        $stmt = $db->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(':id', $iduser);
        $stmt->bindParam(':mdp', $password);
        $stmt->bindParam(':nom', $name);
        $stmt->bindParam(':prenom', $firstname);
        $stmt->bindParam(':adresse', $address);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':rayon', $rayon);
        $stmt->bindParam(':jeton', $nbjeton);
        $stmt->bindParam(':admin', $admin);

        // Exécution de la requête
        $stmt->execute();

        // Redirection vers une page de confirmation ou d'accueil
        header('Location: ../accueil/accueil.html');
        exit();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>
