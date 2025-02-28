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
    <link rel="stylesheet" href="assets/styleºs/styles.css" />
    <style>
          body {
  font-family: 'Playfair Display', serif;
}

</style>
    </style>
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
            <li><a href="index.php"
                    class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Inicio</a></li>
            <li><a href="best-houses.php"
                    class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Mejores
                    viviendas</a></li>
            <li><a href="who.php"
                    class="block text-black font-bold p-3 rounded-md hover:bg-blue-700 hover:text-white">Nosotros</a></li>
            <li><a href="faq.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Preguntas
                    Frecuentes (FAQ)</a></li>
            <?php
            if (isset($_SESSION['usuario_id'])) {
                echo '<li><a href="mis_reservas.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Mis Reservas</a></li>';
                echo '      <li><a href="logout.php"><img src="assets/images/user.svg" class="w-8 h-8">Cerrar sesión</a></li>';
            } else {
                echo '      <li><a href="sign_in.php"><img src="assets/images/user.svg" class="w-8 h-8">Iniciar sesión</a></li>';
            }
            ?>
        </ul>
    </header>

    <main class="flex-1 p-4 py-8 bg-white h-screen flex justify-center">
        <section id="about" class="bg-gray-100 py-12 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-6" style="font-family: 'Playfair Display', serif;">Quiénes Somos</h2>
                <article class="text-gray-700 leading-relaxed">
                    <p>
                        En <strong>Islarent</strong>, somos especialistas en ofrecer las mejores opciones de alquiler
                        vacacional y residencial en las <strong>Islas Canarias</strong>.
                        Nuestro objetivo es conectar a propietarios con inquilinos, brindando una experiencia de
                        alojamiento cómoda, segura y adaptada a cada necesidad.
                    </p>
                    <p class="mt-4">
                        Con años de experiencia en el sector inmobiliario, nos hemos convertido en una plataforma de
                        confianza para quienes buscan un hogar temporal
                        o una escapada inolvidable en este paraíso.
                    </p>
                </article>

                <article class="mt-8">
                    <h3 class="text-2xl font-semibold text-gray-800" style="font-family: 'Playfair Display', serif;">Nuestra Misión</h3>
                    <p class="text-gray-700 mt-2">
                        Facilitar el acceso a viviendas en las islas, garantizando un servicio transparente y de
                        calidad. Creemos en la importancia de ofrecer
                        alojamientos bien ubicados, totalmente equipados y con la mejor relación calidad-precio.
                    </p>
                </article>

                <article class="mt-8">
                    <h3 class="text-2xl font-semibold text-gray-800" style="font-family: 'Playfair Display', serif;">¿Por qué elegirnos?</h3>
                    <ul class="text-gray-700 mt-2 list-disc list-inside">
                        <li>Amplia selección de casas y apartamentos en ubicaciones privilegiadas.</li>
                        <li>Proceso de reserva rápido, seguro y sin complicaciones.</li>
                        <li>Atención personalizada para resolver cualquier duda o necesidad.</li>
                        <li>Compromiso con la satisfacción del cliente y la excelencia en el servicio.</li>
                    </ul>
                </article>
            </div>
        </section>

    </main>
    <footer class="bg-yellow-400 w-full p-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold">Islarent</h2>
                <p class="mt-2">Casas y pisos en Islas Canarias</p>
            </div>
            <div class="flex flex-col md:flex-row items-center mt-4 md:mt-0">
                <a href="index.php" class="text-black p-2 hover:underline">Inicio</a>
                <a href="best-houses.php" class="text-black p-2 hover:underline">Mejores viviendas</a>
                <a href="who.php" class="text-black font-bold p-2 hover:underline">Nosotros</a>
                <a href="faq.php" class="text-black p-2 hover:underline">Preguntas Frecuentes (FAQ)</a>
            </div>
        </div>
    </footer>

    <script src="assets/script/main.js"></script>
</body>

</html>