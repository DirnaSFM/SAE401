<?php

function getUserById(string $user) {
    global $db;
    $dbStatement = $db->prepare("SELECT num_cpt, nom, prenom, adresse, tel, rayon, mdp, nb_jeton FROM COMPTE WHERE num_cpt = ?");
    $dbStatement->execute([$user]);
    $user = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($user);
}