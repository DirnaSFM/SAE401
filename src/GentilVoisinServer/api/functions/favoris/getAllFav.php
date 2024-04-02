<?php

function getAllFav() {
    global $db;
    $dbStatement = $db->prepare("SELECT * FROM FAVORI");
    $dbStatement->execute();
    $getfav = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($getfav);
}