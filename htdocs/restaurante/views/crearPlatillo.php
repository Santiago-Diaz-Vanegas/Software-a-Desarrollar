<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /restaurante/views/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../database.php';

    $database = new Database();
    $db = $database->getConnection();

    $query = "INSERT INTO menu (nombre, imagen, categoria, ingredientes, precio) VALUES (:nombre, :imagen, :categoria, :ingredientes, :precio)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':imagen', $_POST['imagen']);
    $stmt->bindParam(':categoria', $_POST['categoria']);
    $stmt->bindParam(':ingredientes', $_POST['ingredientes']);
    $stmt->bindParam(':precio', $_POST['precio']);

    if ($stmt->execute()) {
        echo "Platillo guardado con éxito!";
    } else {
        echo "Error al guardar el platillo.";
    }
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/restaurante/css/styles.css">
</head>
<body>
    <?php include '../navbar.php'; ?>
    <h1>Crear Platillo</h1>
    <form method="POST" action="">
        <label>Nombre:</label><input type="text" name="nombre" required><br>
        <label>Url de imagen:</label><input type="text" name="imagen" required><br>
        <label>Ingredientes:</label><input type="text" name="ingredientes" required><br>
        <label>Precio:</label><input type="text" name="precio" required><br>
        <label>Categoría:</label>
        <select name="categoria" required>
            <option value="Entrada">Entrada</option>
            <option value="Ensalada">Ensalada</option>
            <option value="Cazuela">Cazuela</option>
            <option value="Cazuelitas">Cazuelitas</option>
            <option value="Pescado">Pescado</option>
            <option value="Mariscos">Mariscos</option>
            <option value="Filetes">Filetes</option>
            <option value="Carne y Avez">Carne y Avez</option>
            <option value="Pasta">Pasta</option>
            <option value="Arroz">Arroz</option>
            <option value="Adicionales">Adicionales</option>
            <option value="Bebidas">Bebidas</option>
            <option value="Cervezas">Cervezas</option>
            <option value="Postres">Postres</option>
        </select><br>
        <input type="submit" value="Guardar Platillo">
    </form>
</body>
</html>
