<?php

function getAllTransaction() {
    global $db;
    $dbStatement = $db->prepare("SELECT * FROM 'TRANSACTION'");
    $dbStatement->execute();
    $getTransaction = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($getTransaction);
}