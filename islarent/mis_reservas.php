<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: sign_in.php");
    exit;
}

try {
    $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $usuario_id = $_SESSION['usuario_id'];

    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $query = "SELECT r.*, p.nombre, p.descripcion, p.precio, p.isla, p.tipo_local, p.fecha, u.id AS usuario_id 
              FROM reservas r 
              JOIN productos p ON r.producto_id = p.id 
              JOIN usuarios u ON r.usuario_id = u.id 
              WHERE r.usuario_id = :usuario_id 
              AND (u.id LIKE :search)";
    $smt = $conexion->prepare($query);
    $smt->bindParam(':usuario_id', $usuario_id);
    $smt->bindValue(':search', '%' . $search . '%');
    $smt->execute();
    $reservas = $smt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas - Islarent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>

<body class="flex flex-col min-h-screen font-sans bg-gray-100">
    <header class="bg-yellow-400 p-4 shadow-md">
        <nav class="flex justify-between items-center">
            <img src="assets/images/brands/isotipo_png.png" alt="Logo" class="w-12 h-12">
            <button id="menu-btn" class="md:hidden text-3xl">
                ☰
            </button>
        </nav>
        <ul id="menu"
            class="hidden md:flex flex-col md:flex-row items-center justify-center space-y-2 md:space-y-0 md:space-x-4 mt-2 md:mt-0">
            <li><a href="index.php" class="block text-black font-bold p-3 rounded-md hover:bg-blue-700 hover:text-white">Inicio</a></li>
            <li><a href="best-houses.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Mejores viviendas</a></li>
            <li><a href="who.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Nosotros</a></li>
            <li><a href="faq.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Preguntas Frecuentes (FAQ)</a></li>
            <?php
            if (isset($_SESSION['usuario_id'])) {
                echo '<li><a href="mis_reservas.php" class="block text-black font-bold p-3 rounded-md hover:bg-blue-700 hover:text-white">Mis Reservas</a></li>';
                echo '<li><a href="logout.php"><img src="assets/images/user.svg" class="w-8 h-8">Cerrar sesión</a></li>';
            } else {
                echo '<li><a href="sign_in.php"><img src="assets/images/user.svg" class="w-8 h-8">Iniciar sesión</a></li>';
            }
            ?>
        </ul>
    </header>

    <main class="flex-1 p-4 py-8 bg-white h-screen flex justify-center">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold mb-6 text-center text-gray-800" style="font-family: 'Playfair Display', serif;">Mis Reservas</h2>
            
            <form method="GET" class="mb-6 flex justify-center">
                <input type="text" name="search" placeholder="Buscar por ID de usuario" class="border border-gray-300 rounded-l px-4 py-2 w-1/2" value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r">Buscar</button>
            </form>
            <form method="POST" action="generar_pdf_historial_reservas.php" class="flex justify-center mb-6">
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Descargar Historial de Reservas</button>
            </form>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (!empty($reservas)): ?>
    <?php foreach ($reservas as $reserva): ?>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-2 text-gray-800"><?php echo htmlspecialchars($reserva['nombre']); ?></h2>
            <p class="text-gray-700 mb-2"><?php echo htmlspecialchars($reserva['descripcion']); ?></p>
            <p class="text-gray-900 font-semibold mb-2">Precio: <?php echo htmlspecialchars($reserva['precio']); ?> €</p>
            <p class="text-gray-600 mb-2">Isla: <?php echo htmlspecialchars($reserva['isla']); ?></p>
            <p class="text-gray-600 mb-2">Tipo de Local: <?php echo htmlspecialchars($reserva['tipo_local']); ?></p>
            <p class="text-gray-600 mb-2">Fecha: <?php echo htmlspecialchars($reserva['fecha']); ?></p>
            <p class="text-gray-600 mb-2">Fecha de Reserva: <?php echo htmlspecialchars($reserva['fecha_reserva']); ?></p>
            <p class="text-gray-600 mb-2">Usuario ID: <?php echo htmlspecialchars($reserva['usuario_id']); ?></p>
            <?php if ($reserva['estado'] === 'pendiente'): ?>
                <form method="POST" action="../islarent/api/form.php" class="mt-4">
                    <input type="hidden" name="reserva_id" value="<?php echo htmlspecialchars($reserva['id']); ?>">
                    <input type="hidden" name="amount" value="<?php echo htmlspecialchars($reserva['precio']); ?>">
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Pagar</button>
                </form>
            <?php endif; ?>
            <form method="POST" action="cancelar_reserva.php" class="mt-4">
                <input type="hidden" name="reserva_id" value="<?php echo htmlspecialchars($reserva['id']); ?>">
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Cancelar</button>
            </form>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center text-gray-600">No tienes reservas.</p>
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