<?php

function getServiceById(string $num_materiel) {
    global $db;
    $dbStatement = $db->prepare("SELECT num_materiel, type_materiel, modele, taille, marque, descri FROM MATERIEL WHERE num_mat = ?");
    $dbStatement->execute([$num_materiel]);
    $materiel = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($materiel);
}