<?php

function getUserById(string $id) {
    global $db;
    $dbStatement = $db->prepare("SELECT id_user, mdp, nom, prenom, adresse, tel, rayon_dep, nb_jeton FROM UTILISATEUR WHERE id_user = ?");
    $dbStatement->execute([$id]);
    $user = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($user);
}