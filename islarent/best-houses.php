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
  <!-- alpine.js para meterle un carrusel,en modo online (SIN DEFER,NO VA IGUAL) -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.2/dist/cdn.min.js" defer></script>--
  <!-- alpine.js para meterle un carrusel,en modo online-->
  <script src="assets/script/alpinejs/cdn.min.js" defer></script><!-- (SIN DEFER,NO VA IGUAL) -->
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
        echo '<li><a href="mis_reservas.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Mis Reservas</a></li>';
        echo '      <li><a href="logout.php"><img src="assets/images/user.svg" class="w-8 h-8">Cerrar sesión</a></li>';
      } else {
        echo '      <li><a href="sign_in.php"><img src="assets/images/user.svg" class="w-8 h-8">Iniciar sesión</a></li>';
      }
      ?>
    </ul>
  </header>

  <main class="flex-1 p-4 py-8 bg-white h-screen flex justify-center">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold mb-6">Nuestros elegidos</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        try {
          $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //5 propiedades seleccionadas (las 5 mas caras)
          $smt = $conexion->prepare("SELECT p.*, GROUP_CONCAT(i.ruta SEPARATOR ',') AS imagenes FROM productos p LEFT JOIN imagenes_productos i ON p.id = i.producto_id GROUP BY p.id ORDER BY p.precio DESC LIMIT 5");
          $smt->execute();
          $productos = $smt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
          $productos = [];
        }

        if (!empty($productos)) {
          foreach ($productos as $producto) {
            echo "<div class='bg-white p-4 rounded-lg shadow-md'>";
            if ($producto['imagenes']) {
              $imagenes = explode(',', $producto['imagenes']);
              echo "<div x-data='{ activeSlide: 0 }' class='relative mb-4'>";
              echo "<div class='overflow-hidden rounded-lg'>";
              foreach ($imagenes as $index => $imagen) {
                $imagen = trim($imagen);
                $ruta = "productos/uploads/{$producto['id']}/$imagen";
                echo "<img x-show='activeSlide === $index' src='" . htmlspecialchars($ruta, ENT_QUOTES, 'UTF-8') . "' alt='Imagen del producto' class='w-full h-64 object-cover'>";
              }
              echo "</div>";
              echo "<div class='absolute inset-0 flex items-center justify-between px-4'>";
              echo "<button @click='activeSlide = activeSlide > 0 ? activeSlide - 1 : " . (count($imagenes) - 1) . "' class='bg-white text-black p-2 rounded-full'>‹</button>";
              echo "<button @click='activeSlide = activeSlide < " . (count($imagenes) - 1) . " ? activeSlide + 1 : 0' class='bg-white text-black p-2 rounded-full'>›</button>";
              echo "</div>";
              echo "</div>";
            } else {
              echo "<p class='mb-4'>No hay imagen</p>";
            }
            echo "<h2 class='text-xl font-bold mb-2'>" . htmlspecialchars($producto['nombre']) . "</h2>";
            echo "<p class='text-gray-700 mb-2'>" . htmlspecialchars($producto['descripcion']) . "</p>";
            echo "<p class='text-gray-900 font-semibold mb-2'>Precio: " . htmlspecialchars($producto['precio']) . " €</p>";
            echo "<p class='text-gray-600 mb-2'>Fecha: " . htmlspecialchars($producto['fecha']) . "</p>";
            echo "<p class='text-gray-600 mb-2'>" . ($producto['disponibilidad'] ? 'Disponible' : 'No disponible') . "</p>";
            echo "</div>";
          }
        } else {
          echo "<p>No hay productos disponibles</p>";
        }
        ?>
      </div>
    </div>
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