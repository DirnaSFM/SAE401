<?php
 echo '<pre>';
 var_dump($_POST);
 echo '</pre>';
session_start(); // Démarrer la session

// Vérifier si les champs du formulaire sont définis et non vides
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $db_config['SGBD'] = 'mysql';
    $db_config['HOST'] = 'devbdd.iutmetz.univ-lorraine.fr';
    $db_config['DB_NAME'] = 'varon1u_SAE401SAH';
    $db_config['USER'] = 'varon1u_appli';
    $db_config['PASSWORD'] = 'TOCtoc12';

    try {
        $db = new PDO($db_config['SGBD'] . ':host=' . $db_config['HOST'] . ';dbname=' . $db_config['DB_NAME'],
            $db_config['USER'], $db_config['PASSWORD']);
            $db->exec("SET NAMES utf8");

        // Préparation de la requête
        $query = "SELECT * FROM UTILISATEUR WHERE nom = :username AND mdp = :password";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Vérification des informations de connexion
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            // Informations de connexion correctes
            $_SESSION['username'] = $user['nom'];
            header('Location: ../accueil/accueil.html');
            exit();
        } else {
            // Informations de connexion incorrectes
            
            echo "<script>alert('Nom d\'utilisateur ou mot de passe incorrect. Veuillez réessayer.');</script>";
            echo "<script>window.location.href = 'connexion.html';</script>";
        }
    } catch (Exception $exception) {
        die($exception->getMessage());
    }
} else {
    // Rediriger vers la page de connexion si les champs ne sont pas définis ou vides
    header('Location: connexion.html');
    exit();
}
?>
