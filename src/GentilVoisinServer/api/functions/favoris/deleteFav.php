<?php
include_once "getFavByUser.php";

function deleteFavori(string $iduser, string $materiel, string $service) {
    global $db;
    $dbStatement = $db->prepare("DELETE FROM FAVORI 
                                    WHERE id_user = ? 
                                    AND id_mat = ?
                                    AND id_service = ?");    
    
    if($dbStatement->execute([$isuser, $materiel, $service])){
        $deleteFavori = getFavByUser($iduser);
        return $deleteFavori;
    };
}