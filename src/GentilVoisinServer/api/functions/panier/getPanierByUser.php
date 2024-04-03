<?php

function getPanierByUser(string $iduser) {
    global $db;
    $dbStatement = $db->prepare("SELECT id_panier, id_user, id_mat, id_service, qte, date_ajout, prix_jeton FROM panier WHERE id_user= ?");
    $dbStatement->execute([$iduser]);
    $panier = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($panier);
}