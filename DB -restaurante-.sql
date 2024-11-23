-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2024 a las 06:07:49
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
-- Base de datos: `restaurante`
--
CREATE DATABASE IF NOT EXISTS `restaurante` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `restaurante`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `ingredientes` text NOT NULL,
  `precio` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `imagen`, `categoria`, `ingredientes`, `precio`) VALUES
(1, 'Ensalada César', 'https://media.istockphoto.com/id/184938052/es/foto/ensalada-c%C3%A9sar.jpg?s=612x612&w=0&k=20&c=4SiqNwk9I7Nx7jHIoiKsJFTQlY2I3d0SB17W5slrpSs=', 'Ensalada', 'Lechuga romana, croûtons, queso parmesano, aderezo César', 12.000),
(2, 'Sopa de Tomate', 'https://media.istockphoto.com/id/689537488/es/foto/sopa-de-tomate-en-un-bol-negro-sobre-fondo-gris-piedra-vista-superior-copia-espacio.jpg?s=612x612&w=0&k=20&c=ttPSWbgDWvkvqrIq5QpwLok7Ir-9gR8yPTtHSwC5jpk=', 'Sopas', 'Tomates, cebolla, ajo, caldo de verduras', 8.500),
(3, 'Arroz', 'https://cloudfront-us-east-1.images.arcpublishing.com/elespectador/LDRLW34JWNAPHDQ6I7KOOUJVKI.jpg', 'Arroz', 'Arroz, pollo, alverjas', 236.000),
(4, 'Pescado frito', 'https://s3.amazonaws.com/com.commerceowl.prod/16x9/L/7c9e0180-63e1-4621-be2e-b507122aca3c.jpeg', 'Pescado', 'Pescado, zanahoria, tomates', 400.320),
(5, 'Cazuela de camarón', 'https://sabor.eluniverso.com/wp-content/uploads/2023/08/Cazuela-2-BAJA-RESOLUCION.jpg', 'Cazuela', 'Camarón, crema de camarón, Tajadas queso mozzarella, crema de leche', 61.000),
(7, 'Pollo Asado', 'https://www.recetasnestle.cl/sites/default/files/srh_recipes/4d95ee421422145ef856c040751d4386.jpg', 'Carne y Avez', 'Pollo, papas, ajo.', 15.000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'admin'),
(3, 'usuario1', 'password1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
