<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['correo'];
    $contra = $_POST['pswd'];
    try {
        $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smt = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
        $smt->bindParam(':email', $email);
        $smt->execute();
        $usuario = $smt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($contra, $usuario['password'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                if ($usuario['rol']==='admin') {
                    $_SESSION['admin'] = true;
                    header("Location: user-mng/panel_usuarios.php");
                } else {
                    header("Location: index.php");
                }
                exit;
            } else {
                echo "Contraseña incorrecta<br><a href='sign_in.php'>Intentar de nuevo</a>";
            }
        } else {
            echo "El usuario no existe<br>";
            echo '<a href="sign_up.php">No tienes cuenta? Regístrate</a>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
