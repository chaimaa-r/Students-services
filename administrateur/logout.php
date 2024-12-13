<?php
session_start();

// Détruire la session
session_unset();
session_destroy();

// Rediriger vers la page d'accueil
header("Location: connexion.php"); // Remplace "index.php" par le nom de la page d'accueil
exit();
?>
