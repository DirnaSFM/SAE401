<?php

function getMaterielByUser(string $iduser) {
    global $db;
    $dbStatement = $db->prepare("SELECT id_mat, id_user, description, photo, marque, categorie, modele, statut, prix_mat FROM MATERIEL WHERE id_user = ?");
    $dbStatement->execute([$iduser]);
    $materiel = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($materiel);
}