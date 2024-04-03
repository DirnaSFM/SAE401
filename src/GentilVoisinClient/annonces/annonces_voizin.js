const slider = document.querySelector('.distance-slider');
const currentDistance = document.querySelector('.current-distance');
const customSteps = [0, 1, 5, 10, 20, 30, 50, 100, 200];
const totalSteps = customSteps.length - 1; 
const sliderWidth = slider.offsetWidth; 
const stepSize = sliderWidth / totalSteps; 

slider.style.backgroundSize = stepSize + 'px';

slider.addEventListener('input', () => {
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
    
    slider.value = customSteps[closestStepIndex];
    currentDistance.textContent = slider.value + 'km';
});

document.addEventListener('DOMContentLoaded', function() {
    // This function will be called when the page is loaded
    fetchItems();
  });
  
  function fetchItems() {
    // Here you would fetch the items from your database
    // For the purpose of this example, I'll use dummy data
    const items = [
      { name: 'Tournevis', stock: 'Disponible', price: 19 , image: '../images/tournevis.png'},
      // ... more items
    ];
    
    const productsSection = document.getElementById('products');
    items.forEach(item => {
      productsSection.innerHTML += `
        <div class="product-card">
          <img class="img" src="${item.image}" alt="${item.name}" />
          <h3>${item.name}</h3>
          <p>${item.stock}</p>
          <p>Prix unité: ${item.price} jetons</p>
          <button class="product-delete">Supprimer</button>
        </div>
      `;
    });
  }