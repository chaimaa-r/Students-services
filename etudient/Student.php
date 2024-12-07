<?php
session_start();

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "services";

$conn = new mysqli($servername, $username_db, $password_db, $dbname, 3306);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
// Vérifiez si les données ont été envoyées via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
//$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';


$name = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
$prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '';
$email = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : '';
$numero_apogee = isset($_POST['numero_apogee']) ? htmlspecialchars($_POST['numero_apogee']) : '';
$reclamation = isset($_POST['reclamation']) ? htmlspecialchars($_POST['reclamation']) : '';

// Validation simple des données
if (empty($name) || empty($email) || empty($prenom) || empty($numero_apogee) || empty($reclamation)) {
    echo "Tous les champs sont requis.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "L'adresse e-mail n'est pas valide.";
} else {

$stmt = $conn->prepare("SELECT id_etudiant FROM etudiants WHERE numero_apogee = ?");
$stmt->bind_param("s", $numero_apogee); 
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    // Récupération de l'ID de l'étudiant
    $row = $result->fetch_assoc();
    $id_etudiant = $row['id_etudiant'];

    // Insérer la réclamation dans la table des réclamations
    $etat_reclamation = "en cours";
    $stmt_insert = $conn->prepare("INSERT INTO reclamations (id_etudiant, contenu_reclamation, etat_reclamation) 
                                   VALUES (?, ?, ?)");
    $stmt_insert->bind_param("iss", $id_etudiant, $reclamation, $etat_reclamation);

    if ($stmt_insert->execute()) {
        echo "Formulaire soumis avec succès.";
    $stmt_insert->close();
    exit; 
    } else {
        echo "Erreur lors de l'enregistrement de la réclamation : " . $conn->error;
        exit;
    }

} 
else{
    echo "les informations sont invalides";}
    
}
exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre une demande</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
* {
    
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(pngtree-illustration-of-a-flying-graduation-cap-in-3d-render-celebratory-banner-image_3634765.jpg);
    background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden; 
    font-family: Arial, sans-serif;
}

.container {
    display: flex;
    height: 100vh;
}

/* Sidebar styling */
.sidebar {
    width: 200px;
    background-color: #d5bdaf;
    display: flex;
    flex-direction: column;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2); /* Ombre douce */
}

.sidebar-btn {
    margin-top: 15px;
    color: #fff;
    padding: 15px;
    text-align: left;
    border: none;
    background: none;
    cursor: pointer;
    width: 100%;
}

.sidebar-btn:hover {
    background-color: #e3d5ca;
}

/* Content area styling */
.content {
    flex: 1;
    padding: 20px;
}

.section {
    display: none;
}

.section.active {
    display: block;
}

.form-container {

    background-color: #f1faee; 
    background:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.3));
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 60rem;
            margin-top:25px;
            margin-left:70px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #e3d5ca;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
            margin:20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            width: 26.2rem;
            color:#e3d5ca;
    
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #f7f3ed;
            
        }

        .form-group1{
            width:26.2rem;
            margin-bottom: 15px;
            margin:20px;
        }

        .form-group1 label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            width: 100%;
            color:#e3d5ca;
    
        }
        

        .form-group1 input, .form-group1 textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #f7f3ed;
            
        }
        .form-group1 textarea{
            height:2.2rem;
        }
       

        .form-group button {
            width: 100%;
            max-width:15rem;
            margin-left:20rem;
            padding: 10px;
            background-color: #c69f9a;
            color: #6c757d;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #d5bdaf;
        }
        
        
        .group-container{
            margin-top:-20px;
         display:flex;
         flex-direction:row;
         justify:space-between;
        }
        .group-container1{
            margin-top:-20px;
         display:flex;
         flex-direction:row;
         flex-wrap: wrap; 
    justify-content: space-between;
        }
        .feedback {
    font-size: 0.9em;
    margin-top: 5px;
    display: block;
}

.form-group .invalide {
            border: 2px solid red;
        }
        .form-group .valide {
            border: 2px solid green;
        }
        #submitButton:disabled {
            background-color: gray;
            cursor: not-allowed;
        }
        span.error {
            color: red;
            font-size: 12px;
        }
        .reponse{
            
        }

</style>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
        <a href="acceuill.php"><button class="sidebar-btn">E-Services</button></a>
        <button onclick="showSection('Demande')" class="sidebar-btn">Demander un Document</button>
        <button onclick="showSection('Reclamation')" class="sidebar-btn">Déposer une réclamation</button>
    
        </div>
        
        <!-- Main Content -->
        <div class="content">
            <div id="Demande" class="section active">
            <div class="form-container">
            <h2>Soumettre une Demande</h2>
            <form action="" method="POST" id="monFormulaire">
            <!-- Identité de l'étudiant -->
             <div class="group-container">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nomd" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenomd" name="prenom" required>
            </div>
            </div>
            <div class="group-container">
            <div class="form-group">
                <label for="email">E-mail :</label>
                <input type="email" id="emaild" name="email" required>
            </div>
            <div class="form-group">
                <label for="numero_apogee">Numéro Apogée :</label>
                <input type="text" id="numero_apogeed" name="numero_apogee" required>
            </div>
            </div>
        
            <!-- Type de document demandé -->
            <div class="group-container">
            
            <div class="form-group">
                <label for="CIN">Numéro CIN :</label>
                <input type="text" id="CIN" name="CIN" required>
            </div>
            <div class="form-group">
                <label for="type_document">Type de Document :</label>
                <select id="type_document" name="type_document" required>
                    <option value="">-- Sélectionner un type --</option>
                    <option value="Attestation de scolarité">Attestation de scolarité</option>
                    <option value="Relevé de notes">Relevé de notes</option>
                    <option value="Convention de stage">Convention de stage</option>
                    <option value="Attestation de réussite">Attestation de réussite</option>
                </select>
            </div>
            </div>
            <div id="dynamic-fields" class="group-container1">
            
            </div>
            
            

            <!-- Bouton pour soumettre -->
            <div class="form-group">
                <div class="submit">
                <button type="submit">Soumettre la Demande</button>
                </div>
            </div>
            </form>
        </div>

         </div>
    
         <div id="Reclamation" class="section">
        <div class="form-container">
            <h2>Ajouter une réclamation</h2>
            <form action="Student.php" method="POST">
                <!-- Identité de l'étudiant -->
                <div class="group-container">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="prenom" required>
                    </div>
                </div>
                <div class="group-container">
                    <div class="form-group">
                        <label for="email">E-mail :</label>
                        <input type="email" id="email" name="email" required>
                        <span id="email_error" class="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="numero_apogee">Numéro Apogée :</label>
                        <input type="text" id="numero_apogee" name="numero_apogee" required>
                        <span id="numero_error" class="error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reclamation">Réclamation :</label>
                    <textarea id="reclamation" name="reclamation" required></textarea>
                </div>
                <!-- Bouton pour soumettre -->
                <div class="form-group">
                    <div class="submit">
                        <button  type="submit" id="submitButton" disabled >Soumettre la réclamation</button>
                    </div>
                </div>
            </form>
            <div class="reponse" id="response"></div>
        </div>
    </div>
    </div>
    </div>

    <script>
function showSection(sectionId) {
    // Hide all sections
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => section.classList.remove('active'));

    // Show the selected section
    document.getElementById(sectionId).classList.add('active');
}

const typeDocumentSelect = document.getElementById("type_document");
        const dynamicFields = document.getElementById("dynamic-fields");

        // Ajout d'un événement pour détecter les changements dans le champ "Type de Document"
        typeDocumentSelect.addEventListener("change", function() {
            // Effacer les champs dynamiques existants
            dynamicFields.innerHTML = "";

            // Ajouter un champ pour l'année scolaire si "Relevé de notes" est sélectionné
            if (this.value === "Relevé de notes" ||this.value === "Attestation de scolarité" || this.value==="Attestation de réussite") {
                const anneeScolaireField = document.createElement("div");
                anneeScolaireField.classList.add("form-group1");
                anneeScolaireField.innerHTML = `
                    <label for="annee_scolaire">Année Scolaire :</label>
                    <input type="text" id="annee_scolaire" name="annee_scolaire" placeholder="Ex : 2023-2024" required>
                `;
                dynamicFields.appendChild(anneeScolaireField);
            }else if(this.value === "Convention de stage"){
                const entrepriseField = document.createElement("div");
        entrepriseField.className = "form-group1";
        entrepriseField.innerHTML = `
            <label for="entreprise">Nom de l'entreprise :</label>
            <input type="text" id="entreprise" name="entreprise" required>
        `;
        dynamicFields.appendChild(entrepriseField);

        const dureeField = document.createElement("div");
        dureeField.className = "form-group1";
        dureeField.innerHTML = `
            <label for="duree_stage">Durée du stage(mois):</label>
            <input type="number" id="duree_stage" name="duree_stage" required>
        `;
        dynamicFields.appendChild(dureeField);

        const sujetField = document.createElement("div");
        sujetField.className = "form-group1";
        sujetField.innerHTML = `
            <label for="sujet_stage">Sujet du stage :</label>
            <textarea id="sujet_stage" name="sujet_stage" rows="4" required></textarea>
        `;
        dynamicFields.appendChild(sujetField);
        
        const localisation = document.createElement("div");
        localisation.className = "form-group1";
        localisation.innerHTML = `
            <label for="sujet_stage">localisation :</label>
            <textarea id="localisation" name="localisation" rows="4" required></textarea>
        `;
        dynamicFields.appendChild(localisation);
            }
        });

    
    
     
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

</script>
</body>

</html>

