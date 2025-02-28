-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 18-02-2025 a las 12:24:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_productos`
--

CREATE TABLE `imagenes_productos` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_productos`
--

INSERT INTO `imagenes_productos` (`id`, `producto_id`, `ruta`) VALUES
(83, 22, 'Proyecto nuevo(1).jpg'),
(84, 22, 'Proyecto nuevo(2).jpg'),
(85, 22, 'Proyecto nuevo(3).png'),
(86, 22, 'Proyecto nuevo(4).jpg'),
(87, 23, 'Proyecto nuevo(1).jpg'),
(88, 23, 'Proyecto nuevo(2).jpg'),
(89, 23, 'Proyecto nuevo(3).jpg'),
(90, 23, 'Proyecto nuevo(4).jpg'),
(91, 24, 'Proyecto nuevo(1).jpg'),
(92, 24, 'Proyecto nuevo(2).jpg'),
(93, 24, 'Proyecto nuevo(3).jpg'),
(94, 24, 'Proyecto nuevo(4).jpg'),
(95, 25, 'Proyecto nuevo(1).jpg'),
(96, 25, 'Proyecto nuevo(2).jpg'),
(97, 25, 'Proyecto nuevo(3).jpg'),
(98, 25, 'Proyecto nuevo(4).jpg'),
(99, 26, 'Proyecto nuevo(1).jpg'),
(100, 26, 'Proyecto nuevo(2).jpg'),
(101, 26, 'Proyecto nuevo(3).jpg'),
(102, 26, 'Proyecto nuevo(4).jpg'),
(103, 27, 'Proyecto nuevo(1).jpg'),
(104, 27, 'Proyecto nuevo(2).jpg'),
(105, 27, 'Proyecto nuevo(3).jpg'),
(106, 27, 'Proyecto nuevo(4).jpg'),
(107, 28, 'Proyecto nuevo(3).jpg'),
(108, 28, 'Proyecto nuevo(4).jpg'),
(109, 28, 'Proyecto nuevo(5).jpg'),
(110, 28, 'Proyecto nuevo(6).jpg'),
(111, 29, 'Proyecto nuevo(3).jpg'),
(112, 29, 'Proyecto nuevo(4).jpg'),
(113, 29, 'Proyecto nuevo(5).jpg'),
(114, 29, 'Proyecto nuevo(6).jpg'),
(115, 30, 'Proyecto nuevo(3).jpg'),
(116, 30, 'Proyecto nuevo(4).jpg'),
(117, 30, 'Proyecto nuevo(5).jpg'),
(118, 30, 'Proyecto nuevo(6).jpg'),
(119, 31, 'Proyecto nuevo(3).jpg'),
(120, 31, 'Proyecto nuevo(4).jpg'),
(121, 31, 'Proyecto nuevo(5).jpg'),
(122, 31, 'Proyecto nuevo(6).jpg'),
(123, 32, 'Proyecto nuevo(3).jpg'),
(124, 32, 'Proyecto nuevo(4).jpg'),
(125, 32, 'Proyecto nuevo(5).jpg'),
(126, 32, 'Proyecto nuevo(6).jpg'),
(127, 33, 'Proyecto nuevo(3).jpg'),
(128, 33, 'Proyecto nuevo(4).jpg'),
(129, 33, 'Proyecto nuevo(5).jpg'),
(130, 33, 'Proyecto nuevo(6).jpg'),
(131, 34, 'Proyecto nuevo(3).jpg'),
(132, 34, 'Proyecto nuevo(4).jpg'),
(133, 34, 'Proyecto nuevo(5).jpg'),
(134, 34, 'Proyecto nuevo(6).jpg'),
(135, 35, 'Proyecto nuevo(7).jpg'),
(136, 35, 'Proyecto nuevo(8).jpg'),
(137, 35, 'Proyecto nuevo(9).jpg'),
(138, 35, 'Proyecto nuevo(10).jpg'),
(139, 36, 'Proyecto nuevo(3).jpg'),
(140, 36, 'Proyecto nuevo(4).jpg'),
(141, 36, 'Proyecto nuevo(5).jpg'),
(142, 36, 'Proyecto nuevo(6).jpg'),
(143, 37, 'Proyecto nuevo(3).jpg'),
(144, 37, 'Proyecto nuevo(4).jpg'),
(145, 37, 'Proyecto nuevo(5).jpg'),
(146, 37, 'Proyecto nuevo(6).jpg'),
(147, 38, 'Proyecto nuevo(3).jpg'),
(148, 38, 'Proyecto nuevo(4).jpg'),
(149, 38, 'Proyecto nuevo(5).jpg'),
(150, 38, 'Proyecto nuevo(6).jpg'),
(151, 39, 'Proyecto nuevo(3).jpg'),
(152, 39, 'Proyecto nuevo(4).jpg'),
(153, 39, 'Proyecto nuevo(5).jpg'),
(154, 39, 'Proyecto nuevo(6).jpg'),
(155, 40, 'Proyecto nuevo(3).jpg'),
(156, 40, 'Proyecto nuevo(4).jpg'),
(157, 40, 'Proyecto nuevo(5).jpg'),
(158, 40, 'Proyecto nuevo(6).jpg'),
(159, 41, 'Proyecto nuevo(3).jpg'),
(160, 41, 'Proyecto nuevo(4).jpg'),
(161, 41, 'Proyecto nuevo(5).jpg'),
(162, 41, 'Proyecto nuevo(6).jpg'),
(163, 42, 'Proyecto nuevo(3).jpg'),
(164, 42, 'Proyecto nuevo(4).jpg'),
(165, 42, 'Proyecto nuevo(5).jpg'),
(166, 42, 'Proyecto nuevo(6).jpg'),
(167, 43, 'Proyecto nuevo(6).jpg'),
(168, 43, 'Proyecto nuevo(5).jpg'),
(169, 43, 'Proyecto nuevo(4).jpg'),
(170, 43, 'Proyecto nuevo(3).jpg'),
(171, 44, 'Proyecto nuevo(6).jpg'),
(172, 44, 'Proyecto nuevo(5).jpg'),
(173, 44, 'Proyecto nuevo(4).jpg'),
(174, 44, 'Proyecto nuevo(3).jpg'),
(175, 45, 'Proyecto nuevo(6).jpg'),
(176, 45, 'Proyecto nuevo(5).jpg'),
(177, 45, 'Proyecto nuevo(4).jpg'),
(178, 45, 'Proyecto nuevo(3).jpg'),
(179, 46, 'Proyecto nuevo(6).jpg'),
(180, 46, 'Proyecto nuevo(5).jpg'),
(181, 46, 'Proyecto nuevo(4).jpg'),
(182, 46, 'Proyecto nuevo(3).jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `disponibilidad` tinyint(1) DEFAULT 1,
  `imagen` varchar(255) DEFAULT NULL,
  `isla` enum('Lanzarote','Tenerife','Gran Canaria','Fuerteventura','La Palma','La Gomera','El Hierro') NOT NULL,
  `tipo_local` enum('Apartamento','Local','Casa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `fecha`, `disponibilidad`, `imagen`, `isla`, `tipo_local`) VALUES
(22, 'Piso en el centro de Las Palmas de Gran Canaria', 'Este moderno y luminoso piso de 3 habitaciones se encuentra en pleno corazón de Las Palmas de Gran Canaria, en la calle Triana. Con una superficie de 95 metros cuadrados, ofrece un salón espacioso con grandes ventanales que proporcionan una excelente luz natural. La cocina es independiente y está completamente equipada. Las habitaciones cuentan con armarios empotrados, perfectos para maximizar el espacio. El edificio tiene ascensor, lo que facilita el acceso al piso. Además, está muy bien comunicado, con varias paradas de transporte público a solo unos minutos a pie. Ideal para aquellos que desean vivir en una zona céntrica y con todas las comodidades a su alcance.', 550000.00, '2025-02-05', 1, NULL, 'Gran Canaria', 'Apartamento'),
(23, 'Piso con terraza privada en Santa Cruz de Tenerife:', 'Ubicado en la tranquila calle Teide, en Santa Cruz de Tenerife, este piso de 2 habitaciones es el lugar ideal para quienes buscan disfrutar de la calma y la privacidad. El piso cuenta con una terraza privada de 30 metros cuadrados, perfecta para relajarse o recibir visitas. El salón-comedor es amplio y se conecta con la cocina, ofreciendo un ambiente abierto y luminoso. Las habitaciones están equipadas con armarios empotrados y tienen suficiente espacio para adaptarse a diversas necesidades. Aunque el edificio no tiene ascensor, la ubicación y las vistas desde la terraza compensan ampliamente este detalle. A solo unos minutos de tiendas, restaurantes y zonas de ocio.', 600000.00, '2024-01-18', 1, NULL, 'Tenerife', 'Apartamento'),
(24, 'Piso de lujo con vistas al mar en Puerto de la Cruz:', 'Este espectacular piso de 4 habitaciones se encuentra en una de las zonas más exclusivas de Puerto de la Cruz, en la calle Agustin de Bethencourt. Desde el salón, podrás disfrutar de impresionantes vistas al mar. El piso tiene una amplia cocina abierta al salón, lo que le da un toque moderno y espacioso. Las habitaciones, todas exteriores, son muy luminosas y cuentan con armarios empotrados. El edificio tiene ascensor y dispone de servicios adicionales como un gimnasio y una piscina comunitaria. Ideal para quienes buscan vivir con estilo y lujo, sin renunciar a las mejores vistas y a una ubicación privilegiada.', 710000.00, '2024-12-12', 1, NULL, 'Tenerife', 'Apartamento'),
(25, 'Piso familiar en zona residencial de Arrecife:', 'Este piso de 3 habitaciones se encuentra en una zona residencial tranquila, en la calle Fajardo, en Arrecife. Con un amplio salón y cocina independiente, el piso tiene una distribución perfecta para aprovechar al máximo cada espacio. Las habitaciones son luminosas y tienen armarios empotrados, lo que garantiza un almacenamiento adecuado. El edificio cuenta con ascensor, y la comunidad es muy tranquila, con pocos vecinos. La ubicación es excelente, ya que está cerca de parques, colegios y centros comerciales. Un hogar ideal para quienes buscan estabilidad y confort en una zona segura.', 625000.00, '2025-02-20', 1, NULL, 'Lanzarote', 'Apartamento'),
(26, 'Este piso de 3 habitaciones se encuentra en una zona residencial tranquila, en la calle Fajardo, en Arrecife. Con un amplio salón y cocina independiente, el piso tiene una distribución perfecta para aprovechar al máximo cada espacio. Las habitaciones son ', 'En la calle San Agustín, en San Cristóbal de La Laguna, este piso de 2 habitaciones ha sido recientemente reformado, manteniendo su encanto original pero con todas las comodidades de un hogar moderno. Los suelos de parquet, las paredes blancas y los detalles en acero inoxidable hacen que este piso sea muy atractivo. La cocina, abierta al salón, está completamente equipada con electrodomésticos de última generación. Las habitaciones son amplias y cuentan con armarios empotrados. El edificio tiene ascensor y está perfectamente situado, con acceso fácil a zonas comerciales y transporte público. Una opción ideal para quienes buscan un hogar listo para entrar a vivir.', 585000.00, '2025-02-03', 1, NULL, 'Tenerife', 'Apartamento'),
(27, 'Piso económico en zona bien conectada de Telde:', 'Este piso de 2 habitaciones se encuentra en una ubicación muy bien conectada, en la calle Poeta Tomás Morales, en Telde. Con una distribución funcional y sin lujos, es una opción económica y práctica para quienes buscan un lugar céntrico a buen precio. El salón es de tamaño medio, con ventanas que aportan luz natural. La cocina es independiente y necesita algunos ajustes, pero ofrece un buen espacio. Las habitaciones son sencillas, pero confortables, y el baño está en buenas condiciones. Aunque el edificio no tiene ascensor, la accesibilidad y la cercanía al transporte público hacen que este piso sea una excelente opción para quienes buscan economía y comodidad.', 410000.00, '2024-12-19', 1, NULL, 'Gran Canaria', 'Apartamento'),
(28, 'Apartamento moderno en Playa de las Américas, Tenerife', '\r\nUbicado en la animada Playa de las Américas, en la calle Arquitecto Gómez Cuesta, este apartamento de 2 habitaciones es ideal para quienes buscan comodidad y cercanía al mar. Dispone de un amplio salón con cocina americana totalmente equipada, un balcón con vistas despejadas y un baño moderno. El edificio cuenta con ascensor y piscina comunitaria. Perfecto tanto para vivir como para inversión vacacional, ya que está a pocos minutos de la playa, restaurantes y centros comerciales.', 380000.00, '2025-02-10', 1, NULL, 'Tenerife', 'Apartamento'),
(29, 'Piso amplio en La Orotava, Tenerife', 'Situado en una zona tranquila de La Orotava, en la calle Hermano Apolinar, este espacioso piso de 3 habitaciones es ideal para familias. Tiene un gran salón con ventanales, cocina independiente con solana y 2 baños completos. El edificio dispone de ascensor y garaje. Cerca de colegios, supermercados y transporte público, este hogar ofrece un equilibrio perfecto entre comodidad y calidad de vida.', 635000.00, '2025-02-07', 1, NULL, 'Tenerife', 'Apartamento'),
(30, 'Ático con terraza en San Bartolomé de Tirajana, Gran Canaria', '\r\nEste espectacular ático de 2 habitaciones se encuentra en San Bartolomé de Tirajana, en la avenida de Tirajana, a pocos minutos de las dunas de Maspalomas. Destaca por su enorme terraza privada de 40m², ideal para disfrutar del sol todo el año. El salón-comedor es amplio y luminoso, con una cocina americana moderna. El edificio tiene ascensor y piscina comunitaria. Ideal para quienes buscan un hogar exclusivo en el sur de la isla.', 411000.00, '2024-10-30', 1, NULL, 'Gran Canaria', 'Apartamento'),
(31, 'Piso céntrico en Santa Cruz de Tenerife', 'Ubicado en pleno centro de Santa Cruz de Tenerife, en la calle Castillo, este piso de 2 habitaciones es perfecto para quienes buscan vivir en el corazón de la ciudad. Dispone de un salón con balcón, cocina equipada y 1 baño completo. El edificio cuenta con ascensor y portero. Su ubicación es inmejorable, con acceso a tiendas, restaurantes y transporte público a pocos pasos.', 230000.00, '2025-02-19', 1, NULL, 'Tenerife', 'Apartamento'),
(32, 'Apartamento en Costa Teguise, Lanzarote', 'Este acogedor apartamento de 1 habitación se encuentra en Costa Teguise, en la avenida del Mar, en un complejo con piscina y jardines comunitarios. Tiene un salón-comedor con cocina integrada, un baño reformado y una terraza con vistas al mar. El edificio no dispone de ascensor, pero su ubicación a solo 200 metros de la playa lo convierte en una oportunidad única para quienes buscan tranquilidad y buen clima durante todo el año.', 415000.00, '2023-06-07', 1, NULL, 'Lanzarote', 'Apartamento'),
(33, 'Dúplex en El Médano, Tenerife', 'Este elegante dúplex de 3 habitaciones está situado en El Médano, en la calle José Reyes Martín, a solo 5 minutos a pie de la playa. En la planta baja tiene un salón amplio, cocina independiente y un aseo. En la planta superior están los dormitorios y un baño completo. Además, dispone de una terraza privada de 20m². El edificio no tiene ascensor, pero la zona es perfecta para los amantes del surf y la vida costera.', 610000.00, '2025-02-18', 1, NULL, 'Tenerife', 'Apartamento'),
(34, 'Apartamento con vistas al mar en Valverde, El Hierro', 'Ubicado en Valverde, en la calle La Constitución, este luminoso apartamento de 2 habitaciones ofrece impresionantes vistas al océano Atlántico. Dispone de un salón-comedor con cocina abierta, 1 baño completo y un balcón ideal para disfrutar de los atardeceres. Se encuentra en un edificio de solo tres plantas sin ascensor, en una zona tranquila pero con fácil acceso a supermercados, restaurantes y transporte público.', 375000.00, '2024-09-24', 1, NULL, 'El Hierro', 'Apartamento'),
(35, 'Dúplex con terraza en El Pinar, El Hierro', 'Este bonito dúplex de 2 habitaciones se encuentra en El Pinar, en la avenida de Los Almendreros, rodeado de naturaleza y tranquilidad. En la planta baja cuenta con un salón con cocina americana y un aseo. En la planta superior se encuentran las habitaciones y un baño completo. Destaca por su terraza privada de 25m² con vistas a la montaña. El edificio es de reciente construcción y no dispone de ascensor. Ideal para quienes buscan desconectar del estrés diario.', 700000.00, '2025-02-10', 1, NULL, 'El Hierro', 'Casa'),
(36, 'Piso en el casco histórico de Santa Cruz de La Palma', 'Ubicado en el corazón de Santa Cruz de La Palma, en la calle O’Daly, este elegante piso de 2 habitaciones combina historia y modernidad. Con techos altos y suelos de madera, el salón es amplio y luminoso, con balcones que dan a la calle. La cocina es moderna y está completamente equipada. Dispone de 1 baño completo. El edificio, de estilo colonial, no tiene ascensor. Perfecto para quienes desean vivir en el centro histórico, rodeados de cultura y servicios.', 630000.00, '2025-01-09', 1, NULL, 'La Palma', 'Apartamento'),
(37, 'Apartamento en Los Llanos de Aridane, La Palma', '\r\nEste moderno apartamento de 1 habitación se encuentra en Los Llanos de Aridane, en la calle Real, dentro de un edificio de nueva construcción con ascensor. Dispone de un salón-cocina diáfano, un dormitorio con armarios empotrados y 1 baño completo. Su ubicación es excelente, con supermercados, farmacias y cafeterías a pocos metros, y a solo 10 minutos en coche de la playa de Puerto Naos.', 950000.00, '2025-02-17', 1, NULL, 'La Palma', 'Apartamento'),
(38, 'Apartamento con vistas al mar en San Sebastián de La Gomera', 'Ubicado en pleno centro de San Sebastián de La Gomera, en la calle Real, este luminoso apartamento de 2 habitaciones es ideal para quienes buscan vivir cerca de la playa y los servicios esenciales. Cuenta con un acogedor salón-comedor, cocina equipada, 1 baño completo y un balcón con vistas al océano. El edificio dispone de ascensor y está a pocos minutos del puerto y la playa de San Sebastián.', 471000.00, '2021-07-21', 1, NULL, 'La Gomera', 'Casa'),
(39, 'Piso moderno en Valle Gran Rey, La Gomera', 'Este hermoso piso de 1 habitación se encuentra en Valle Gran Rey, en la calle Vueltas, a solo 200 metros de la playa. Dispone de un salón con cocina americana, un dormitorio con armario empotrado y 1 baño moderno. Desde su terraza se pueden disfrutar espectaculares vistas a las montañas y el mar. Se encuentra en un edificio pequeño sin ascensor, con pocos vecinos y un ambiente muy tranquilo.', 1200000.00, '2024-11-29', 1, NULL, 'La Gomera', 'Casa'),
(40, 'Dúplex con terraza en Hermigua, La Gomera', 'Este dúplex de 3 habitaciones en Hermigua, en la calle El Tabaibal, es perfecto para familias que buscan tranquilidad y naturaleza. En la planta baja cuenta con un amplio salón, cocina independiente y un aseo. En la planta superior se encuentran las habitaciones y 1 baño completo. Además, tiene una terraza de 30m² con vistas al valle. El edificio es de reciente construcción y no dispone de ascensor.', 759000.00, '2025-02-11', 1, NULL, 'La Gomera', 'Casa'),
(41, ' Piso con balcón y vistas en Tazacorte, La Palma', 'Situado en Tazacorte, en la avenida de la Constitución, este amplio piso de 2 habitaciones ofrece unas increíbles vistas al mar y al valle de plataneras. Dispone de un salón-comedor luminoso, cocina independiente equipada, 1 baño completo y un balcón donde se puede disfrutar de espectaculares puestas de sol. El edificio cuenta con ascensor y garaje privado. A solo 5 minutos en coche de la playa de Tazacorte, con supermercados y restaurantes cercanos.', 840000.00, '2025-02-05', 1, NULL, 'La Palma', 'Casa'),
(42, 'Exclusiva villa moderna con vistas al mar y entorno tropical en La Palma', 'Esta impresionante villa de diseño contemporáneo combina lujo, confort y naturaleza en un entorno paradisíaco. Ubicada en un enclave privilegiado, rodeada de jardines tropicales con palmeras y exuberante vegetación, la vivienda destaca por su arquitectura de líneas limpias y acabados de alta calidad.\r\n\r\nLa propiedad cuenta con amplios ventanales que inundan los espacios interiores de luz natural y ofrecen impresionantes vistas al océano y la montaña. Su diseño de doble altura y distribución diáfana proporcionan una sensación de amplitud y exclusividad.\r\n\r\nEntre sus principales características destacan:\r\n\r\n    Espacios exteriores de ensueño con terrazas amuebladas y áreas de descanso.\r\n    Salón y comedor de concepto abierto, con conexión fluida entre el interior y el exterior.\r\n    Dormitorios luminosos y elegantes, con acceso a balcones privados y vistas panorámicas.\r\n    Acabados en piedra volcánica y materiales naturales, que integran la vivienda con el entorno.\r\n    Jardines cuidadosamente diseñados, perfectos para disfrutar del clima cálido y la tranquilidad.\r\n\r\nIdeal para quienes buscan un hogar exclusivo en una ubicación privilegiada, con todas las comodidades para una vida de lujo y relax.', 1400000.00, '2025-02-07', 0, NULL, 'La Palma', 'Casa'),
(43, 'Encantador local rústico en Fuerteventura – Ideal para cafetería o pequeño restaurante', 'Ubicado en un entorno auténtico y tranquilo, este acogedor local comercial ofrece un ambiente rústico y cálido, ideal para aquellos que buscan emprender en un espacio con encanto tradicional. Con una fachada sencilla y puertas de madera que evocan el carácter histórico del lugar, el interior presenta un diseño en armonía con el entorno, con mobiliario artesanal de madera y una decoración minimalista que resalta la luz natural.\r\nCaracterísticas principales:\r\n\r\n    Ubicación en zona tranquila y pintoresca, con un aire auténtico y acogedor.\r\n    Espacios interiores y exteriores, con mesas de madera rústica para una experiencia relajada.\r\n    Amplios ventanales que permiten una gran entrada de luz y conexión con el exterior.\r\n    Decoración sencilla y natural, con cuadros y detalles que aportan calidez al ambiente.\r\n    Ideal para cafetería, restaurante o espacio cultural, ofreciendo una experiencia íntima y relajada.', 375000.00, '2025-02-26', 1, NULL, 'Fuerteventura', 'Local'),
(44, 'Local comercial en Las Palmas de Gran Canaria – Espacio versátil en zona céntrica', '\r\nUbicado en Las Palmas de Gran Canaria, en la calle Triana, este local comercial es una excelente oportunidad para emprendedores que buscan un espacio versátil y bien ubicado. Situado en una de las principales zonas comerciales de la ciudad, cuenta con un flujo constante de peatones y una gran visibilidad.\r\nCaracterísticas principales:\r\n\r\n    Superficie: 110 m² en planta baja, con distribución diáfana.\r\n    Ubicación estratégica: En una calle comercial con alto tránsito y rodeado de tiendas, restaurantes y oficinas.\r\n    Fachada acristalada: Ideal para escaparates y máxima visibilidad.\r\n    Baño adaptado y trastienda: Espacio adicional para almacenamiento o zona privada.\r\n    Apto para múltiples negocios: Tienda, cafetería, galería de arte, oficina o showroom.\r\n    Excelente conexión de transporte público y fácil acceso a parkings cercanos.\r\n\r\nGracias a su ubicación privilegiada y versatilidad, este local es perfecto para cualquier tipo de negocio que busque destacar en una de las zonas más dinámicas de Gran Canaria.', 420000.00, '2024-09-17', 1, NULL, 'Gran Canaria', 'Local'),
(45, 'Acogedor apartamento en Fuerteventura – Cerca de la playa y con excelente ubicación', 'Ubicado en Corralejo, Fuerteventura, este encantador apartamento es ideal para quienes buscan comodidad, tranquilidad y proximidad al mar. Con un diseño funcional y luminoso, ofrece un ambiente acogedor perfecto tanto para residencia habitual como para inversión vacacional.\r\nCaracterísticas principales:\r\n\r\n    Superficie: 65 m² bien distribuidos.\r\n    2 dormitorios amplios con armarios empotrados.\r\n    Salón-comedor luminoso, con acceso a un balcón privado.\r\n    Cocina equipada, con electrodomésticos y espacio de almacenamiento.\r\n    Baño moderno con plato de ducha.\r\n    Ubicación privilegiada: A solo 5 minutos de la playa y cerca de comercios, restaurantes y transporte público.\r\n    Zonas comunes bien cuidadas, con posibilidad de piscina comunitaria.', 640000.00, '2025-02-12', 1, NULL, 'Fuerteventura', 'Apartamento'),
(46, 'Casa con jardín en Fuerteventura', 'Esta acogedora casa de 3 habitaciones se encuentra en una zona tranquila de Fuerteventura, a pocos minutos de las playas más populares de la isla. La propiedad cuenta con un amplio salón-comedor luminoso, ideal para relajarse en familia. La cocina es independiente y está completamente equipada, perfecta para disfrutar de las comidas en casa. Además, dispone de un jardín privado donde se puede disfrutar del buen clima de la isla, con espacio para una zona de barbacoa o terraza exterior. Las habitaciones son amplias y la casa tiene 2 baños completos. La casa está situada en una zona residencial, con fácil acceso a servicios como supermercados, tiendas y restaurantes. Perfecta para quienes buscan vivir en un entorno tranquilo y cercano al mar.', 560000.00, '2024-08-15', 1, NULL, 'Fuerteventura', 'Casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `fecha_reserva` datetime DEFAULT current_timestamp(),
  `estado` enum('pendiente','confirmada','cancelada') DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` int(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('usuario','admin') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `telefono`, `password`, `rol`) VALUES
(24, 'toni', 'toni@admin.com', 666448449, '$2y$10$uKrEmbB7NK9WlEX5rVBe.OYiROmt43dpsV44gXIhEmWGwcFGIrXCK', 'admin'),
(25, 'pedro', 'pedro@gmail.com', 666484393, '$2y$10$PtIaWLTwolNYhSypPOVttO.oKqR7MRLW9nflmqxxkQatlMQG3zaIq', 'usuario'),
(26, 'jose', 'jose@gmail.com', 665384384, '$2y$10$54L3OA0Y78kWanwG16a3yuAm0koJbbZDkXIx920hEnSp/QW6Yjrw6', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD CONSTRAINT `imagenes_productos_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
