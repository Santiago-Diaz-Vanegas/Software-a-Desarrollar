<?php

require_once 'database.php';
$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $categoria = $_POST['categoria'];
    $ingredientes = $_POST['ingredientes'];
    $precio = $_POST['precio'];

    $query = "UPDATE menu SET nombre = :nombre, imagen = :imagen, categoria = :categoria, ingredientes = :ingredientes, precio = :precio WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':ingredientes', $ingredientes);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Platillo actualizado con éxito!";
    } else {
        echo "Error al actualizar el platillo.";
    }
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM menu WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $platillo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($platillo === false) {
        // Se definine $platillo como un array vacío para evitar errores
        $platillo = [];
    }
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/restaurante_api/css/styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1>Editar Platillo</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo isset($platillo['id']) ? htmlspecialchars($platillo['id']) : ''; ?>">
        <label>Nombre:</label><input type="text" name="nombre" value="<?php echo isset($platillo['nombre']) ? htmlspecialchars($platillo['nombre']) : ''; ?>" required><br>
        <label>Url de imagen:</label><input type="text" name="imagen" value="<?php echo isset($platillo['imagen']) ? htmlspecialchars($platillo['imagen']) : ''; ?>" required><br>
        <label>Ingredientes:</label><input type="text" name="ingredientes" value="<?php echo isset($platillo['ingredientes']) ? htmlspecialchars($platillo['ingredientes']) : ''; ?>" required><br>
        <label>Precio:</label><input type="text" name="precio" value="<?php echo isset($platillo['precio']) ? htmlspecialchars($platillo['precio']) : ''; ?>" required><br>
        <label>Categoría:</label>
        <select name="categoria" required>
            <option value="Entrada" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Entrada') echo 'selected'; ?>>Entrada</option>
            <option value="Ensalada" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Ensalada') echo 'selected'; ?>>Ensalada</option>
            <option value="Cazuela" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Cazuela') echo 'selected'; ?>>Cazuela</option>
            <option value="Cazuelitas" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Cazuelitas') echo 'selected'; ?>>Cazuelitas</option>
            <option value="Pescado" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Pescado') echo 'selected'; ?>>Pescado</option>
            <option value="Mariscos" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Mariscos') echo 'selected'; ?>>Mariscos</option>
            <option value="Filetes" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Filetes') echo 'selected'; ?>>Filetes</option>
            <option value="Carne y Avez" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Carne y Avez') echo 'selected'; ?>>Carne y Avez</option>
            <option value="Pasta" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Pasta') echo 'selected'; ?>>Pasta</option>
            <option value="Arroz" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Arroz') echo 'selected'; ?>>Arroz</option>
            <option value="Adicionales" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Adicionales') echo 'selected'; ?>>Adicionales</option>
            <option value="Bebidas" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Bebidas') echo 'selected'; ?>>Bebidas</option>
            <option value="Cervezas" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Cervezas') echo 'selected'; ?>>Cervezas</option>
            <option value="Postres" <?php if (isset($platillo['categoria']) && $platillo['categoria'] == 'Postres') echo 'selected'; ?>>Postres</option>
        </select><br>
        <input type="submit" value="Actualizar Platillo">
    </form>
</body>
</html>
