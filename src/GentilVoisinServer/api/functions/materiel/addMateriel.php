<?php

include "getMaterielById.php";

function addmateriel(string $iduser, string $description, string $photo, string $marque, string $categ, string $modele, string $statut, string $prixmat) {
    global $db;
    $dbStatement = $db->prepare("INSERT INTO MATERIEL (id_mat, id_user, description, photo, marque, categorie, modele, statut, prix_mat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");


    $id = $db->lastInsertId();
    $dbStatement>execute([$id, $iduser, $description, $photo, $marque, $categ, $modele, $statut, $prixmat]);

    $addedMateriel = getMaterielById($id);

    return $addedMateriel;

}