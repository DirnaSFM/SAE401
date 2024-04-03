<?php

include "getMaterielById.php";

function addToPAnier(string $idpanier, string $iduser, string $idmat, string $idservice, string $qte, string $dateajout, string $prixjeton) {
    global $db;
    $dbStatement = $db->prepare("INSERT INTO PANIER (id_mat, id_user, description, photo, marque, categorie, modele, statut, prix_mat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");


    $dbStatement>execute([$id, $iduser, $description, $photo, $marque, $categ, $modele, $statut, $prixmat]);

    $addedMateriel = getMaterielById($id);

    return $addedMateriel;

}