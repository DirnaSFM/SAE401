/*const slider = document.querySelector('.distance-slider');
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
});*/

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

const mysql = require('mysql2');

const connection = mysql.createConnection({
  host: "devbdd.iutmetz.univ-lorraine.fr",
  user: 'varon1u_appli',
  password: 'TOCtoc12',
  database: 'varon1u_sae401'
});

// Tester la connexion
connection.connect(error => {
  if (error) throw error;
  console.log("Connecté à la base de données MySQL!");
});


app.post('/submit', (req, res) => {
    const { username, password, name, firstname, adress, city, zipcode, tel, rayonValue } = req.body;
    
    // Construire la requête SQL d'insertion
    const query = `
        INSERT INTO UTILISATEUR (pseudo, mdp, nom, prenom, adresse, tel, rayon_dep, nb_jeton, admin) 
        VALUES (?, ?, ?, ?, ?, ?, ?, '0', '0');
    `;

    const values = [
        username, 
        password, // Assurez-vous de hasher ce mot de passe avant l'insertion pour des raisons de sécurité
        name, 
        firstname, 
        `${adress}`,
        tel, 
        rayonValue
    ];
    
    // Exécution de la requête
    connection.query(query, values, (error, results, fields) => {
        if (error) {
            // Gestion des erreurs (par exemple, utilisateur déjà existant)
            res.status(500).send('Erreur lors de l\'inscription');
            throw error;
        }
        
        // Réponse au client
        res.send('Inscription réussie !');
    });
});