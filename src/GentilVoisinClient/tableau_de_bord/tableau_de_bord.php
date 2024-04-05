<?php

$host = "devbdd.iutmetz.univ-lorraine.fr";
$username = "varon1u_appli";
$mdp = "TOCtoc12";
$db_name = "varon1u_SAE401SAH";  

$db = new mysqli("$host", "$username", "$mdp", "$db_name");

// À adapter selon vos besoins et la structure de votre base de données
$user_id = $_SESSION['user_id']; // Vous devriez obtenir l'ID utilisateur de la session ou de la demande

// Récupérer le nombre de jetons et le nombre de services/prêts en cours
$query = "SELECT jetons FROM UTILISATEUR WHERE id_user = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Préparer la réponse
$response = [
    'tokens' => $row['jetons'],
    'servicesCount' => 0, // Calculer le nombre de services/prêts en cours
    'rendered' => [], // Récupérer les services et prêts rendus
    'received' => [] // Récupérer les services et prêts reçus
];

// Envoyer les données au format JSON
header('Content-Type: application/json');
echo json_encode($response);
