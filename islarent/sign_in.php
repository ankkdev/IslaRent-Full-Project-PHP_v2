<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Islarent - Casas y pisos en Islas Canarias</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/styles/styles.css" />
</head>

<body class="flex flex-col min-h-screen font-sans m-0">
    <header class="bg-yellow-400 p-4">
        <nav class="flex justify-between items-center">
            <img src="assets/images/brands/isotipo_png.png" alt="Logo" class="w-12 h-12">
            <button id="menu-btn" class="md:hidden text-3xl">
                ☰
            </button>
        </nav>
        <ul id="menu"
            class="hidden md:flex flex-col md:flex-row items-center justify-center space-y-2 md:space-y-0 md:space-x-4 mt-2 md:mt-0">
            <li><a href="index.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Inicio</a>
            </li>
            <li><a href="best-houses.php"
                    class="block text-black font-bold p-3 rounded-md hover:bg-blue-700 hover:text-white">Mejores
                    viviendas</a></li>
            <li><a href="who.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Nosotros</a>
            </li>
            <li><a href="faq.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Preguntas
                    Frecuentes (FAQ)</a></li>
            <?php
            if (isset($_SESSION['usuario_id'])) {
                echo '      <li><a href="logout.php"><img src="assets/images/user.svg" class="w-8 h-8">Cerrar sesión</a></li>';
            } else {
                echo '      <li><a href="sign_in.php"><img src="assets/images/user.svg" class="w-8 h-8">Iniciar sesión</a></li>';
            }
            ?>
        </ul>
    </header>

    <main class="flex-1 flex-col items-center justify-center p-4 bg-white h-screen flex">
        <h1 class="text-3xl font-semibold text-gray-900 mb-6">Iniciar sesión</h1>
        <form action="login.php" autocomplete="off" method="POST" class="border border-blue-500 rounded-lg p-10 self-center">
            <div class="mb-4">
                <input type="text" name="correo" placeholder="Correo" required class="w-full p-3  border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <input type="password" name="pswd" autocomplete="new-password" placeholder="Contraseña" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <input type="submit" value="Iniciar sesión" required class="bg-blue-500  w-full text-white p-3 rounded-md hover:bg-blue-700 focus:ring-green-500">
            <a href="sign_up.php" class="text-blue-500 hover:text-blue-950">No tienes cuenta? Regístrate</a>
        </form>
    </main>
    <footer class="bg-yellow-400 w-full p-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold">Islarent</h2>
                <p class="mt-2">Casas y pisos en Islas Canarias</p>
            </div>
            <div class="flex flex-col md:flex-row items-center mt-4 md:mt-0">
                <a href="index.php" class="text-black p-2 hover:underline">Inicio</a>
                <a href="best-houses.php" class="text-black font-bold p-2 hover:underline">Mejores viviendas</a>
                <a href="who.php" class="text-black p-2 hover:underline">Nosotros</a>
                <a href="faq.php" class="text-black p-2 hover:underline">Preguntas Frecuentes (FAQ)</a>
            </div>
        </div>
    </footer>

    <script src="assets/script/main.js"></script>
</body>

</html>