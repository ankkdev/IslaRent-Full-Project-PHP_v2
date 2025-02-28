<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: sign_in.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $reserva_id = $_POST['reserva_id'];

        $query = "SELECT producto_id FROM reservas WHERE id = :reserva_id";
        $smt = $conexion->prepare($query);
        $smt->bindParam(':reserva_id', $reserva_id);
        $smt->execute();
        $reserva = $smt->fetch(PDO::FETCH_ASSOC);

        if ($reserva) {
            $producto_id = $reserva['producto_id'];

            $query = "DELETE FROM reservas WHERE id = :reserva_id";
            $smt = $conexion->prepare($query);
            $smt->bindParam(':reserva_id', $reserva_id);
            $smt->execute();

            $query = "UPDATE productos SET disponibilidad = 1 WHERE id = :producto_id";
            $smt = $conexion->prepare($query);
            $smt->bindParam(':producto_id', $producto_id);
            $smt->execute();
        }

        header("Location: mis_reservas.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit;
}
?>