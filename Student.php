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
            margin-top:35px;
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
         display:flex;
         flex-direction:row;
         justify:space-between;
        }
        .group-container1{
         display:flex;
         flex-direction:row;
         justify:space-between;
        }
</style>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
        <button class="sidebar-btn">E-Services</button>
        <button onclick="showSection('Demande')" class="sidebar-btn">Demander un Document</button>
        <button onclick="showSection('Reclamation')" class="sidebar-btn">Déposer une réclamation</button>
    
        </div>
        
        <!-- Main Content -->
        <div class="content">
            <div id="Demande" class="section active">
            <div class="form-container">
        <h2>Soumettre une Demande</h2>
        <form action="soumettre_demande.php" method="POST">
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
            </div>
            <div class="form-group">
                <label for="numero_apogee">Numéro Apogée :</label>
                <input type="text" id="numero_apogee" name="numero_apogee" required>
            </div>
            </div>
            
            <!-- Type de document demandé -->
            <div class="form-group">
                <label for="type_document">Type de Document :</label>
                <select id="type_document" name="type_document" required>
                    <option value="">-- Sélectionner un type --</option>
                    <option value="Attestation de scolarité">Attestation de scolarité</option>
                    <option value="Relevé de notes">Relevé de notes</option>
                    <option value="Convention de stage">Convention</option>
                </select>
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
            <form action="soumettre_reclamation.php" method="POST">
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
          <div class="form-group">
                <label for="reclamation">Réclamation :</label>
                <textarea type="textarea" id="reclamation" name="reclamation" required></textarea>
            </div>
            <!-- Bouton pour soumettre -->
            <div class="form-group">
                <div class="submit">
                <button type="submit">Soumettre la réclamation</button>
                </div>
            </div>
        </form>
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
            if (this.value === "Relevé de notes" ||this.value === "Attestation de scolarité" ) {
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
            <label for="duree_stage">Durée du stage (en mois) :</label>
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

            }
        });

</script>
</body>
</html>
