-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-03-2023 a las 04:09:22
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19325207_netflix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `imagen`) VALUES
(1, 'Avengers Infinity War', 'poster01.jpeg'),
(2, 'Jurasic World', 'poster02.jpeg'),
(3, 'Deadpool2', 'poster03.jpeg'),
(4, 'Solo', 'poster04.jpeg'),
(5, 'Los increibles 2', 'poster05.jpeg'),
(6, 'Oceans B', 'poster06.jpeg'),
(7, 'Black Panter', 'poster07.jpeg'),
(8, 'Tomb Raider', 'poster08.jpeg'),
(9, 'Player One', 'poster09.jpeg'),
(10, 'Mission Impossible', 'poster10.jpeg'),
(11, 'Pacific Rim', 'poster11.jpeg'),
(12, 'Venom', 'poster12.jpeg'),
(13, 'Isle Dogs', 'poster13.jpeg'),
(14, 'Ralph', 'poster14.jpeg'),
(15, 'Mamma Mia', 'poster15.jpeg'),
(17, 'Sonic 2', 'poster17.png'),
(18, 'Sin tiempo para morir', 'poster16.png'),
(19, 'Hobbit', 'poster19.png'),
(20, 'Uncharted', 'poster18.png'),
(21, 'SpiderMan NoWayHome', 'poster20.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `correo` varchar(100) NOT NULL,
  `contra` varchar(40) NOT NULL,
  `activado` binary(1) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `contra`, `activado`) VALUES
('admin@gmail.com', 'password', 0x01),
('usuario@gmail.com', '123456', 0x01);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
