<?php

function getServiceById(string $num_service) {
    global $db;
    $dbStatement = $db->prepare("SELECT num_service, type_service, modele, taille, marque, descri FROM SERVICES WHERE num_service = ?");
    $dbStatement->execute([$num_service]);
    $service = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($service);
}
