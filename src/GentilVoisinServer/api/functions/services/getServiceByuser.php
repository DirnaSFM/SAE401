<?php

function getServiceByUser(string $iduser) {
    global $db;
    $dbStatement = $db->prepare("SELECT id_service, id_user, description, photo, categorie, statut, prix_service FROM SERVICES WHERE id_user = ?");
    $dbStatement->execute([$iduser]);
    $service = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($service);
}
