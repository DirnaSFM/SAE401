<?php

function getAllMateriel() {
    global $db;
    $dbStatement = $db->prepare("SELECT * FROM MATERIEL");
    $dbStatement->execute();
    $materiel = $dbStatement->fetchAll(PDO::FETCH_ASSOC);
    
    return json_encode($materiel);
}