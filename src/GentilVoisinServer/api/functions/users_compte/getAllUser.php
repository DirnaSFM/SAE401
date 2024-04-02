<?php

function getAllUsers() {
    global $db;
    $dbStatement = $db->prepare("SELECT * FROM COMPTE");
    $dbStatement->execute();
    $users = $dbStatement->fetchAll(PDO::FETCH_ASSOC);
    
    return json_encode($users);
}