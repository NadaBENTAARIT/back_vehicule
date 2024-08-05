<?php
include_once '../inc/dbcon.php';
include_once '../models/Vehicule.php';

class VehiculeController {

    private $database;
    private $db;
    private $vehicule;

    public function __construct() {
        $this->database = new Database();
        $this->db = $this->database->getConnection();
        $this->vehicule = new Vehicule($this->db);
    }

    // Create
    public function create() {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->marque) && isset($data->modele) && isset($data->immatriculation)) {
            $this->vehicule->marque = $data->marque;
            $this->vehicule->modele = $data->modele;
            $this->vehicule->immatriculation = $data->immatriculation;

            if ($this->vehicule->create()) {
                echo json_encode(array("message" => "Vehicule created successfully."));
            } else {
                echo json_encode(array("message" => "Failed to create vehicule."));
            }
        } else {
            echo json_encode(array("message" => "Invalid input."));
        }
    }

    // Read
    public function read() {
        $stmt = $this->vehicule->read();
        $num = $stmt->rowCount();

        if ($num > 0) {
            $vehicules_arr = array();
            $vehicules_arr["records"] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $vehicule_item = array(
                    "id" => $id,
                    "marque" => $marque,
                    "modele" => $modele,
                    "immatriculation" => $immatriculation
                );
                array_push($vehicules_arr["records"], $vehicule_item);
            }

            echo json_encode($vehicules_arr);
        } else {
            echo json_encode(array("message" => "No records found."));
        }
    }

    // Update
    public function update() {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->id) && isset($data->marque) && isset($data->modele) && isset($data->immatriculation)) {
            $this->vehicule->id = $data->id;
            $this->vehicule->marque = $data->marque;
            $this->vehicule->modele = $data->modele;
            $this->vehicule->immatriculation = $data->immatriculation;

            if ($this->vehicule->update()) {
                echo json_encode(array("message" => "Vehicule updated successfully."));
            } else {
                echo json_encode(array("message" => "Failed to update vehicule."));
            }
        } else {
            echo json_encode(array("message" => "Invalid input."));
        }
    }

    // Delete
    public function delete() {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->id)) {
            $this->vehicule->id = $data->id;

            if ($this->vehicule->delete()) {
                echo json_encode(array("message" => "Vehicule deleted successfully."));
            } else {
                echo json_encode(array("message" => "Failed to delete vehicule."));
            }
        } else {
            echo json_encode(array("message" => "Invalid input."));
        }
    }
}
?>
