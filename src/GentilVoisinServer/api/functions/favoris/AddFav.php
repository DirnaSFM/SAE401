<?php
include_once "getFavByUser.php";

function addFavori(string $compte, string $produit) {
    global $db;
    $dbStatement = $db->prepare("INSERT INTO FAVORI(num_cpt, num_prod)
                                    VALUES(?, ?)");
   
   
   if($dbStatement->execute([$compte, $produit])){
    $addFavori = getFavByUser($compte);
    return $addFavori;
   };
}