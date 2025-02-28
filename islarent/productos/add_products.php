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

        $smt = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, fecha, disponibilidad, isla, tipo_local) VALUES (:nombre, :descripcion, :precio, :fecha, :disponibilidad, :isla, :tipo_local)");
        $smt->bindParam(':nombre', $_POST['nombre']);
        $smt->bindParam(':descripcion', $_POST['descripcion']);
        $smt->bindParam(':precio', $_POST['precio']);
        $smt->bindParam(':fecha', $_POST['fecha']);
        $smt->bindParam(':disponibilidad', $_POST['disponibilidad']);
        $smt->bindParam(':isla', $_POST['isla']);
        $smt->bindParam(':tipo_local', $_POST['tipo_local']);
        $smt->execute();
        $producto_id = $conexion->lastInsertId();

        $upload_dir = "uploads/$producto_id";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
            $file_name = basename($_FILES['imagenes']['name'][$key]);
            $file_path = "$upload_dir/$file_name";
            if (move_uploaded_file($tmp_name, $file_path)) {
                $smt = $conexion->prepare("INSERT INTO imagenes_productos (producto_id, ruta) VALUES (:producto_id, :ruta)");
                $smt->bindParam(':producto_id', $producto_id);
                $smt->bindParam(':ruta', $file_name);
                $smt->execute();
            }
        }

        header("Location: list_products.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Añadir Producto</h1>
        <form action="add_products.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" required>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            <label for="disponibilidad">Disponibilidad:</label>
            <select id="disponibilidad" name="disponibilidad" required>
                <option value="1">Disponible</option>
                <option value="0">No disponible</option>
            </select>
            <label for="isla">Isla:</label>
            <select id="isla" name="isla" required>
                <option value="Lanzarote">Lanzarote</option>
                <option value="Tenerife">Tenerife</option>
                <option value="Gran Canaria">Gran Canaria</option>
                <option value="Fuerteventura">Fuerteventura</option>
                <option value="La Palma">La Palma</option>
                <option value="La Gomera">La Gomera</option>
                <option value="El Hierro">El Hierro</option>
            </select>
            <label for="tipo_local">Tipo de Local:</label>
            <select id="tipo_local" name="tipo_local" required>
                <option value="Apartamento">Apartamento</option>
                <option value="Local">Local</option>
                <option value="Casa">Casa</option>
            </select>
            <label for="imagenes">Imágenes:</label>
            <input type="file" id="imagenes" name="imagenes[]" multiple required>
            <button type="submit" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Añadir Producto</button>
        </form>
    </div>
</body>
</html>