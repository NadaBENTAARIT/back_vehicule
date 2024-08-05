<?php
class Vehicule {
    private $conn;
    private $table_name = "Vehicule";

    public $id;
    public $marque;
    public $modele;
    public $immatriculation;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (marque, modele, immatriculation) VALUES (:marque, :modele, :immatriculation)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':marque', $this->marque);
        $stmt->bindParam(':modele', $this->modele);
        $stmt->bindParam(':immatriculation', $this->immatriculation);

        return $stmt->execute();
    }

    // Read
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Update
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET marque = :marque, modele = :modele, immatriculation = :immatriculation WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':marque', $this->marque);
        $stmt->bindParam(':modele', $this->modele);
        $stmt->bindParam(':immatriculation', $this->immatriculation);

        return $stmt->execute();
    }

    // Delete
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }
}
?>
