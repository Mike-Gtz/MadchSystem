-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2022 a las 02:04:59
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `madchsystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `idProyecto` int(11) NOT NULL,
  `nombreProyecto` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`idProyecto`, `nombreProyecto`, `descripcion`, `status`) VALUES
(1, 'Madch System', 'Pagina Web para promocionar nuestros servicios', 1),
(2, 'TAQ Editado', 'InventariosTAQ doblemente editado', 1),
(3, 'prueba', 'sdsadsadaewdewdwedewdewde', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_servicios`
--

CREATE TABLE `proyectos_servicios` (
  `idPs` int(11) NOT NULL,
  `idProyecto` int(11) DEFAULT NULL,
  `idServ` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_usuarios`
--

CREATE TABLE `proyectos_usuarios` (
  `idEquipo` int(11) NOT NULL,
  `idProyecto` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idServ` int(11) NOT NULL,
  `nombreServ` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServ`, `nombreServ`, `status`) VALUES
(1, 'creacion de web', 1),
(2, 'prueba reedit', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidos` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contra` varchar(250) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellidos`, `email`, `contra`, `telefono`, `tipo`, `status`) VALUES
(1, 'Pedro', 'paramo', 'pedroparamo@kc.com', 'c6ec1d943bf62dadd5dfd69cb1ec07a8', '4422101616', 'Colaborador', 1),
(2, 'pedro', 'picapiedra', 'pedropicapiedra@kc.com', '7072a404f9fb33e1805dd6c122e233d3', '1232222222', 'Colaborador', 1),
(3, 'jonathan', 'harker', 'harker@gmail.com', 'e80118aff3ed3bc6f99038f65bef881b', '2222222222', 'Admin', 1),
(4, 'Wilhelmina', 'Murray', 'mina@gmail.com', '91b827e257eeae8e5989d961fe3011df', '2323234398', 'Admin', 1),
(5, 'Hans', 'Andersen', 'hans@mail.con', '48d9b416bac940634de1a0ef6e41f995', '2222332365', 'Admin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`idProyecto`);

--
-- Indices de la tabla `proyectos_servicios`
--
ALTER TABLE `proyectos_servicios`
  ADD PRIMARY KEY (`idPs`),
  ADD KEY `fk3` (`idProyecto`),
  ADD KEY `fk4` (`idServ`);

--
-- Indices de la tabla `proyectos_usuarios`
--
ALTER TABLE `proyectos_usuarios`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `fk1` (`idProyecto`),
  ADD KEY `fk2` (`idUsuario`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServ`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyectos_servicios`
--
ALTER TABLE `proyectos_servicios`
  MODIFY `idPs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos_usuarios`
--
ALTER TABLE `proyectos_usuarios`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyectos_servicios`
--
ALTER TABLE `proyectos_servicios`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`idServ`) REFERENCES `servicios` (`idServ`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyectos_usuarios`
--
ALTER TABLE `proyectos_usuarios`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
