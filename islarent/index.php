<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Islarent - Casas y pisos en Islas Canarias</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="assets/script/alpinejs/cdn.min.js" defer></script>
  <link rel="stylesheet" href="assets/styles/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
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
      <li><a href="index.php" class="block text-black font-bold p-3 rounded-md hover:bg-blue-700 hover:text-white">Inicio</a></li>
      <li><a href="best-houses.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Mejores viviendas</a></li>
      <li><a href="who.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Nosotros</a></li>
      <li><a href="faq.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Preguntas Frecuentes (FAQ)</a></li>
      <?php
      if (isset($_SESSION['usuario_id'])) {
        echo '<li><a href="mis_reservas.php" class="block text-black p-3 rounded-md hover:bg-blue-700 hover:text-white">Mis Reservas</a></li>';
        echo '<li><a href="logout.php"><img src="assets/images/user.svg" class="w-8 h-8">Cerrar sesión</a></li>';
      } else {
        echo '<li><a href="sign_in.php"><img src="assets/images/user.svg" class="w-8 h-8">Iniciar sesión</a></li>';
      }
      ?>
    </ul>
  </header>

  <main class="flex-1 p-4 py-8 bg-[url('assets/images/las_palmas_banner.png')] bg-cover bg-center bg-no-repeat h-screen flex items-center justify-center">
    <div class="bg-amber-400 p-8 rounded-lg shadow-md text-center">
      <h1 class="text-3xl font-bold mb-4" style="font-family: 'Playfair Display', serif;">Busca tu propiedad</h1>
      <form method="GET" class="flex flex-col md:flex-row gap-4">
        <input type="text" name="palabras" placeholder="Palabras clave" class="border border-gray-300 rounded px-4 py-3">
        <input type="date" name="fecha" class="border border-gray-300 rounded px-4 py-3">
        <select name="tipo_local" class="border border-gray-300 rounded px-4 py-3">
          <option value="">Tipo de propiedad</option>
          <option value="casa">Casa</option>
          <option value="apartamento">Apartamento</option>
          <option value="local">Local</option>
        </select>
        <select name="isla" class="border border-gray-300 rounded px-4 py-3">
          <option value="">Isla</option>
          <option value="Gran Canaria">Gran Canaria</option>
          <option value="Tenerife">Tenerife</option>
          <option value="Fuerteventura">Fuerteventura</option>
          <option value="Lanzarote">Lanzarote</option>
          <option value="La Gomera">Gomera</option>
          <option value="El Hierro">Hierro</option>
          <option value="La Palma">La Palma</option>
        </select>
        <button type="submit" class="flex items-center px-6 py-3 bg-black hover:bg-gray-800 hover:text-white text-white font-bold rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
            <path d="M21 21l-6 -6" />
          </svg>
          Buscar
        </button>
      </form>
    </div>
  </main>

  <div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4" style="font-family: 'Playfair Display', serif;">Resultados de la búsqueda</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      try {
        $conexion = new PDO('mysql:host=localhost;port=3307;dbname=inmobiliaria;charset=utf8mb4', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $palabras = isset($_GET['palabras']) ? $_GET['palabras'] : '';
        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';
        $tipo_local = isset($_GET['tipo_local']) ? $_GET['tipo_local'] : '';
        $isla = isset($_GET['isla']) ? $_GET['isla'] : '';

        $query = "SELECT p.*, GROUP_CONCAT(i.ruta SEPARATOR ',') AS imagenes FROM productos p LEFT JOIN imagenes_productos i ON p.id = i.producto_id WHERE 1=1";
        if ($palabras) {
          $query .= " AND (p.nombre LIKE :palabras OR p.descripcion LIKE :palabras)";
        }
        if ($fecha) {
          $query .= " AND p.fecha = :fecha";
        }
        if ($tipo_local) {
          $query .= " AND p.tipo_local = :tipo_local";
        }
        if ($isla) {
          $query .= " AND p.isla = :isla";
        }
        $query .= " GROUP BY p.id";

        $smt = $conexion->prepare($query);
        if ($palabras) {
          $palabras = '%' . $palabras . '%';
          $smt->bindParam(':palabras', $palabras);
        }
        if ($fecha) {
          $smt->bindParam(':fecha', $fecha);
        }
        if ($tipo_local) {
          $smt->bindParam(':tipo_local', $tipo_local);
        }
        if ($isla) {
          $smt->bindParam(':isla', $isla);
        }
        $smt->execute();
        $productos = $smt->fetchAll(PDO::FETCH_ASSOC);

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
            echo "<p class='text-gray-600 mb-2'>Isla: " . htmlspecialchars($producto['isla']) . "</p>";
            echo "<p class='text-gray-600 mb-2'>Tipo de Local: " . htmlspecialchars($producto['tipo_local']) . "</p>";
            if ($producto['disponibilidad']) {
              if (isset($_SESSION['usuario_id'])) {
                echo "<form method='POST' action='reservar.php'>";
                echo "<input type='hidden' name='producto_id' value='" . htmlspecialchars($producto['id']) . "'>";
                echo "<button type='submit' class='px-4 py-2 bg-blue-500 text-white rounded'>Reservar</button>";
              } else {
                echo "<p class='text-red-500'>Inicia sesión para reservar</p>";
              }
            } else {
              echo "<p class='text-red-500'>No disponible</p>";
            }
            echo "</div>";
          }
        } else {
          echo "<p>No hay productos disponibles</p>";
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }

      ?>
    </div>
  </div>

  <footer class="bg-yellow-400 w-full p-4">
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

  <script src="assets/script/main.js"></script>
</body>

</html>