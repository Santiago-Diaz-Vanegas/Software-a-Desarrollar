<?php
class Platillo {
    private $conn;
    private $table_name = "menu";

    public $id;
    public $nombre;
    public $imagen;
    public $categoria;
    public $ingredientes;
    public $precio;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPlatillos() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, imagen, categoria, ingredientes, precio) VALUES (:nombre, :imagen, :categoria, :ingredientes, :precio)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':imagen', $this->imagen);
        $stmt->bindParam(':categoria', $this->categoria);
        $stmt->bindParam(':ingredientes', $this->ingredientes);
        $stmt->bindParam(':precio', $this->precio);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre = :nombre, imagen = :imagen, categoria = :categoria, ingredientes = :ingredientes, precio = :precio WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':imagen', $this->imagen);
        $stmt->bindParam(':categoria', $this->categoria);
        $stmt->bindParam(':ingredientes', $this->ingredientes);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }
}
?>

