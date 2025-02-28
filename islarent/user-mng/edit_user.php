<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    try {
        $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smt = $conexion->prepare("UPDATE usuarios SET nombre = :nombre, email = :email, telefono = :telefono WHERE id = :id");
        $smt->bindParam(':nombre', $nombre);
        $smt->bindParam(':email', $correo);
        $smt->bindParam(':telefono', $telefono);
        $smt->bindParam(':id', $id);
        $smt->execute();

        header("Location: panel_usuarios.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $id = $_GET['id'];

    try {
        $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $smt = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id");
        $smt->bindParam(':id', $id);
        $smt->execute();
        $usuario = $smt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>

<body>
    <h1>Editar Usuario</h1>
    <form action="edit_user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
        <input type="submit" value="Guardar cambios">
    </form>
</body>

</html>