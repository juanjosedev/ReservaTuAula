-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2018 a las 04:01:21
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservatuaula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `num_oficina` int(3) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `documento` bigint(12) NOT NULL,
  `num_unidad` int(3) NOT NULL,
  `num_bloque` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`num_oficina`, `nombre`, `documento`, `num_unidad`, `num_bloque`) VALUES
(2, 'luz', 1321454, 12, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(4) UNSIGNED ZEROFILL NOT NULL,
  `num_aula` int(3) NOT NULL,
  `num_bloque` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `implementos` text COLLATE utf8_spanish_ci NOT NULL,
  `capacidad` int(3) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id_aula`, `num_aula`, `num_bloque`, `implementos`, `capacidad`, `tipo`, `estado`) VALUES
(0096, 128, 'Inglés', 'Tablero, Sillas, Televisor, Implementos de aseo, Oficinas, Baños', 35, 'Aula normal', 1),
(0098, 135, '5B', 'Tablero, Sillas, Televisor, Implementos de aseo, Libros de inglés, Grabadora', 40, 'Aula normal', 0),
(0099, 130, 'Sociales', 'Tablero, Sillas, Televisor, Implementos de aseo', 38, 'Aula normal', 0),
(0100, 102, 'Industriales', 'Tablero, Sillas, Pc''s, Video beam, Implementos de aseo, Pantalla de vídeo', 35, 'Aula de sistemas', 0),
(0101, 213, 'Ciencias', 'Tablero, Sillas, Video beam, Implementos de aseo, Computador', 38, 'Aula interactiva', 0),
(0102, 136, 'Ciencias', 'Tablero, Sillas, Televisor, Implementos de aseo', 30, 'Aula normal', 0),
(0104, 101, 'Comercial', 'Tablero, Sillas, Implementos de aseo, Máquinas de mecanografía', 30, 'Aula interactiva', 0),
(0105, 212, 'P13', 'Tablero, Sillas, Televisor, Cómoda', 40, 'Aula normal', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_clase` int(4) UNSIGNED ZEROFILL NOT NULL,
  `id_aula` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `dia` tinyint(1) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `profesor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `materia` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_clase`, `id_aula`, `dia`, `hora_inicio`, `hora_fin`, `profesor`, `materia`) VALUES
(0001, 0096, 1, '07:00:00', '08:00:00', 'Hilda Medina', 'Ciencias Sociales'),
(0002, 0098, 1, '07:00:00', '12:00:00', 'Freddy', 'Inglés'),
(0006, 0096, 1, '08:00:00', '10:00:00', 'Hilda Medina', 'Filosofía'),
(0007, 0096, 1, '13:00:00', '19:00:00', 'Viviana', 'Historia'),
(0009, 0098, 1, '12:00:00', '14:00:00', 'Rafael', 'Humanidades'),
(0013, 0098, 1, '14:00:00', '16:00:00', 'Edgar', 'Religión'),
(0014, 0098, 2, '07:00:00', '12:00:00', 'Freddy', 'Religión'),
(0015, 0098, 3, '12:00:00', '14:00:00', 'Edgar', 'Religión'),
(0016, 0098, 3, '14:00:00', '18:00:00', 'Edgar', 'Religión'),
(0017, 0100, 1, '07:00:00', '12:00:00', 'Alex Narváez', 'Programación'),
(0018, 0100, 2, '07:00:00', '09:00:00', 'Alex Narváez', 'Tecnología'),
(0019, 0100, 2, '09:00:00', '12:00:00', 'Alex Narváez', 'Desarrollo web'),
(0020, 0099, 1, '07:00:00', '12:00:00', 'Hilda Medina', 'Sociales'),
(0021, 0100, 3, '10:00:00', '12:00:00', 'Alex Narváez', 'Tecnología'),
(0022, 0100, 3, '12:00:00', '15:00:00', 'Yepes', 'Algoritmos II'),
(0023, 0100, 4, '10:00:00', '12:00:00', 'Alex Narváez', 'Programación'),
(0024, 0101, 5, '09:00:00', '12:00:00', 'Chucho', 'Física II'),
(0025, 0104, 3, '12:00:00', '15:00:00', 'Juan José', 'Desarrollo web'),
(0027, 0105, 3, '14:00:00', '18:00:00', 'Norberto Zapata', 'Sistémico II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(4) UNSIGNED ZEROFILL NOT NULL,
  `id_aula` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `num_documento` bigint(12) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_aula`, `num_documento`, `fecha`, `hora_inicio`, `hora_fin`, `estado`) VALUES
(0036, 0098, 3333, '2018-06-09', '13:00:00', '15:00:00', 3),
(0037, 0098, 2000, '2018-06-05', '12:00:00', '13:00:00', 3),
(0038, 0098, 2000, '2018-06-09', '07:00:00', '12:00:00', 3),
(0039, 0096, 3333, '2018-06-05', '07:00:00', '12:00:00', 3),
(0040, 0104, 2000, '2018-06-13', '15:00:00', '17:00:00', 4),
(0041, 0105, 3333, '2018-06-13', '10:00:00', '12:00:00', 4),
(0042, 0100, 2000, '2018-06-13', '15:00:00', '17:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` bigint(12) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(30) COLLATE utf8_spanish_ci DEFAULT 'dummy.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `tipo`, `correo`, `estado`, `nombre`, `apellidos`, `clave`, `foto`) VALUES
(2000, 'comun', 'josh@gmail.com', 0, 'Josh', 'Sorenson', '123', 'usuario2.jpeg'),
(3333, 'comun', 'stefan@gmail.com', 1, 'Stefan', 'Stefancik', '123', 'usuario1.jpeg'),
(98102505948, 'admin', 'admin@gmail.com', 0, 'Ann', 'Laurens', '1234', 'admin.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`num_oficina`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD UNIQUE KEY `num_bloque` (`num_bloque`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `num_unidad` (`num_unidad`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD UNIQUE KEY `id_aula` (`id_aula`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD UNIQUE KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `documento` (`documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_clase` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
