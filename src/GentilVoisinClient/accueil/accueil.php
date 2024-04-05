<?php
// Connexion à la base de données
require_once 'db_connection.php'; // Inclure le fichier de connexion à la base de données

try {
    // Requête pour récupérer les noms des catégories
    $query = "SELECT nom_categorie FROM CATEGORIE";
    $stmt = $db->query($query);

    // Récupérer tous les résultats sous forme de tableau associatif
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die('Erreur lors de la récupération des catégories : ' . $e->getMessage());
}

// Retourner les catégories (ceci sera inclus dans le fichier HTML)
return $categories;
?>
