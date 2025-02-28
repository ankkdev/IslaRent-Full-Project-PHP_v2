<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $smt = $conexion->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, fecha = :fecha, disponibilidad = :disponibilidad WHERE id = :id");
        $smt->bindParam(':nombre', $_POST['nombre']);
        $smt->bindParam(':descripcion', $_POST['descripcion']);
        $smt->bindParam(':precio', $_POST['precio']);
        $smt->bindParam(':fecha', $_POST['fecha']);
        $smt->bindParam(':disponibilidad', $_POST['disponibilidad']);
        $smt->bindParam(':id', $_POST['id']);
        $smt->execute();
        header("Location: list_products.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    if (!isset($_GET['id'])) {
        header("Location: list_products.php");
        exit;
    }

    try {
        $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $smt = $conexion->prepare("SELECT * FROM productos WHERE id = :id");
        $smt->bindParam(':id', $_GET['id']);
        $smt->execute();
        $producto = $smt->fetch(PDO::FETCH_ASSOC);
        if (!$producto) {
            header("Location: list_products.php");
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $producto = [];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>
    <h1>Editar Producto</h1>
    <form action="edit_product.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['id']); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($producto['fecha']); ?>" required>
        <label for="disponibilidad">Disponibilidad:</label>
        <select id="disponibilidad" name="disponibilidad" required>
            <option value="1" <?php if ($producto['disponibilidad']) echo 'selected'; ?>>Disponible</option>
            <option value="0" <?php if (!$producto['disponibilidad']) echo 'selected'; ?>>No disponible</option>
        </select>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="list_products.php">Volver a la lista de productos</a>
</body>

</html>