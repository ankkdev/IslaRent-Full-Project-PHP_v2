<?php
session_start();

require('fpdf/fpdf.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: sign_in.php");
    exit;
}

try {
    $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $usuario_id = $_SESSION['usuario_id'];

    $query = "SELECT r.*, p.nombre, p.descripcion, p.precio, p.isla, p.tipo_local, p.fecha 
              FROM reservas r 
              JOIN productos p ON r.producto_id = p.id 
              WHERE r.usuario_id = :usuario_id";
    $smt = $conexion->prepare($query);
    $smt->bindParam(':usuario_id', $usuario_id);
    $smt->execute();
    $reservas = $smt->fetchAll(PDO::FETCH_ASSOC);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Historial de Reservas', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);

    foreach ($reservas as $reserva) {
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Nombre: ' . $reserva['nombre'], 0, 1);
        $pdf->Cell(0, 10, 'Descripcion: ' . $reserva['descripcion'], 0, 1);
        $pdf->Cell(0, 10, 'Precio: ' . $reserva['precio'] . ' €', 0, 1);
        $pdf->Cell(0, 10, 'Isla: ' . $reserva['isla'], 0, 1);
        $pdf->Cell(0, 10, 'Tipo de Local: ' . $reserva['tipo_local'], 0, 1);
        $pdf->Cell(0, 10, 'Fecha: ' . $reserva['fecha'], 0, 1);
        $pdf->Cell(0, 10, 'Fecha de Reserva: ' . $reserva['fecha_reserva'], 0, 1);
    }

    $pdf->Output('D', 'historial_reservas_' . $usuario_id . '.pdf');
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>