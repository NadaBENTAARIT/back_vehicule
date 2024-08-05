<?php
include_once '../controllers/vehicule.php';
header("Access-Control-Allow-Origin: *"); // Autoriser toutes les origines
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS"); // Méthodes HTTP autorisées
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With"); // En-têtes autorisés
$controller = new VehiculeController();
$controller->create();
?>
