<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telf'];
    $contraa = $_POST['pswd'];
    $confirmar_contraa = $_POST['s_pswd'];

    if ($contraa != $confirmar_contraa) {
        echo "Las contraseñas son distintas";
        exit;
    }
    try {
        $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smt = $conexion->prepare("SELECT * FROM USUARIOS  WHERE email = :email");
        $smt->bindParam(':email', $email);
        $smt->execute();
        if ($smt->rowCount() > 0) {
            echo "El correo ya esta registrado";
            exit;
        }
        $password_hash = password_hash($contraa, PASSWORD_DEFAULT);
        $smt = $conexion->prepare("INSERT INTO usuarios (nombre,email,telefono,password) VALUES (:nombre,:email,:telefono,:password)");

        $smt->bindParam(':nombre', $nombre);
        $smt->bindParam(':email', $correo);
        $smt->bindParam(':telefono', $telefono);
        $smt->bindParam(':password', $password_hash);
        $smt->execute();

        $_SESSION['usuario_id'] = $conexion->lastInsertId();
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $correo;
        echo "Usuario registrado con exito";
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
