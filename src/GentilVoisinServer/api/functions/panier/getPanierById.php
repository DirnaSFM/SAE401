<?php

function getPanierById(string $idpanier) {
    global $db;
    $dbStatement = $db->prepare("SELECT id_panier, id_user, id_mat, id_service, qte, date_ajout, prix_jeton FROM panier WHERE id_panier = ?");
    $dbStatement->execute([$idpanier]);
    $panier = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($panier);
}