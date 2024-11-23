<?php

require_once 'database.php';
require_once 'models/Usuario.php';

class LoginController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new Usuario($this->db);
    }

    public function login($username, $password) {
        $this->user->username = $username;
        $this->user->password = $password;

        if($this->user->validateUser()) {
            $_SESSION['username'] = $username;
            header("Location: /restaurante_api/views/inicio.php");
        } else {
            echo "Invalid credentials!";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /restaurante_api/views/login.php");
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new LoginController();
    $controller->login($_POST['username'], $_POST['password']);
}
if(isset($_GET['logout'])) {
    $controller = new LoginController();
    $controller->logout();
}


?>


