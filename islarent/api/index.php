<?php
require 'vendor/autoload.php';
try {
    //La API secreta se obtiene de la plataforma Stripe totalmente gratis
    \Stripe\Stripe::setApiKey('SECRET KEY');
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    $paymentMethod = $_POST['payment_method'] ?? '';
    $reserva_id = $_POST['reserva_id'] ?? '';
    if ($amount <= 0 || empty($paymentMethod) || empty($reserva_id)) {
        die("Error: Cantidad inválida, método de pago o ID de reserva no recibido.");
    }
    try {
        $amountInCents = intval($amount * 100);
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $amountInCents,
            'currency' => 'eur',
            'payment_method' => $paymentMethod,
            'confirm' => true,
            'automatic_payment_methods' => [
                'enabled' => true,
                'allow_redirects' => 'never'
            ],
        ]);

        if ($paymentIntent->status === 'succeeded') {
            echo "PaymentIntent succeeded. ID: " . $paymentIntent->id . "<br>";

            try {
                $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexión a la base de datos exitosa.<br>";
                echo "ID de reserva recibido: " . $reserva_id . "<br>";

                $query = "UPDATE reservas SET estado = 'confirmada' WHERE id = :id";
                $smt = $conexion->prepare($query);
                $smt->bindParam(':id', $reserva_id, PDO::PARAM_INT);
                $smt->execute();

                if ($smt->rowCount() > 0) {
                    echo "Reserva actualizada a confirmada. ID de reserva: " . $reserva_id;
                } else {
                    echo "Error: No se pudo actualizar la reserva. ID de reserva: " . $reserva_id;
                }
            } catch (PDOException $e) {
                echo "Error de conexión a la base de datos: " . $e->getMessage();
            }
        } else {
            echo "Error: El pago no se pudo completar. Estado: " . $paymentIntent->status;
        }
    } catch (\Stripe\Exception\ApiErrorException $e) {
        echo "Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
