<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /restaurante/views/login.php");
    exit;
}
require_once '../database.php';
$database = new Database();
$db = $database->getConnection();
$query = "SELECT * FROM menu";
$stmt = $db->prepare($query);
$stmt->execute();
$platillos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/restaurante/css/styles.css">
    <style>
        /* Estilos para el modal */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            padding-top: 60px; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 500px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include '../navbar.php'; ?>
    <h1>Platillos</h1>
    <table>
        <tr>
            <th>Nombre del platillo</th>
            <th>Url de imagen</th>
            <th>Categoría</th>
            <th>Ingredientes</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($platillos as $platillo): ?>
        <tr>
            <td><?php echo htmlspecialchars($platillo['nombre']); ?></td>
            <td><a href="#" onclick="showModal('<?php echo htmlspecialchars($platillo['imagen']); ?>')">Ver Imagen</a></td>
            <td><?php echo htmlspecialchars($platillo['categoria']); ?></td>
            <td><?php echo htmlspecialchars($platillo['ingredientes']); ?></td>
            <td><?php echo htmlspecialchars($platillo['precio']); ?></td>
            <td>
                <a href="../editarPlatillo.php?id=<?php echo $platillo['id']; ?>">Editar</a>
                <a href="../eliminarPlatillo.php?id=<?php echo $platillo['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Modal -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Imagen del platillo" style="width: 100%; height: auto;">
        </div>
    </div>

    <script>
        function showModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('imageModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('imageModal').style.display = "none";
        }
    </script>
</body>
</html>

