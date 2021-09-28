-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2021 a las 02:20:42
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL COMMENT 'Identificador del área',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre del área de la empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'nuevo'),
(2, 'Ingenieria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL COMMENT 'Identificador del empleado',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre completo del empleado. Campo tipo Text.Solo debe permitir letras con o sin tilde y espacios. No se admiten caracteres especiales ni números.\r\nObligatorio.',
  `email` varchar(255) NOT NULL COMMENT 'Correo electrónico del empleado. Campo de tipo Text|Email. Solo permite una estructura de correo. Obligatorio.',
  `sexo` char(1) NOT NULL COMMENT 'Campo de tipo Radio Button. M para Masculino. F para Femenino. Obligatorio.',
  `area_id` int(11) NOT NULL COMMENT 'Area de la empresa a la que pertenece el empleado. Campo de tipo Select.\r\nObligatorio.',
  `boletin` int(11) NOT NULL COMMENT '1 para Recibir boletín. 0 para No recibir boletín. Campo de tipo Checkbox.\r\nOpcional.',
  `descripcion` text NOT NULL COMMENT 'Se describe la experiencia del empleado. Campo de tipo textarea. Obligatorio.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`) VALUES
(152, 'Joseph David Gomez Castro ', 'joseph.dgc@hotmail.com', 'M', 2, 1, 'experiencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_rol`
--

CREATE TABLE `empleado_rol` (
  `empleado_id` int(11) NOT NULL COMMENT 'Identificador del empleado',
  `rol_id` int(11) NOT NULL COMMENT 'Identificador del rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL COMMENT 'Identificador del rol',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre del Rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_relacion` (`id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indices de la tabla `empleado_rol`
--
ALTER TABLE `empleado_rol`
  ADD UNIQUE KEY `FK_id_rol` (`rol_id`),
  ADD KEY `FK_id_empleado` (`empleado_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del área', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del empleado', AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del rol';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_rol`
--
ALTER TABLE `empleado_rol`
  ADD CONSTRAINT `empleado_rol_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_rol_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
