<?php
// Inclure les fichiers nécessaires
include_once '../controllers/vehicule.php';

// Créer une instance du contrôleur
$controller = new VehiculeController();

// Appeler la méthode pour lire les données des véhicules
$controller->read();
?>
