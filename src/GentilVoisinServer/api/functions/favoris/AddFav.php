<?php
include_once "getFavByUser.php";

function addFavori(string $iduser, string $materiel, string $service, date $date_ajout ) {
    global $db;
    $dbStatement = $db->prepare("INSERT INTO FAVORI(id_favori, id_user, id_mat, id_service, date_ajout)
                                    VALUES(?, ?, ?, ?, ?)");
   
   $id = $db->lastInsertId();
   if($dbStatement->execute([$id, $iduser, $materiel, $service, $date_ajout])){
    $addFavori = getFavByUser($iduser);
    return $addFavori;
   };
}