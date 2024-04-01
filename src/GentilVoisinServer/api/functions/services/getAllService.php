<?php

function getAllServices() {
    global $db;
    $dbStatement = $db->prepare("SELECT * FROM SERVICES");
    $dbStatement->execute();
    $services = $dbStatement->fetchAll(PDO::FETCH_ASSOC);
    
    return json_encode($services);
}