<?php
include_once "getFavByUser.php";

function deleteFavori(string $compte, string $produit) {
    global $db;
    $dbStatement = $db->prepare("DELETE FROM FAVORI 
                                    WHERE num_cpt = ? 
                                    AND num_prod = ?");    
    
    if($dbStatement->execute([$compte, $produit])){
        $deleteFavori = getFavByUser($compte);
        return $deleteFavori;
    };
}