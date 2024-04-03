<?php
function getFavByUser(string $iduser) {
    global $db;
        $dbStatement = $db->prepare("SELECT id_favori, id_user, id_mat, id_service, date_ajout
        FROM FAVORI
        WHERE id_user = ?");
    $dbStatement->execute([$compteid]);
    $favori = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($favori);
}