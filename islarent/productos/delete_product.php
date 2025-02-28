<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../index.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: list_products.php");
    exit;
}

try {
    $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $smt = $conexion->prepare("DELETE FROM productos WHERE id = :id");
    $smt->bindParam(':id', $_GET['id']);
    $smt->execute();
    header("Location: list_products.php");
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>