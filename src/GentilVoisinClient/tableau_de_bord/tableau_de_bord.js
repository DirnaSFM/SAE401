// Vous pouvez utiliser AJAX (XMLHttpRequest ou fetch API) pour interroger votre base de données via PHP
// Exemple de requête fetch pour charger les données dans le tableau de bord
document.addEventListener('DOMContentLoaded', function() {
    fetch('load_dashboard_data.php')
    .then(response => response.json())
    .then(data => {
        document.getElementById('user-tokens').textContent = `Jetons: ${data.tokens}`;
        document.getElementById('services-count').textContent = `Services/Prêts en cours: ${data.servicesCount}`;

        // Remplir les listes des services rendus et reçus
        populateServiceList('rendered-services-list', data.rendered);
        populateServiceList('received-services-list', data.received);
    })
    .catch(error => {
        console.error('Erreur lors du chargement des données du tableau de bord:', error);
    });
});

function populateServiceList(elementId, services) {
    const listElement = document.getElementById(elementId);
    services.forEach(service => {
        const serviceCard = document.createElement('div');
        serviceCard.className = 'service-card';
        serviceCard.innerHTML = `
            <img src="${service.image}" alt="${service.name}">
            <div>${service.name}</div>
            <div>Disponible: ${service.available}</div>
            <div>Prix unité: ${service.price} jetons</div>
        `;
        listElement.appendChild(serviceCard);
    });
}
