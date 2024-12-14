<?php
header('Content-Type: application/json');

// Connexion à la base de données
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "services";
$conn = new mysqli($servername, $username_db, $password_db, $dbname, 3306);

// Vérification de la connexion
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Erreur de connexion à la base de données.']);
    exit();
}

// Vérification des données envoyées
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_reclamation'])) {
    $id_reclamation = intval($_POST['id_reclamation']);

    // Mise à jour de l'état de la réclamation
    $sql = "UPDATE reclamations SET etat_reclamation = 'Traitée' WHERE id_reclamation = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_reclamation);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'ID de réclamation manquant.']);
}

$conn->close();

