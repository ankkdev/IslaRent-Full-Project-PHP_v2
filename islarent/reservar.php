<?php
session_start();

require('fpdf/fpdf.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: sign_in.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $usuario_id = $_SESSION['usuario_id'];
        $producto_id = $_POST['producto_id'];

        $query = "INSERT INTO reservas (usuario_id, producto_id) VALUES (:usuario_id, :producto_id)";
        $smt = $conexion->prepare($query);
        $smt->bindParam(':usuario_id', $usuario_id);
        $smt->bindParam(':producto_id', $producto_id);
        $smt->execute();

        $query = "UPDATE productos SET disponibilidad = 0 WHERE id = :producto_id";
        $smt = $conexion->prepare($query);
        $smt->bindParam(':producto_id', $producto_id);
        $smt->execute();

        $query = "SELECT * FROM productos WHERE id = :producto_id";
        $smt = $conexion->prepare($query);
        $smt->bindParam(':producto_id', $producto_id);
        $smt->execute();
        $producto = $smt->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM usuarios WHERE id = :usuario_id";
        $smt = $conexion->prepare($query);
        $smt->bindParam(':usuario_id', $usuario_id);
        $smt->execute();
        $usuario = $smt->fetch(PDO::FETCH_ASSOC);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Comprobante de Reserva', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Datos del Producto:', 0, 1);
        $pdf->Cell(0, 10, 'Nombre: ' . $producto['nombre'], 0, 1);
        $pdf->Cell(0, 10, 'Descripcion: ' . $producto['descripcion'], 0, 1);
        $pdf->Cell(0, 10, 'Precio: ' . $producto['precio'] . ' €', 0, 1);
        $pdf->Cell(0, 10, 'Isla: ' . $producto['isla'], 0, 1);
        $pdf->Cell(0, 10, 'Tipo de Local: ' . $producto['tipo_local'], 0, 1);
        $pdf->Cell(0, 10, 'Fecha: ' . $producto['fecha'], 0, 1);
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Datos del Usuario:', 0, 1);
        $pdf->Cell(0, 10, 'Nombre: ' . $usuario['nombre'], 0, 1);
        $pdf->Cell(0, 10, 'Correo: ' . $usuario['email'], 0, 1);
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Datos de la Reserva:', 0, 1);
        $pdf->Cell(0, 10, 'Fecha de Reserva: ' . date('Y-m-d H:i:s'), 0, 1);

        $pdf->Output('D', 'comprobante_' . $usuario_id . '_' . $producto_id . '.pdf');

        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit;
}
