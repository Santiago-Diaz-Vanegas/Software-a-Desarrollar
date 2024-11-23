<?php
require_once 'database.php';
require_once 'models/Platillo.php';

class PlatillosController {
    private $db;
    private $platillo;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->platillo = new Platillo($this->db);
    }

    public function getAllPlatillos() {
        return $this->platillo->getPlatillos();
    }

    public function createPlatillo($nombre, $imagen, $categoria, $ingredientes, $precio) {
        $this->platillo->nombre = $nombre;
        $this->platillo->imagen = $imagen;
        $this->platillo->categoria = $categoria;
        $this->platillo->ingredientes = $ingredientes;
        $this->platillo->precio = $precio;
        return $this->platillo->create();
    }

    public function updatePlatillo($id, $nombre, $imagen, $categoria, $ingredientes, $precio) {
        $this->platillo->id = $id;
        $this->platillo->nombre = $nombre;
        $this->platillo->imagen = $imagen;
        $this->platillo->categoria = $categoria;
        $this->platillo->ingredientes = $ingredientes;
        $this->platillo->precio = $precio;
        return $this->platillo->update();
    }

    public function deletePlatillo($id) {
        $this->platillo->id = $id;
        return $this->platillo->delete();
    }
}
?>
