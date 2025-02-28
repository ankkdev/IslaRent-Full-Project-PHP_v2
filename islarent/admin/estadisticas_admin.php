<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../sign_in.php");
    exit;
}

try {
    $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT p.nombre, COUNT(r.id) AS num_reservas 
              FROM productos p 
              LEFT JOIN reservas r ON p.id = r.producto_id 
              GROUP BY p.id";
    $smt = $conexion->prepare($query);
    $smt->execute();
    $estadisticas = $smt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - Islarent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>

<body class="flex flex-col min-h-screen font-sans bg-gray-100">
    <header class="bg-yellow-400 p-4 shadow-md">
        <nav class="flex justify-between items-center">
            <img src="../assets/images/brands/isotipo_png.png" alt="Logo" class="w-12 h-12">
            <button id="menu-btn" class="md:hidden text-3xl">
                ☰
            </button>
        </nav>
        <ul id="menu"
            class="hidden md:flex flex-col md:flex-row items-center justify-center space-y-2 md:space-y-0 md:space-x-4 mt-2 md:mt-0">
            <li><a href="index.php" class="block text-black font-bold p-3 rounded-md hover:bg-blue-700 hover:text-white">Inicio</a></li>
            <li><a href="admin.php" class="block text-black font-bold p-3 rounded-md hover:bg-blue-700 hover:text-white">Administración</a></li>
            <li><a href="logout.php"><img src="../assets/images/user.svg" class="w-8 h-8">Cerrar sesión</a></li>
        </ul>
    </header>

    <main class="flex-1 p-4 py-8 bg-white h-screen flex justify-center">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold mb-6 text-center text-gray-800">Estadísticas de Ocupación</h2>
            <form method="POST" action="generar_pdf_estadisticas.php" class="flex justify-center mb-6">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Descargar Estadísticas</button>
            </form>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (!empty($estadisticas)): ?>
                    <?php foreach ($estadisticas as $estadistica): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold mb-2 text-gray-800"><?php echo htmlspecialchars($estadistica['nombre']); ?></h2>
                            <p class="text-gray-700 mb-2">Número de Reservas: <?php echo htmlspecialchars($estadistica['num_reservas']); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center text-gray-600">No hay estadísticas disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer class="bg-yellow-400 w-full p-4 shadow-md">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold">Islarent</h2>
                <p class="mt-2">Casas y pisos en Islas Canarias</p>
            </div>
            <div class="flex flex-col md:flex-row items-center mt-4 md:mt-0">
                <a href="index.php" class="text-black font-bold p-2 hover:underline">Inicio</a>
                <a href="best-houses.php" class="text-black p-2 hover:underline">Mejores viviendas</a>
                <a href="who.php" class="text-black p-2 hover:underline">Nosotros</a>
                <a href="faq.php" class="text-black p-2 hover:underline">Preguntas Frecuentes (FAQ)</a>
            </div>
        </div>
    </footer>
</body>

</html>