<?php

include "getServiceById.php";

function addService(string $iduser, string $description, string $photo,  string $categ, string $statut, string $prixservice) {
    global $db;
    $dbStatement = $db->prepare("INSERT INTO SERVICES (id_mat, id_user, description, photo, categorie, statut, prix_service) VALUES (?, ?, ?, ?, ?, ?, ?)");


    $id = $db->lastInsertId();
    $dbStatement>execute([$id, $iduser, $description, $photo,  $categ,  $statut, $prixservice]);

    $addedService = getServiceById($id);

    return $addedService;

}