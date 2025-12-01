-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 08-09-2025 a las 17:35:56
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
-- Base de datos: `hobbydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `frecuencia` varchar(50) DEFAULT NULL,
  `fotografia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hobbies`
--

INSERT INTO `hobbies` (`id`, `nombres`, `descripcion`, `frecuencia`, `fotografia`) VALUES
(5, 'Aprender', 'Practico inglés regularmente y me interesa mucho aprender ruso y francés. Me fascina la diversidad de culturas.', 'Diario', '68bcf301257ff.png'),
(6, 'Ver películas', 'Disfruto de diferentes géneros cinematográficos. Me ayuda a relajarme y conocer nuevas historias.', 'Fin de semana', '68bce5219213f.jpeg'),
(7, 'Ir al gimnasio', 'De vez en cuando voy al gym para mantenerme en forma y desestresarme del estudio.', '2-3 veces por semana', '68bce538d2d8e.jpeg'),
(8, 'Escuchar música', 'La música es mi compañía constante, me inspira y me motiva durante el día.', 'Todo el tiempo', '68bce5504becf.jpeg'),
(9, 'Hacer edits para TikTok', 'Me gusta expresar mi creatividad editando videos. Es una forma divertida de crear contenido.', 'Cuando tengo tiempo libre', '68bce568ee71c.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`) VALUES
(1, 'ejemplo@correo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(2, 'mora@gmail.com', 'd5f12e53a182c062b6bf30c1445153faff12269a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
