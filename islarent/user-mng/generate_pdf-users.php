<?php
require('../fpdf/fpdf.php');

session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../index.php");
    exit;
}

try {
    $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $smt = $conexion->prepare("SELECT * FROM usuarios");
    $smt->execute();
    $usuarios = $smt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'ID');
$pdf->Cell(40, 10, 'Nombre');
$pdf->Cell(60, 10, 'Correo');
$pdf->Cell(40, 10, 'Telefono');
$pdf->Ln();

foreach ($usuarios as $usuario) {
    $pdf->Cell(40, 10, $usuario['id']);
    $pdf->Cell(40, 10, $usuario['nombre']);
    $pdf->Cell(60, 10, $usuario['email']);
    $pdf->Cell(40, 10, $usuario['telefono']);
    $pdf->Ln();
}

$pdf->Output('D', 'usuarios.pdf');
