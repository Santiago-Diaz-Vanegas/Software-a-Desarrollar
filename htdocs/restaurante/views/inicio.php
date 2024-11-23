<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /restaurante/views/login.php");
    exit;
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/restaurante/css/styles.css">
</head>
<body>
    <?php include '../navbar.php'; ?>
    <h1>Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>
</body>
</html>
