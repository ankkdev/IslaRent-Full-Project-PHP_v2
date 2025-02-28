<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../index.php");
    exit;
}
try {
    $conexion = new pdo('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $smt = $conexion->prepare("SELECT * FROM usuarios");
    $smt->execute();
    $usuarios = $smt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $usuarios = [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion usuarios</title>
</head>

<body>
    <h1>Gestion usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($usuarios)) {
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>" . $usuario['id'] . "</td>";
                    echo "<td>" . $usuario['nombre'] . "</td>";
                    echo "<td>" . $usuario['email'] . "</td>";
                    echo "<td>" . $usuario['telefono'] . "</td>";
                    echo "<td>";
                    echo '<a href="edit_user.php?id=' . $usuario['id'] . '">Editar</a>';
                    echo '<a href="delete_user.php?id=' . $usuario['id'] . '">Eliminar</a>';
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "No hay usuarios disponibles";
            }

            ?>
        </tbody>
    </table>
    <a href="generate_pdf-users.php">Descargar lista usuarios en .pdf</a><br>
    <a href="../productos/list_products.php">Lista productos</a><br>
    <a href="../admin/estadisticas_admin.php">Estadísticas ocupación viviendas</a><br>
    <a href="../index.php">Ir a inicio</a>
</body>

</html>