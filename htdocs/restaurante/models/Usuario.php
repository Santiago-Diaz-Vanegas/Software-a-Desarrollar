<?php
class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $username;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function validateUser() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
?>
