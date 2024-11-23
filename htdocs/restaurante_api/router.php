<?php
require_once 'controllers/PlatillosController.php';

$controller = new PlatillosController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'getPlatillos') {
        $platillos = $controller->getAllPlatillos();
        echo json_encode($platillos);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'createPlatillo') {
        $result = $controller->createPlatillo($_POST['nombre'], $_POST['imagen'], $_POST['categoria'], $_POST['ingredientes'], $_POST['precio']);
        echo json_encode(['success' => $result]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    if (isset($_PUT['action']) && $_PUT['action'] === 'updatePlatillo') {
        $result = $controller->updatePlatillo($_PUT['id'], $_PUT['nombre'], $_PUT['imagen'], $_PUT['categoria'], $_PUT['ingredientes'], $_PUT['precio']);
        echo json_encode(['success' => $result]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    if (isset($_DELETE['action']) && $_DELETE['action'] === 'deletePlatillo') {
        $result = $controller->deletePlatillo($_DELETE['id']);
        echo json_encode(['success' => $result]);
    }
}
?>
