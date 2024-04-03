<?php
include_once "getMaterielByUser.php";

function deleteMateriel(string $idmat, string $iduser) {
    global $db;
    $dbStatement = $db->prepare("DELETE FROM MATERIEL 
                                    WHERE id_mat = ? 
                                    AND id_user = ?");    
    
    if($dbStatement->execute([$idmat, $iduser])){
        $deleteMateriel = getMaterielByUser($iduser);
        return $deleteMateriel;
    };
}