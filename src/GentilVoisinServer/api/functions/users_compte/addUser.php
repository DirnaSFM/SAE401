<?php

include "getUserById.php";

function addUser(string $mdp, string $nom, string $prenom, string $adresse, string $tel, string $rayon, string $nbjeton) {
    global $db;
    $dbStatement = $db->prepare("INSERT INTO UTILISATEUR (id_user, mdp, nom, prenom, adresse, tel, rayon_dep, nb_jeton) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);

    $id = $db->lastInsertId();
    $dbStatement>execute([$id, $hashedMdp, $nom, $prenom, $adresse, $tel, $rayon, $nbjeton]);

    $addedUser = getUserById($id);

    return $addedUser;

}