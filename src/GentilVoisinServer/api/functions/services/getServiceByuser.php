<!-- ajouter dans la base de donnée table matereil et service un attribut num-mat -->

<?php

function getServiceById(string $num_cpt) {
    global $db;
    $dbStatement = $db->prepare("SELECT num_service, type_service, modele, taille, marque, descri FROM SERVICES WHERE num_cpt = ?");
    $dbStatement->execute([$num_cpt]);
    $service = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($service);
}
