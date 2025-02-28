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
</head>

<body class="flex flex-col min-h-screen font-sans m-0">
    <header class="bg-yellow-400 p-4">
        <nav class="flex justify-between items-center">
            <img src="assets/images/brands/isotipo_png.png" alt="Logo" class="w-12 h-12" />
            <button id="menu-btn" class="md:hidden text-3xl">☰</button>
        </nav>
        <ul id="menu"
            class="hidden md:flex flex-col md:flex-row items-center justify-center space-y-2 md:space-y-0 md:space-x-4 mt-2 md:mt-0">
            <li>
                <a href="index.php"
                    class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Inicio</a>
            </li>
            <li>
                <a href="best-houses.php"
                    class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Mejores viviendas</a>
            </li>
            <li>
                <a href="who.php"
                    class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Nosotros</a>
            </li>
            <li>
                <a href="faq.php"
                    class="block text-black font-bold p-3 rounded-md hover:bg-blue-700 hover:text-white">Preguntas
                    Frecuentes (FAQ)</a>
            </li>
            <li>
                <?php
                if (isset($_SESSION['usuario_id'])) {
                    echo '<li><a href="mis_reservas.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Mis Reservas</a></li>';
                    echo '      <li><a href="logout.php"><img src="assets/images/user.svg" class="w-8 h-8">Cerrar sesión</a></li>';
                } else {
                    echo '      <li><a href="sign_in.php"><img src="assets/images/user.svg" class="w-8 h-8">Iniciar sesión</a></li>';
                }
                ?>
            </li>
        </ul>
    </header>

    <main class="max-w-4xl mx-auto p-6 mt-6 bg-white shadow-lg rounded-lg">
        <section class="space-y-6 p-3 bg-gray-200 rounded-2xl">
            <article>
                <h2 class="text-xl font-semibold text-gray-8001" style="font-family: Poppins, sans-serif; font-weight: 600;">
                    📌 ¿Cómo puedo reservar una casa?
                </h2>
                <p class="text-gray-700 mt-2">
                    Para reservar una vivienda, simplemente selecciona la propiedad
                    deseada, elige las fechas y sigue los pasos del formulario de
                    reserva. Recibirás un correo de confirmación con los detalles.
                </p>
            </article>

            <article>
                <h2 class="text-xl font-semibold text-gray-800" style="font-family: Poppins, sans-serif; font-weight: 600;">
                    📌 ¿Cuáles son los métodos de pago aceptados?
                </h2>
                <p class="text-gray-700 mt-2">
                    Aceptamos pagos con tarjeta de crédito/débito, PayPal y
                    transferencia bancaria. También puedes optar por pagar una parte por
                    adelantado y el resto al momento de la llegada.
                </p>
            </article>

            <article>
                <h2 class="text-xl font-semibold text-gray-800" style="font-family: Poppins, sans-serif; font-weight: 600;">
                    📌 ¿Puedo cancelar una reserva?
                </h2>
                <p class="text-gray-700 mt-2">
                    Sí, puedes cancelar tu reserva según nuestra política de
                    cancelación. Algunas propiedades permiten cancelación gratuita hasta
                    7 días antes de la fecha de llegada.
                </p>
            </article>

            <article>
                <h2 class="text-xl font-semibold text-gray-800" style="font-family: Poppins, sans-serif; font-weight: 600;">
                    📌 ¿Cómo puedo contactar con el propietario?
                </h2>
                <p class="text-gray-700 mt-2">
                    Una vez confirmada la reserva, recibirás los datos de contacto del
                    propietario para resolver cualquier duda antes de tu llegada.
                </p>
            </article>

            <article>
                <h2 class="text-xl font-semibold text-gray-800" style="font-family: Poppins, sans-serif; font-weight: 600;">
                    📌 ¿Las casas están amuebladas y equipadas?
                </h2>
                <p class="text-gray-700 mt-2">
                    Sí, todas las propiedades cuentan con muebles y electrodomésticos
                    básicos. En la descripción de cada vivienda se detallan los
                    servicios incluidos.
                </p>
            </article>
        </section>
    </main>

    <footer class="bg-yellow-400 w-full p-4 mt-auto">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold">Islarent</h2>
                <p class="mt-2">Casas y pisos en Islas Canarias</p>
            </div>
            <div class="flex flex-col md:flex-row items-center mt-4 md:mt-0">
                <a href="index.php" class="text-black p-2 hover:underline">Inicio</a>
                <a href="best-houses.php" class="text-black p-2 hover:underline">Mejores viviendas</a>
                <a href="who.php" class="text-black p-2 hover:underline">Nosotros</a>
                <a href="faq.php" class="text-black font-bold p-2 hover:underline">Preguntas Frecuentes (FAQ)</a>
            </div>
        </div>
    </footer>

    <script src="assets/script/main.js"></script>
</body>

</html>