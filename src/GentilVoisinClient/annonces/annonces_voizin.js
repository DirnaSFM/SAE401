const slider = document.querySelector('.distance-slider');
const currentDistance = document.querySelector('.current-distance');
const customSteps = [0, 1, 5, 10, 20, 30, 50, 100, 200];
const totalSteps = customSteps.length - 1;

slider.setAttribute('max', totalSteps.toString());
slider.setAttribute('step', '1');

slider.addEventListener('input', () => {
    const stepIndex = parseInt(slider.value);
    const distance = customSteps[stepIndex];

    currentDistance.textContent = distance + 'km';
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
