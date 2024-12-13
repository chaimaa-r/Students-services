function verifierChamps() {
    // Récupération des champs
    const email = document.getElementById("email");
    const submitButton = document.getElementById("submitButton");

    // Définir les expressions régulières
    const regexusername = /^[a-zA-Z0-9._%+-]+@uae\.ac\.ma$/;
    

    let formulaireValide = true;

    // Vérification de l'email
    if (!regexusername.test(email.value)) {
        appliquerClasse(email, false, "email_error", "Format d'email (.....@uae.ac.ma).");
        formulaireValide = false;
    } else {
        appliquerClasse(email, true, "email_error");
    }
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
    const inputs = document.querySelectorAll("#email");
    inputs.forEach(input => input.addEventListener("input", verifierChamps));

    // Initialiser la vérification des champs au chargement
    verifierChamps();
    
});

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const responseDiv = document.getElementById("response");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Empêche le rechargement de la page

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        // Préparer la requête AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Students-services/administrateur/connexion.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                try {
                    const response = JSON.parse(xhr.responseText);

                    if (response.status === "success") {
                        window.location.href = response.redirect; // Rediriger l'utilisateur
                    } else {
                        responseDiv.innerText = response.message; // Afficher le message d'erreur
                    }
                } catch (e) {
                    responseDiv.innerText = "Une erreur inattendue s'est produite.";
                    console.error("Erreur de réponse JSON :", e);
                }
            } else {
                responseDiv.innerText = "Erreur lors de la requête. Veuillez réessayer.";
                console.error("Erreur AJAX :", xhr.status, xhr.statusText);
            }
        };

        xhr.send(`email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`);
    });
});
