-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2024 a las 19:58:23
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
-- Base de datos: `dwes_manana_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_recuperacion`
--

CREATE TABLE `usuarios_recuperacion` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expiracion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_recuperacion`
--

INSERT INTO `usuarios_recuperacion` (`id`, `email`, `token`, `expiracion`) VALUES
(1, 'correo@ejemplo.com', '6a88941c65d7c7d27182891515c31766', '2024-12-15'),
(2, 'correo@ejemplo.com', 'c0c477ee5d2a1a3b83422576d9016a78', '2024-12-15'),
(3, 'correo@ejemplo.com', '45434248e2c3f4857b9fdc0434cb82fd', '2024-12-15'),
(4, 'correo@ejemplo.com', 'cae5b99f1a8e7f705104046e17f77b98', '2024-12-15'),
(5, 'correo@ejemplo.com', '52f6903065062eaab3d8c4b6ac6d6519', '2024-12-15'),
(6, 'correo@ejemplo.com', 'd2b4a4c4b1ab69c57f612bb758bd679b', '2024-12-15'),
(13, 'correo@ejemplo.com', 'e954a05bfda05816024e4088e1ad1208', '2024-12-16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios_recuperacion`
--
ALTER TABLE `usuarios_recuperacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios_recuperacion`
--
ALTER TABLE `usuarios_recuperacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
