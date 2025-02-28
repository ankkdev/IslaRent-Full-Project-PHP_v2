<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../index.php");
    exit;
}

try {
    $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $isla = isset($_GET['isla']) ? $_GET['isla'] : '';
    $tipo_local = isset($_GET['tipo_local']) ? $_GET['tipo_local'] : '';

    $query = "SELECT p.*, GROUP_CONCAT(i.ruta SEPARATOR ',') AS imagenes FROM productos p LEFT JOIN imagenes_productos i ON p.id = i.producto_id WHERE 1=1";
    if ($isla) {
        $query .= " AND p.isla = :isla";
    }
    if ($tipo_local) {
        $query .= " AND p.tipo_local = :tipo_local";
    }
    $query .= " GROUP BY p.id";

    $smt = $conexion->prepare($query);
    if ($isla) {
        $smt->bindParam(':isla', $isla);
    }
    if ($tipo_local) {
        $smt->bindParam(':tipo_local', $tipo_local);
    }
    $smt->execute();
    $productos = $smt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $productos = [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Productos</h1>

        <form method="GET" class="mb-4">
            <div class="flex space-x-4">
                <div>
                    <label for="isla" class="block text-sm font-medium text-gray-700">Isla</label>
                    <select id="isla" name="isla" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Todas</option>
                        <option value="Lanzarote">Lanzarote</option>
                        <option value="Tenerife">Tenerife</option>
                        <option value="Gran Canaria">Gran Canaria</option>
                        <option value="Fuerteventura">Fuerteventura</option>
                        <option value="La Palma">La Palma</option>
                        <option value="La Gomera">La Gomera</option>
                        <option value="El Hierro">El Hierro</option>
                    </select>
                </div>
                <div>
                    <label for="tipo_local" class="block text-sm font-medium text-gray-700">Tipo de Local</label>
                    <select id="tipo_local" name="tipo_local" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Todos</option>
                        <option value="Apartamento">Apartamento</option>
                        <option value="Local">Local</option>
                        <option value="Casa">Casa</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Filtrar</button>
                </div>
            </div>
        </form>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Descripción</th>
                    <th class="py-2 px-4 border-b">Precio</th>
                    <th class="py-2 px-4 border-b">Fecha</th>
                    <th class="py-2 px-4 border-b">Disponibilidad</th>
                    <th class="py-2 px-4 border-b">Isla</th>
                    <th class="py-2 px-4 border-b">Tipo de Local</th>
                    <th class="py-2 px-4 border-b">Imágenes</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <a href="add_products.php" class="mt-4 m-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Añadir Producto</a>

                <?php
                if (!empty($productos)) {
                    foreach ($productos as $producto) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($producto['id']) . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($producto['nombre']) . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($producto['descripcion']) . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($producto['precio']) . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($producto['fecha']) . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . ($producto['disponibilidad'] ? 'Disponible' : 'No disponible') . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($producto['isla']) . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($producto['tipo_local']) . "</td>";
                        echo "<td class='py-2 px-4 border-b'>";
                        if ($producto['imagenes']) {
                            $imagenes = explode(',', $producto['imagenes']);
                            foreach ($imagenes as $imagen) {
                                $imagen = trim($imagen);
                                $ruta = "uploads/{$producto['id']}/$imagen";
                                echo "<img src='" . htmlspecialchars($ruta, ENT_QUOTES, 'UTF-8') . "' alt='Imagen del producto' class='w-24 h-auto mb-2'>";
                            }
                        } else {
                            echo "No hay imagen";
                        }
                        echo "</td>";
                        echo "<td class='py-2 px-4 border-b'>";
                        echo "<a href='edit_product.php?id=" . htmlspecialchars($producto['id']) . "' class='text-blue-500 hover:underline mr-2'>Editar</a>";
                        echo "<a href='delete_product.php?id=" . htmlspecialchars($producto['id']) . "' class='text-red-500 hover:underline' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este producto?\");'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10' class='py-2 px-4 border-b text-center'>No hay productos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>