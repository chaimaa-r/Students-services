function verifierChamps() {
    // Récupération des champs
    const email = document.getElementById("email");
    const numeroApogee = document.getElementById("numero_apogee");
    const submitButton = document.getElementById("submitButton");

    // Définir les expressions régulières
    const regexEmail = /^[a-zA-Z0-9._%+-]+@etu\.uae\.ac\.ma$/;
    const regexNumeroApogee = /^[0-9]{8}$/;

    let formulaireValide = true;

    // Vérification de l'email
    if (!regexEmail.test(email.value)) {
        appliquerClasse(email, false, "email_error", "Format d'email (.....@etu.uae.ac.ma).");
        formulaireValide = false;
    } else {
        appliquerClasse(email, true, "email_error");
    }

    // Vérification du numéro Apogée
    if (!regexNumeroApogee.test(numeroApogee.value)) {
        appliquerClasse(numeroApogee, false, "numero_error", "Numéro Apogée (8 chiffres max).");
        formulaireValide = false;
    } else {
        appliquerClasse(numeroApogee, true, "numero_error");
    }

    // Activer ou désactiver le bouton de soumission
    submitButton.disabled = !formulaireValide;
}

function appliquerClasse(element, valide, errorId, message = "") {
    const errorSpan = document.getElementById(errorId);
    
    if (valide) {
        element.classList.add("valide");
        element.classList.remove("invalide");
        errorSpan.textContent = "";
    } else {
        element.classList.add("invalide");
        element.classList.remove("valide");
        errorSpan.textContent = message;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    // Ajouter des écouteurs d'événements pour valider les champs en temps réel
    const inputs = document.querySelectorAll("#email, #numero_apogee");
    inputs.forEach(input => input.addEventListener("input", verifierChamps));

    // Initialiser la vérification des champs au chargement
    verifierChamps();
    
});

document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    const name = document.getElementById('nom').value;
    const email = document.getElementById('email').value;
    const numero_appoge = document.getElementById('numero_apogee').value;
    const prenom = document.getElementById('prenom').value;
    const reclamation = document.getElementById('reclamation').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'Student.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('response').innerText = xhr.responseText;
        } else {
            console.error('Erreur lors de l\'envoi de la requête :', xhr.status);
        }
    };
    

    xhr.send(`nom=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}
    &numero_apogee=${encodeURIComponent(numero_appoge)}&prenom=${encodeURIComponent(prenom)}
    &reclamation=${encodeURIComponent(reclamation)}`);
});