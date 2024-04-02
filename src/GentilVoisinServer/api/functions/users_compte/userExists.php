<?php

function userExists(string $nom, string $mdp) {
    global $db;
    $dbStatement = $db->prepare("SELECT num_cpt, nom, mdp FROM COMPTE WHERE nom = ?");
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