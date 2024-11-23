<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /restaurante/views/login.php");
    exit;
}

require_once 'database.php';
$database = new Database();
$db = $database->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara la consulta para eliminar el platillo
    $query = "DELETE FROM menu WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        // Redirige de vuelta a la lista de platillos después de eliminar
        header("Location: /restaurante/views/platillos.php");
        exit;
    } else {
        echo "Error al eliminar el platillo.";
    }
} else {
    echo "ID de platillo no proporcionado.";
}
?>
