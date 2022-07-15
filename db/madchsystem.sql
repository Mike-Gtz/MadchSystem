-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para MadchSystem
CREATE DATABASE IF NOT EXISTS `madchsystem` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `MadchSystem`;

-- Volcando estructura para tabla MadchSystem.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProyecto` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla MadchSystem.proyectos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` (`idProyecto`, `nombreProyecto`, `descripcion`, `status`) VALUES
	(1, 'Madch System', 'Pagina Web para promocionar nuestros servicios', 1),
	(14, 'prueba insert', 'solo un servicio', 1),
	(15, 'prueba 2', 'un servicio y un equipo', 0),
	(16, 'prueba 3', 'equipo', 1),
	(17, 'prueba 4', 'varios de todos', 1),
	(19, 'prueba 5', 'ninguno', 1);
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;

-- Volcando estructura para tabla MadchSystem.proyectos_servicios
CREATE TABLE IF NOT EXISTS `proyectos_servicios` (
  `idPs` int(11) NOT NULL AUTO_INCREMENT,
  `idProyecto` int(11) DEFAULT NULL,
  `idServ` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPs`),
  UNIQUE KEY `idProyecto_idServ` (`idProyecto`,`idServ`),
  KEY `fk4` (`idServ`),
  CONSTRAINT `fk3` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk4` FOREIGN KEY (`idServ`) REFERENCES `servicios` (`idServ`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla MadchSystem.proyectos_servicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_servicios` DISABLE KEYS */;
INSERT INTO `proyectos_servicios` (`idPs`, `idProyecto`, `idServ`, `status`) VALUES
	(1, 14, 4, 1),
	(2, 15, 4, 1),
	(3, 17, 1, 1),
	(4, 17, 4, 1);
/*!40000 ALTER TABLE `proyectos_servicios` ENABLE KEYS */;

-- Volcando estructura para tabla MadchSystem.proyectos_usuarios
CREATE TABLE IF NOT EXISTS `proyectos_usuarios` (
  `idEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `idProyecto` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEquipo`),
  UNIQUE KEY `idProyecto_idUsuario` (`idProyecto`,`idUsuario`),
  KEY `fk2` (`idUsuario`),
  CONSTRAINT `fk1` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla MadchSystem.proyectos_usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_usuarios` DISABLE KEYS */;
INSERT INTO `proyectos_usuarios` (`idEquipo`, `idProyecto`, `idUsuario`, `status`) VALUES
	(1, 15, 3, 1),
	(2, 16, 5, 1),
	(3, 17, 3, 1),
	(4, 17, 4, 1),
	(5, 17, 5, 1),
	(6, 17, 1, 1);
/*!40000 ALTER TABLE `proyectos_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla MadchSystem.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `idServ` int(11) NOT NULL AUTO_INCREMENT,
  `nombreServ` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idServ`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla MadchSystem.servicios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`idServ`, `nombreServ`, `status`) VALUES
	(1, 'creacion de web', 1),
	(4, 'prueba consola', 1);
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando estructura para tabla MadchSystem.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidos` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `fcContra` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `contra` varchar(250) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla MadchSystem.usuarios: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellidos`, `email`, `fcContra`, `contra`, `telefono`, `tipo`, `status`) VALUES
	(1, 'Pedro', 'paramos', 'pedroparamo@kc.com', '2022-08-15 03:43:39', '25d55ad283aa400af464c76d713c07ad', '4422101616', 'Admin', 1),
	(2, 'pedro', 'picapiedra', 'pedropicapiedra@kc.com', '2022-07-15 03:43:37', '25d55ad283aa400af464c76d713c07ad', '1232222222', 'Colaborador', 0),
	(3, 'jonathan', 'harker', 'harker@gmail.com', '2023-01-15 03:44:29', '25d55ad283aa400af464c76d713c07ad', '2333112222', 'Admin', 1),
	(4, 'Wilhelmina', 'Murray', 'mina@gmail.com', '2022-09-15 03:43:42', '25d55ad283aa400af464c76d713c07ad', '2323234398', 'Admin', 1),
	(5, 'Hans', 'Andersen', 'hans@mail.con', '2022-08-26 14:42:50', '48d9b416bac940634de1a0ef6e41f995', '2222332365', 'Admin', 1),
	(6, 'Joseph', 'Haydn', 'joseph@mail.com', '2022-07-15 03:43:35', '25d55ad283aa400af464c76d713c07ad', '2222222222', 'Colaborador', 0),
	(7, 'test', 'apteste', 'test@gmail.com', '2022-08-15 03:43:41', '25d55ad283aa400af464c76d713c07ad', '2222232222', 'Colaborador', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
