<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../index.php");
    exit;
}
$id = $_GET['id'];
try {
    $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $smt = $conexion->prepare("DELETE FROM usuarios WHERE id = :id");
    $smt->bindParam(':id', $id);
    $smt->execute();

    header("Location: panel_usuarios.php");
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
