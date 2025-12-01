-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 21-10-2025 a las 01:45:30
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
-- Base de datos: `bd_agenda2025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Chuquisaca'),
(2, 'La Paz'),
(3, 'Cochabamba'),
(4, 'Oruro'),
(5, 'Potosi'),
(6, 'Taija'),
(7, 'Santa Cruz'),
(8, 'Beni'),
(9, 'Pando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `provincia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`, `provincia_id`) VALUES
(1, 'Sucre', 1),
(2, 'Poroma', 1),
(3, 'La Paz', 9),
(4, 'El Alto', 9),
(5, 'Cochabamba', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `fotografia` varchar(100) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` enum('Masculino','Femenino','','') NOT NULL,
  `correo` varchar(100) NOT NULL,
  `profesion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `fotografia`, `nombres`, `apellidos`, `fecha_nacimiento`, `sexo`, `correo`, `profesion_id`) VALUES
(11, '67eb008822902.png', 'Eve', 'Eum fuga Eligendi i', '1983-10-05', 'Masculino', 'linykok@mailinator.com', 1),
(16, '67e476a52f968.png', 'Numquam magni magni ', 'Voluptas impedit la', '2018-06-07', 'Femenino', 'luvipeqas@mailinator.com', 4),
(17, '67e476e067adb.png', 'Maria', 'Lagraba', '2000-12-12', 'Femenino', 'maria@usfx.bo', 1),
(20, '681c78b4d7485.png', 'Expedita commodo qui', 'Iure voluptatem repe', '1970-09-15', 'Masculino', 'negaxyzydo@mailinator.com', 1),
(22, '67e4701a91795.920a5f79-f4dc-44d8-97a4-bdfaf408341c', 'Sint quam sunt praes', 'Quam sed a tempora v', '1975-08-06', 'Femenino', 'nenelavefe@mailinator.com', 4),
(23, '67e470e5e980d.jpg', 'In voluptas architec', 'Debitis non consequa', '1992-05-24', 'Masculino', 'rugime@mailinator.com', 4),
(24, '67eb008822902.png', 'Rerum sed libero ull', 'Eum fuga Eligendi i', '1983-10-05', 'Femenino', 'linykok@mailinator.com', 1),
(31, '67e476a52f968.png', 'Numquam magni magni ', 'Voluptas impedit la', '2018-06-07', 'Femenino', 'luvipeqas@mailinator.com', 4),
(32, '67e476e067adb.png', 'Maria', 'Lagraba', '2000-12-12', 'Femenino', 'maria@usfx.bo', 1),
(33, '', 'Pedri', 'Navaja', '1992-02-23', 'Masculino', 'koholabab@mailinator.com', 3),
(34, '', 'Ricardo', 'Id dolorem id et do', '1975-08-10', 'Masculino', 'jonu@mailinator.com', 4),
(35, '', 'Expedita commodo qui', 'Iure voluptatem repe', '1970-09-15', 'Masculino', 'negaxyzydo@mailinator.com', 1),
(36, '', 'juanMecanico', 'Est accusamus qui a', '2021-01-26', 'Masculino', 'cymeceweb@mailinator.com', 1),
(37, '67e4701a91795.920a5f79-f4dc-44d8-97a4-bdfaf408341c', 'Sint quam sunt praes', 'Quam sed a tempora v', '1975-08-06', 'Femenino', 'nenelavefe@mailinator.com', 4),
(38, '67e470e5e980d.jpg', 'In voluptas architec', 'Debitis non consequa', '1992-05-24', 'Masculino', 'rugime@mailinator.com', 4),
(39, '67eb008822902.png', 'Rerum sed libero ull', 'Eum fuga Eligendi i', '1983-10-05', 'Femenino', 'linykok@mailinator.com', 1),
(40, '', 'Aut laboris et conse', 'Voluptatem perspicia', '1989-10-28', 'Femenino', 'befafuwowe@mailinator.com', 3),
(41, '', 'Elit exercitation s', 'Aut exercitation aut', '1991-09-13', 'Masculino', 'mevylyh@mailinator.com', 3),
(42, '', 'Mollit molestiae nob', 'Enim alias aut magna', '1975-05-27', 'Femenino', 'tipa@mailinator.com', 4),
(43, '', 'Ullamco aut natus la', 'Adipisicing laborum ', '1981-01-05', 'Masculino', 'luquhotyqy@mailinator.com', 3),
(44, '67e476a52f968.png', 'Numquam magni magni ', 'Voluptas impedit la', '2018-06-07', 'Femenino', 'luvipeqas@mailinator.com', 4),
(45, '67e476e067adb.png', 'Maria', 'Lagraba', '2000-12-12', 'Femenino', 'maria@usfx.bo', 1),
(46, '', 'Pedri', 'Navaja', '1992-02-23', 'Masculino', 'koholabab@mailinator.com', 3),
(47, '', 'Ricardo', 'Id dolorem id et do', '1975-08-10', 'Masculino', 'jonu@mailinator.com', 4),
(48, '', 'Nelva Adalit ', 'Mora Barrionuevo', '1970-09-15', 'Masculino', 'negaxyzydo@mailinator.com', 1),
(49, '', 'juanMecanico', 'Est accusamus qui a', '2021-01-26', 'Masculino', 'cymeceweb@mailinator.com', 1),
(50, '67e4701a91795.920a5f79-f4dc-44d8-97a4-bdfaf408341c', 'Sint quam sunt praes', 'Quam sed a tempora v', '1975-08-06', 'Femenino', 'nenelavefe@mailinator.com', 4),
(51, '67e470e5e980d.jpg', 'In voluptas architec', 'Debitis non consequa', '1992-05-24', 'Masculino', 'rugime@mailinator.com', 4),
(52, '67eb008822902.png', 'Rerum sed libero ull', 'Eum fuga Eligendi i', '1983-10-05', 'Femenino', 'linykok@mailinator.com', 1),
(53, '', 'Aut laboris et conse', 'Voluptatem perspicia', '1989-10-28', 'Femenino', 'befafuwowe@mailinator.com', 3),
(54, '', 'Elit exercitation s', 'Aut exercitation aut', '1991-09-13', 'Masculino', 'mevylyh@mailinator.com', 3),
(55, '', 'Mollit molestiae nob', 'Enim alias aut magna', '1975-05-27', 'Femenino', 'tipa@mailinator.com', 4),
(56, '', 'Ullamco aut natus la', 'Adipisicing laborum ', '1981-01-05', 'Masculino', 'luquhotyqy@mailinator.com', 3),
(62, '67e476a52f968.png', 'Numquam magni magni ', 'Voluptas impedit la', '2018-06-07', 'Femenino', 'luvipeqas@mailinator.com', 4),
(63, '67e476e067adb.png', 'Maria', 'Lagraba', '2000-12-12', 'Femenino', 'maria@usfx.bo', 1),
(64, '', 'Pedri', 'Navaja', '1992-02-23', 'Masculino', 'koholabab@mailinator.com', 3),
(65, '', 'Ricardo', 'Id dolorem id et do', '1975-08-10', 'Masculino', 'jonu@mailinator.com', 4),
(66, '', 'Expedita commodo qui', 'Iure voluptatem repe', '1970-09-15', 'Masculino', 'negaxyzydo@mailinator.com', 1),
(67, '', 'juanMecanico', 'Est accusamus qui a', '2021-01-26', 'Masculino', 'cymeceweb@mailinator.com', 1),
(68, '67e4701a91795.920a5f79-f4dc-44d8-97a4-bdfaf408341c', 'Sint quam sunt praes', 'Quam sed a tempora v', '1975-08-06', 'Femenino', 'nenelavefe@mailinator.com', 4),
(69, '67e470e5e980d.jpg', 'In voluptas architec', 'Debitis non consequa', '1992-05-24', 'Masculino', 'rugime@mailinator.com', 4),
(70, '67eb008822902.png', 'Rerum sed libero ull', 'Eum fuga Eligendi i', '1983-10-05', 'Femenino', 'linykok@mailinator.com', 1),
(71, '', 'Aut laboris et conse', 'Voluptatem perspicia', '1989-10-28', 'Femenino', 'befafuwowe@mailinator.com', 3),
(72, '', 'Elit exercitation s', 'Aut exercitation aut', '1991-09-13', 'Masculino', 'mevylyh@mailinator.com', 3),
(73, '', 'Mollit molestiae nob', 'Enim alias aut magna', '1975-05-27', 'Femenino', 'tipa@mailinator.com', 4),
(74, '', 'Ullamco aut natus la', 'Adipisicing laborum ', '1981-01-05', 'Masculino', 'luquhotyqy@mailinator.com', 3),
(75, '67e476a52f968.png', 'Numquam magni magni ', 'Voluptas impedit la', '2018-06-07', 'Femenino', 'luvipeqas@mailinator.com', 4),
(76, '67e476e067adb.png', 'Maria', 'Lagraba', '2000-12-12', 'Femenino', 'maria@usfx.bo', 1),
(78, '', 'Ricardo', 'Id dolorem id et do', '1975-08-10', 'Masculino', 'jonu@mailinator.com', 4),
(79, '', 'Expedita commodo qui', 'Iure voluptatem repe', '1970-09-15', 'Masculino', 'negaxyzydo@mailinator.com', 1),
(80, '', 'juanMecanico', 'Est accusamus qui a', '2021-01-26', 'Masculino', 'cymeceweb@mailinator.com', 1),
(81, '67e4701a91795.920a5f79-f4dc-44d8-97a4-bdfaf408341c', 'Sint quam sunt praes', 'Quam sed a tempora v', '1975-08-06', 'Femenino', 'nenelavefe@mailinator.com', 4),
(82, '67e470e5e980d.jpg', 'In voluptas architec', 'Debitis non consequa', '1992-05-24', 'Masculino', 'rugime@mailinator.com', 4),
(83, '67eb008822902.png', 'Rerum sed libero ull', 'Eum fuga Eligendi i', '1983-10-05', 'Femenino', 'linykok@mailinator.com', 1),
(84, '', 'Aut laboris et conse', 'Voluptatem perspicia', '1989-10-28', 'Femenino', 'befafuwowe@mailinator.com', 3),
(85, '', 'Elit exercitation s', 'Aut exercitation aut', '1991-09-13', 'Masculino', 'mevylyh@mailinator.com', 3),
(86, '', 'Mollit molestiae nob', 'Enim alias aut magna', '1975-05-27', 'Femenino', 'tipa@mailinator.com', 4),
(87, '', 'Ullamco aut natus la', 'Adipisicing laborum ', '1981-01-05', 'Masculino', 'luquhotyqy@mailinator.com', 3),
(88, '67e476a52f968.png', 'Numquam magni magni ', 'Voluptas impedit la', '2018-06-07', 'Femenino', 'luvipeqas@mailinator.com', 4),
(89, '67e476e067adb.png', 'Maria', 'Lagraba', '2000-12-12', 'Femenino', 'maria@usfx.bo', 1),
(90, '', 'Pedri', 'Navaja', '1992-02-23', 'Masculino', 'koholabab@mailinator.com', 3),
(91, '', 'Ricardo', 'Id dolorem id et do', '1975-08-10', 'Masculino', 'jonu@mailinator.com', 4),
(92, '', 'Expedita commodo qui', 'Iure voluptatem repe', '1970-09-15', 'Masculino', 'negaxyzydo@mailinator.com', 1),
(93, '', 'juanMecanico', 'Est accusamus qui a', '2021-01-26', 'Masculino', 'cymeceweb@mailinator.com', 1),
(94, '67e4701a91795.920a5f79-f4dc-44d8-97a4-bdfaf408341c', 'Sint quam sunt praes', 'Quam sed a tempora v', '1975-08-06', 'Femenino', 'nenelavefe@mailinator.com', 4),
(95, '67e470e5e980d.jpg', 'In voluptas architec', 'Debitis non consequa', '1992-05-24', 'Masculino', 'rugime@mailinator.com', 4),
(96, '67eb008822902.png', 'Rerum sed libero ull', 'Eum fuga Eligendi i', '1983-10-05', 'Femenino', 'linykok@mailinator.com', 1),
(97, '', 'Aut laboris et conse', 'Voluptatem perspicia', '1989-10-28', 'Femenino', 'befafuwowe@mailinator.com', 3),
(98, '', 'Elit exercitation s', 'Aut exercitation aut', '1991-09-13', 'Masculino', 'mevylyh@mailinator.com', 3),
(99, '', 'Mollit molestiae nob', 'Enim alias aut magna', '1975-05-27', 'Femenino', 'tipa@mailinator.com', 4),
(100, '', 'Ullamco aut natus la', 'Adipisicing laborum ', '1981-01-05', 'Masculino', 'luquhotyqy@mailinator.com', 3),
(101, '67e476a52f968.png', 'Numquam magni magni ', 'Voluptas impedit la', '2018-06-07', 'Femenino', 'luvipeqas@mailinator.com', 4),
(102, '67e476e067adb.png', 'Maria', 'Lagraba', '2000-12-12', 'Femenino', 'maria@usfx.bo', 1),
(103, '', 'Pedri', 'Navaja', '1992-02-23', 'Masculino', 'koholabab@mailinator.com', 3),
(104, '', 'Ricardq', 'Id dolorem id et do', '1975-08-10', 'Femenino', 'jonu@mailinator.com', 4),
(105, '', 'Expedita commodo qui', 'Iure voluptatem repe', '1970-09-15', 'Masculino', 'negaxyzydo@mailinator.com', 1),
(106, '', 'juanMecanico', 'Est accusamus qui a', '2021-01-26', 'Masculino', 'cymeceweb@mailinator.com', 1),
(107, '67e4701a91795.920a5f79-f4dc-44d8-97a4-bdfaf408341c', 'Sint quam sunt praes', 'Quam sed a tempora v', '1975-08-06', 'Femenino', 'nenelavefe@mailinator.com', 4),
(108, '67e470e5e980d.jpg', 'In voluptas architec', 'Debitis non consequa', '1992-05-24', 'Masculino', 'rugime@mailinator.com', 4),
(109, '67eb008822902.png', 'Rerum sed libero ull', 'Eum fuga Eligendi i', '1983-10-05', 'Femenino', 'linykok@mailinator.com', 1),
(110, '', 'Aut laboris et conse', 'Voluptatem perspicia', '1989-10-28', 'Femenino', 'befafuwowe@mailinator.com', 3),
(111, '', 'Elit exercitation s', 'Aut exercitation aut', '1991-09-13', 'Masculino', 'mevylyh@mailinator.com', 3),
(112, '', 'Mollit molestiae nob', 'Enim alias aut magna', '1975-05-27', 'Femenino', 'tipa@mailinator.com', 4),
(113, '', 'Ullamco aut natus la', 'Adipisicing laborum ', '1981-01-05', 'Masculino', 'luquhotyqy@mailinator.com', 3),
(114, '', 'Veniam lorem occaec', 'Qui ut consectetur ', '2010-11-11', 'Masculino', 'husujida@mailinator.com', NULL),
(115, '', 'Ut dolore minim adip', 'Repudiandae pariatur', '1989-04-22', 'Femenino', 'laxo@mailinator.com', NULL),
(116, '', 'Sunt sed eiusmod et', 'Sit quibusdam fugit', '1984-05-09', 'Masculino', 'zadixafy@mailinator.com', NULL),
(122, '', 'Aut optio dolorem s', 'Est dolores corrupti', '1986-12-23', 'Femenino', 'towywely@mailinator.com', NULL),
(123, '', 'Esse ullamco incidid', 'Duis qui et aliquip ', '2019-07-06', 'Masculino', 'pasusa@mailinator.com', NULL),
(124, '', 'Fugiat id quod dict', 'Quaerat qui id sapie', '1995-07-26', 'Masculino', 'hytukazaly@mailinator.com', NULL),
(125, '', 'Quis est quia tempo', 'Et dolor ut autem ni', '1975-08-17', 'Masculino', 'pokiq@mailinator.com', NULL),
(126, '', 'Fugiat at qui assum', 'Libero neque ea esse', '1999-04-22', 'Femenino', 'hiqoso@mailinator.com', NULL),
(129, '', 'Nelva Adalit', 'Mora Barrionuevo', '2013-08-15', 'Femenino', 'sovus@mailinator.com', NULL),
(130, '', 'Nelva Adalit', 'Mora Barrionuevo', '0000-00-00', 'Femenino', 'mora@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`id`, `nombre`) VALUES
(1, 'ing sistemas'),
(3, 'ing ciencias'),
(4, 'ing. en TI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `departamento_id`) VALUES
(1, 'Oropeza', 1),
(2, 'Yamparaez', 1),
(3, 'Tomina', 1),
(4, 'Zudañez', 1),
(5, 'Nor cinti', 1),
(6, 'Sud Cinti', 1),
(7, 'Luis Calvp', 1),
(8, 'Hernando Siles', 1),
(9, 'Murillo', 2),
(10, 'Sud Yungas', 2),
(11, 'Cercado', 3),
(12, 'Quillacollo', 3),
(13, 'Cercado', 4),
(14, 'Tomas Frias', 5),
(15, 'CErcado', 6),
(16, 'Andres Ibañez', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `nivel` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`, `nombre`, `nivel`) VALUES
(1, 'admin@sis256.edu', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Adminsitrador', 1),
(2, 'usuario@sis256.edu', 'b665e217b51994789b02b1838e730d6b93baa30f', 'Usuario', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
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
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
