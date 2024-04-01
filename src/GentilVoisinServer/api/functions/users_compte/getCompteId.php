<?php

function getCompteId(string $user) {
    global $db;
    $dbStatement = $db->prepare("SELECT num_cpt FROM COMPTE WHERE num_cpt = ?");
    $dbStatement->execute([$user]);
    $user = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return $user[0]["num_compte"];
}