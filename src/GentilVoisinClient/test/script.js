const slider = document.querySelector('.distance-slider');
const currentDistance = document.querySelector('.current-distance');

// Valeurs de crans personnalisés
const customSteps = [0, 1, 5, 10, 20, 30, 50, 100, 200];
const totalSteps = customSteps.length - 1; // Nombre total de crans
const sliderWidth = slider.offsetWidth; // Largeur totale du slider
const stepSize = sliderWidth / totalSteps; // Taille de chaque cran

// Définir la largeur de chaque cran sur le slider
slider.style.backgroundSize = stepSize + 'px';

slider.addEventListener('input', () => {
    // Trouver le cran le plus proche
    const value = parseInt(slider.value);
    let closestStepIndex = 0;
    let minDistance = Math.abs(value - customSteps[0]);

    for (let i = 1; i < customSteps.length; i++) {
        const distance = Math.abs(value - customSteps[i]);
        if (distance < minDistance) {
            minDistance = distance;
            closestStepIndex = i;
        }
    }

    // Mettre à jour la valeur du slider en fonction du cran le plus proche
    slider.value = customSteps[closestStepIndex];

    // Mettre à jour l'affichage de la distance
    currentDistance.textContent = slider.value + 'km';
});