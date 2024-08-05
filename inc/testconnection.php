<?php
// Inclure le fichier contenant la classe Database
include_once 'dbcon.php';

// Créer une instance de la classe Database
$database = new Database();
$db = $database->getConnection();

// Vérifier la connexion
if ($db) {
    echo "Connexion à la base de données réussie!";
} else {
    echo "Échec de la connexion à la base de données.";
}
?>
