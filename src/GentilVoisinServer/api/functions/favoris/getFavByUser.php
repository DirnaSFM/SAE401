<!-- a revoir -->

<?php
function getFavByUser(string $compteid) {
    global $db;
        $dbStatement = $db->prepare("SELECT PRODUIT.num_prod, nom_prod, VARIANTE.num_var, image_var, prix
        FROM FAVORI, PRODUIT, VARIANTE
        WHERE FAVORI.num_compte = ?
        AND FAVORI.num_prod = PRODUIT.num_prod
        AND VARIANTE.num_prod = FAVORI.num_prod
        GROUP BY FAVORI.num_prod");
    $dbStatement->execute([$compteid]);
    $favori = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($favori);
}