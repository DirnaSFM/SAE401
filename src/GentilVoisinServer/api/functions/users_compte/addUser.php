<?php

include "getUserById.php";

function addUser(string $num_cpt, string $nom, string $prenom, string $adresse, string $tel, string $rayon, string $mdp, string $nbjeton) {
    global $db;
    $dbStatement = $db->prepare("INSERT INTO COMPTE (num_cpt, nom, prenom, adresse, tel, rayon, mdp, nb_jeton) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);

    //$id = $db->lastInsertId();
    $dbStatement>execute([$num_cpt, $nom, $prenom, $adresse, $tel, $rayon, $hashedMdp, $nbjeton]);

    $addedUser = getUserById($num_cpt);

    return $addedUser;

}