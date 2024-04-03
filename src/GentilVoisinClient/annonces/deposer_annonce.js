document.getElementById('annonce-form').addEventListener('submit', function(e) {
	e.preventDefault();
	// Here you will handle the form submission to your backend
	alert('Annonce submitted');
});

function validateInput(input) {
	const regex = /^\d*\.?\d*$/; // Expression régulière pour les nombres à virgule
	const errorMessage = document.getElementById('error-message');

	if (!regex.test(input.value)) {
		errorMessage.textContent = "Veuillez entrer un nombre valide.";
	} else {
		errorMessage.textContent = "";
	}
}