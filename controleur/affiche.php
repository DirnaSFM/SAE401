<?php
    // On ouvre curl
    $ch = curl_init();

    // On donne l'url
    curl_setopt($ch,CURLOPT_URL,"https://geo.api.gouv.fr/regions");

    // Pour que ça return le résultat
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // On execute
    $resp = curl_exec($ch);

    if($e = curl_error($ch)) {
        echo $e;
    }
    else {
        // On met ",true" pour avoir des Array 
        $decoded = json_decode($resp,true);
        for ($i = 0; $i < count($decoded); $i++) {
            $element = $decoded[$i];        
            if ($element['code'] == $_GET['code']) {
                $texte = "<div> ";
                $texte .= "Nom : " . $element['nom'] . "</br>";
                $texte .= " Code : " . $element['code'];
                $texte .= "</div> </br> </br>";
                print_r($texte);
            }
        } 
    }

    curl_close($ch);
    require_once("../vue/affiche.view.php");
?>