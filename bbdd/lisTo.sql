-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para admin_listo
CREATE DATABASE IF NOT EXISTS `admin_listo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `admin_listo`;

-- Volcando estructura para tabla admin_listo.alimento
CREATE TABLE IF NOT EXISTS `alimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL,
  `unidad_medida` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_alimento_tipo_alimento` (`tipo`),
  KEY `FK_alimento_unidad_medida` (`unidad_medida`),
  KEY `FK_alimento_usuarios` (`idUsuario`),
  CONSTRAINT `FK_alimento_tipo_alimento` FOREIGN KEY (`tipo`) REFERENCES `tipo_alimento` (`id`),
  CONSTRAINT `FK_alimento_unidad_medida` FOREIGN KEY (`unidad_medida`) REFERENCES `unidad_medida` (`id`),
  CONSTRAINT `FK_alimento_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.alimento_defecto
CREATE TABLE IF NOT EXISTS `alimento_defecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `unidad_medida` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.lista
CREATE TABLE IF NOT EXISTS `lista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alimentosJSON` longtext DEFAULT NULL,
  `idUsuario` int(11) DEFAULT 0,
  `fechaCreacion` timestamp DEFAULT NULL,
  `activo` tinyint(4) DEFAULT 1,
  `vecesMarcadaComoActiva` int(11) DEFAULT 0,
  `tituloLista` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_lista_usuarios` (`idUsuario`),
  CONSTRAINT `FK_lista_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.lista_temporal
CREATE TABLE IF NOT EXISTS `lista_temporal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idReceta` int(11) NOT NULL DEFAULT 0,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__receta` (`idReceta`),
  KEY `FK_lista_temporal_usuarios` (`idUsuario`),
  CONSTRAINT `FK__receta` FOREIGN KEY (`idReceta`) REFERENCES `receta` (`id`),
  CONSTRAINT `FK_lista_temporal_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.receta
CREATE TABLE IF NOT EXISTS `receta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `dificultad` int(11) DEFAULT 1,
  `tiempoEstimado` int(11) DEFAULT 1,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_receta_tiempo_aproximado` (`tiempoEstimado`),
  CONSTRAINT `FK_receta_tiempo_aproximado` FOREIGN KEY (`tiempoEstimado`) REFERENCES `tiempo_aproximado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.receta_alimento
CREATE TABLE IF NOT EXISTS `receta_alimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idReceta` int(11) NOT NULL DEFAULT 0,
  `idAlimento` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `idUnidadMedida` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_receta_alimento_receta` (`idReceta`),
  KEY `FK_receta_alimento_alimento` (`idAlimento`),
  KEY `FK_receta_alimento_unidad_medida` (`idUnidadMedida`),
  CONSTRAINT `FK_receta_alimento_receta` FOREIGN KEY (`idReceta`) REFERENCES `receta` (`id`),
  CONSTRAINT `FK_receta_alimento_unidad_medida` FOREIGN KEY (`idUnidadMedida`) REFERENCES `unidad_medida` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(30) NOT NULL DEFAULT 'Agente',
  `colorRol` varchar(10) NOT NULL DEFAULT '#007bff',
  `nivelAccesoRol` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idRol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.tiempo_aproximado
CREATE TABLE IF NOT EXISTS `tiempo_aproximado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.tipo_alimento
CREATE TABLE IF NOT EXISTS `tipo_alimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.unidad_medida
CREATE TABLE IF NOT EXISTS `unidad_medida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_listo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(200) DEFAULT NULL,
  `emailUsuario` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `idRolUsuario` int(11) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`) USING BTREE,
  KEY `idRolUsuario` (`idRolUsuario`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`idRolUsuario`) REFERENCES `roles` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
