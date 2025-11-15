-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2025 a las 11:22:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_recetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `fotografia` varchar(255) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `idtiporeceta` int(11) NOT NULL,
  `preparacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `fotografia`, `titulo`, `idtiporeceta`, `preparacion`) VALUES
(1, 'sopa.jpeg', 'Caldo de Pollo Tradicional', 1, 'Hervir pollo con verduras por 1 hora, sazonar y servir.'),
(2, 'sopa-verduras.webp', 'Sopa Casera de Verduras', 1, 'Cocer verduras picadas, agregar condimentos y servir caliente.'),
(3, 'caspacho.jpeg', 'Gazpacho Andalúz', 1, 'Licuar tomate, pepino, ajo, aceite y servir frío.'),
(4, 'chupe.jpg', 'Chupe de Camarones', 1, 'Preparar caldo con camarones, leche y papas, cocinar 30 minutos.'),
(5, 'minestrone.jpeg', 'Sopa Minestrone', 1, 'Hervir verduras, agregar pasta y cocer hasta ablandar.'),
(6, 'lomo.jpeg', 'Lomo Saltado', 2, 'Saltear carne con cebolla, tomate y servir con arroz y papas.'),
(7, 'ceviche.jpeg', 'Ceviche Clásico', 2, 'Marinar pescado con limón, cebolla y ají durante 15 minutos.'),
(8, 'pollo.jpeg', 'Pollo al Horno Criollo', 2, 'Hornear pollo con especias por 1 hora.'),
(9, 'espagueti.jpeg', 'Spaghetti Carbonara', 2, 'Cocer pasta, mezclar con huevo, queso y panceta.'),
(10, 'fajitas.jpeg', 'Fajitas de Pollo', 2, 'Saltear pollo con pimientos y sazonar.'),
(11, 'flan.jpeg', 'Flan Casero', 3, 'Preparar mezcla de leche, huevos y azúcar, hornear a baño maría.'),
(12, 'tiramisu.jpeg', 'Tiramisú Italiano', 3, 'Capas de crema mascarpone y bizcotelas con café.'),
(13, 'vainilla.jpeg', 'Helado de Vainilla', 3, 'Mezclar crema y vainilla, congelar 4 horas.'),
(14, 'chocolate.jpeg', 'Pastel de Chocolate', 3, 'Hornear mezcla de cacao con harina y huevos.'),
(15, 'crepes.jpeg', 'Crepes con Frutas', 3, 'Preparar masa ligera y rellenar con frutas.'),
(16, 'brusheta.jpeg', 'Bruschetta Italiana', 4, 'Tostar pan y cubrir con tomate y albahaca.'),
(17, 'guacamole.jpeg', 'Guacamole con Totopos', 4, 'Machacar aguacate con cebolla y limón.'),
(18, 'papas.jpeg', 'Papas Bravas', 4, 'Freír papas y servir con salsa picante.'),
(19, 'empanadas.jpeg', 'Empanadas de Carne', 4, 'Rellenar masa con carne, cebolla y especias, hornear.'),
(20, 'pinchos.jpeg', 'Pinchos de Pollo', 4, 'Marinar pollo y cocinar a la parrilla.'),
(21, 'ramen.jpeg', 'Ramen Japonés', 1, 'Preparar caldo, cocer noodles y añadir toppings.'),
(22, 'borshut.jpeg', 'Borsch Ucraniano', 1, 'Cocer remolacha con verduras y carne.'),
(23, 'lentejas.jpeg', 'Sopa de Lentejas', 1, 'Cocer lentejas con verduras y especias.'),
(24, 'margarita.jpeg', 'Pizza Margherita', 2, 'Hornear masa con tomate, mozzarella y albahaca.'),
(25, 'asado.jpeg', 'Asado Argentino', 2, 'Cocinar carne a la parrilla por 2 horas.'),
(26, 'paella.jpeg', 'Paella Valenciana', 2, 'Cocer arroz con pollo, mariscos y azafrán.'),
(27, 'hamburguesa.jpeg', 'Hamburguesa Casera', 2, 'Armar carne molida y dorar a la plancha.'),
(28, 'tacos.jpeg', 'Tacos Mexicanos', 2, 'Rellenar tortillas con carne y salsa.'),
(29, 'panqueques.jpeg', 'Panqueques Dulces', 3, 'Freír masa ligera y agregar miel.'),
(30, 'brownis.jpeg', 'Brownies de Chocolate', 3, 'Hornear mezcla de cacao con mantequilla y harina.'),
(31, 'chesscake.jpeg', 'Cheesecake New York', 3, 'Hornear base de queso crema sobre galletas.'),
(32, 'arroz.jpeg', 'Arroz con Leche', 3, 'Cocer arroz en leche con azúcar y canela.'),
(33, 'frutillas.jpeg', 'Frutillas con Crema', 3, 'Batir crema y mezclar con fruta.'),
(34, 'nachos.jpeg', 'Nachos Supreme', 4, 'Cubrir totopos con queso y carne.'),
(35, 'croquetas.jpeg', 'Croquetas Caseras', 4, 'Formar croquetas y freír en aceite.'),
(36, 'humus.jpeg', 'Hummus con Pan Pita', 4, 'Procesar garbanzos con tahini y limón.'),
(37, 'alitas.jpeg', 'Alitas Picantes', 4, 'Hornear alitas y cubrir con salsa picante.'),
(38, 'ensalada.jpeg', 'Ensalada Caprese', 4, 'Combinar tomate, mozzarella y albahaca.'),
(39, 'fideos.jpeg', 'Sopa de Fideos', 1, 'Cocer fideos en caldo con especias.'),
(40, 'sancocho.jpeg', 'Sancocho', 1, 'Cocer carne con yuca y plátano.'),
(41, 'tomate.jpeg', 'Sopa de Tomate', 1, 'Licuar tomate cocido y sazonar.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporeceta`
--

CREATE TABLE `tiporeceta` (
  `id` int(11) NOT NULL,
  `tiporeceta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiporeceta`
--

INSERT INTO `tiporeceta` (`id`, `tiporeceta`) VALUES
(1, 'Sopas'),
(2, 'Platos'),
(3, 'Postres'),
(4, 'Aperitivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `rol`) VALUES
(1, 'admin@sis.256', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin'),
(2, 'usuario@sis.256', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtiporeceta` (`idtiporeceta`);

--
-- Indices de la tabla `tiporeceta`
--
ALTER TABLE `tiporeceta`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tiporeceta`
--
ALTER TABLE `tiporeceta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`idtiporeceta`) REFERENCES `tiporeceta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
