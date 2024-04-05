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

/*----------------------------MODALE----------------------------*/
var modal = document.getElementById("login-modal");
var openModalBtn = document.getElementById("open-modal-btn");
var closeBtn = document.getElementsByClassName("btn-close")[0];
var closeBtnScr = document.getElementById("btn-close-secondary")[0];

document.addEventListener('DOMContentLoaded', function() {
  const passwordInput = document.getElementById('password');
  const showPasswordCheckbox = document.getElementById('show-password');

  showPasswordCheckbox.addEventListener('change', function() {
      if (showPasswordCheckbox.click()) {
          passwordInput.type = 'text';
      } else {
          passwordInput.type = 'password';
      }
  });
});

openModalBtn.onclick = function() {
  modal.style.display = "block";
}

closeBtn.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

closeBtnScr.onclick = function() {
  modal.style.display = "none";
}

document.getElementById("modal-login-form").addEventListener("submit", function(event) {
  event.preventDefault();
});
