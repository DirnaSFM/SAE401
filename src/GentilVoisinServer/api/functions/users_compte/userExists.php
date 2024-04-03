<?php

function userExists(string $nom, string $mdp) {
    global $db;
    $dbStatement = $db->prepare("SELECT id_user, mdp, nom FROM UTILISATEUR WHERE nom = ?");
    $dbStatement->execute([$nom]);
    $user = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    if(!$user) {
        return false;
    }
    
    $isValidMdp = password_verify($mdp, $user[0]["mdp"]);

    if($isValidMdp) {
        return $user;
    } else {
        return false;
    }
}