<?php

function getServiceById(string $idservice) {
    global $db;
    $dbStatement = $db->prepare("SELECT id_seervice, id_user, description, photo, categorie, statut, prix_service FROM SERVICES WHERE id_service = ?");
    $dbStatement->execute([$idservice]);
    $service = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($service);
}
