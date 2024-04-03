<?php

function getCompteId(string $login) {
    global $db;
    $dbStatement = $db->prepare("SELECT id_user FROM UTILISATEUR WHERE nom = ?");
    $dbStatement->execute([$login]);
    $user = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return $user[0]["id_user"];
}