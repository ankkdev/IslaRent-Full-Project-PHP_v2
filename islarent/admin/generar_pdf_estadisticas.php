<?php
session_start();

require('../fpdf/fpdf.php');

if (!isset($_SESSION['admin'])) {
    header("Location: ../sign_in.php");
    exit;
}

try {
    $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT p.nombre, COUNT(r.id) AS num_reservas 
              FROM productos p 
              LEFT JOIN reservas r ON p.id = r.producto_id 
              GROUP BY p.id";
    $smt = $conexion->prepare($query);
    $smt->execute();
    $estadisticas = $smt->fetchAll(PDO::FETCH_ASSOC);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Estadísticas de Ocupación', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);

    foreach ($estadisticas as $estadistica) {
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Producto: ' . $estadistica['nombre'], 0, 1);
        $pdf->Cell(0, 10, 'Número de Reservas: ' . $estadistica['num_reservas'], 0, 1);
    }

    $pdf->Output('D', 'estadisticas_ocupacion.pdf');
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
