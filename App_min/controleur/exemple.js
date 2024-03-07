var api = "https://geo.api.gouv.fr/regions?";
var regions = "";
var url = api + regions;
var input;

// Fonction qui récupère les données de l'API
function fetchApi() {
    // Si il n'y a pas de demande particulière on récupère tout
    if (sessionStorage.getItem("url") == null) {
        url = "https://geo.api.gouv.fr/regions?";
    }
    else {
        url = sessionStorage.getItem("url"); // Sinon on prend l'url stocké sur la session
    }

    fetch(url) // On récup les données de l'API
    .then(response => {
        if (!response.ok) {
        throw new Error('Ca répond pas');
        }
        return response.json();
    })
    .then(data => { // On affiche les données dans l'objet d'id resultat 
        for ($i = 0; $i < data.length; $i++) {
            $element = data[$i];
            $texte = "<div> ";
            $texte += "Nom : " + $element['nom'] + "</br>";
            $texte += " Code : " + $element['code'];
            $texte += "</div> </br> </br>";
            document.getElementById("resultat").innerHTML += $texte;
        } 
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Stocke l'url de la requête demandé sur la session et recharge la page
// Si aucune requête n'est faite et qu'il y a une url stockée sur la session on la vide
function codeR() {
    input = document.querySelector("#codeR");
    if (input.value != "") {     
        url = api + "code=" + input.value;
        sessionStorage.setItem("url",url);
    }
    else if(sessionStorage.getItem("url") != null) {
        sessionStorage.removeItem("url");
    }
    location.reload();
}
// Appel de l'api
fetchApi();