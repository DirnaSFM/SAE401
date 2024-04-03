<?php

function getServiceById(string $idmateriel) {
    global $db;
    $dbStatement = $db->prepare("SELECT id_mat, id_user, description, photo, marque, categorie, modele, statut, prix_mat FROM MATERIEL WHERE id_mat = ?");
    $dbStatement->execute([$idmateriel]);
    $materiel = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($materiel);
}