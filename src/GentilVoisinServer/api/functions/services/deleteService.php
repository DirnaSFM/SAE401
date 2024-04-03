<?php
include_once "getServicelByUser.php";

function deleteService(string $idservice, string $iduser) {
    global $db;
    $dbStatement = $db->prepare("DELETE FROM SERVICES 
                                    WHERE id_service = ? 
                                    AND id_user = ?");    
    
    if($dbStatement->execute([$idservice, $iduser])){
        $deleteService = getServiceByUser($iduser);
        return $deleteService;
    };
}