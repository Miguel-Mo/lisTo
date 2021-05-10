-- --------------------------------------------------------
-- Host:                         dataleanmakers.com.es
-- Versión del servidor:         10.3.27-MariaDB - MariaDB Server
-- SO del servidor:              Linux
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para admin_casakiki
CREATE DATABASE IF NOT EXISTS `admin_listo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `admin_listo`;

-- Volcando estructura para tabla admin_casakiki.centros
CREATE TABLE IF NOT EXISTS `centros` (
  `idCentro` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `nombreCentro` varchar(150) DEFAULT NULL,
  `direccionCentro` varchar(150) DEFAULT NULL,
  `poblacionCentro` varchar(150) DEFAULT NULL,
  `cifCentro` varchar(25) DEFAULT NULL,
  `telefonoCentro` varchar(11) DEFAULT NULL,
  `emailAdministracionCentro` varchar(150) DEFAULT NULL,
  `emailPedidosCentro` varchar(150) DEFAULT NULL,
  `fechaAltaBBDD` date DEFAULT curdate(),
  `fechaUltimaModificacion` date DEFAULT NULL,
  PRIMARY KEY (`idCentro`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `FK_centros_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla admin_casakiki.centros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `centros` DISABLE KEYS */;
/*!40000 ALTER TABLE `centros` ENABLE KEYS */;

-- Volcando estructura para tabla admin_casakiki.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `idRolPersona` int(11) DEFAULT NULL,
  `idCentroPersona` int(11) DEFAULT NULL,
  `nombrePersona` varchar(150) DEFAULT NULL,
  `direccionPersona` varchar(150) DEFAULT NULL,
  `telefonoPersona` varchar(11) DEFAULT NULL,
  `movilPersona` varchar(11) DEFAULT NULL,
  `emailPersona` varchar(150) DEFAULT NULL,
  `docIdentidadPersona` varchar(11) DEFAULT NULL,
  `numCuentaPersona` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPersona`),
  KEY `idRolPersona` (`idRolPersona`),
  KEY `idCentroPersona` (`idCentroPersona`),
  CONSTRAINT `FK__centros` FOREIGN KEY (`idCentroPersona`) REFERENCES `centros` (`idCentro`),
  CONSTRAINT `FK__roles` FOREIGN KEY (`idRolPersona`) REFERENCES `roles` (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla admin_casakiki.personas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla admin_casakiki.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(30) NOT NULL DEFAULT 'Agente',
  `colorRol` varchar(10) NOT NULL DEFAULT '#007bff',
  `nivelAccesoRol` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idRol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla admin_casakiki.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`idRol`, `nombreRol`, `colorRol`, `nivelAccesoRol`) VALUES
	(1, 'Administrador', '#007bff', 1);
INSERT INTO `roles` (`idRol`, `nombreRol`, `colorRol`, `nivelAccesoRol`) VALUES
	(2, 'Centro', '#007bff', 1);
INSERT INTO `roles` (`idRol`, `nombreRol`, `colorRol`, `nivelAccesoRol`) VALUES
	(3, 'Empleado', '#007bff', 1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla admin_casakiki.tareas
CREATE TABLE IF NOT EXISTS `tareas` (
  `idTarea` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoTarea` int(11) DEFAULT NULL,
  `nombreTarea` varchar(150) DEFAULT NULL,
  `minutosEstimadosTarea` float DEFAULT NULL,
  `descripcionTarea` varchar(1250) DEFAULT NULL,
  PRIMARY KEY (`idTarea`),
  KEY `idTipoTarea` (`idTipoTarea`),
  CONSTRAINT `FK_tareas_tareas_tipos` FOREIGN KEY (`idTipoTarea`) REFERENCES `tareas_tipos` (`idTipoTarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla admin_casakiki.tareas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;

-- Volcando estructura para tabla admin_casakiki.tareas_pausas
CREATE TABLE IF NOT EXISTS `tareas_pausas` (
  `idPausa` int(11) NOT NULL AUTO_INCREMENT,
  `idTareaPausa` int(11) DEFAULT NULL,
  `inicioTarea` datetime DEFAULT NULL,
  `pausaTarea` datetime DEFAULT NULL,
  PRIMARY KEY (`idPausa`),
  KEY `idTareaPausa` (`idTareaPausa`),
  CONSTRAINT `FK_tareas_pausas_tareas_persona` FOREIGN KEY (`idTareaPausa`) REFERENCES `tareas_persona` (`idTareaPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla admin_casakiki.tareas_pausas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas_pausas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas_pausas` ENABLE KEYS */;

-- Volcando estructura para tabla admin_casakiki.tareas_persona
CREATE TABLE IF NOT EXISTS `tareas_persona` (
  `idTareaPersona` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) DEFAULT NULL,
  `fechaTarea` datetime DEFAULT NULL,
  `inicioTarea` datetime DEFAULT NULL,
  `finTarea` datetime DEFAULT NULL,
  PRIMARY KEY (`idTareaPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla admin_casakiki.tareas_persona: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas_persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas_persona` ENABLE KEYS */;

-- Volcando estructura para tabla admin_casakiki.tareas_tipos
CREATE TABLE IF NOT EXISTS `tareas_tipos` (
  `idTipoTarea` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipo` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idTipoTarea`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla admin_casakiki.tareas_tipos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas_tipos` DISABLE KEYS */;
INSERT INTO `tareas_tipos` (`idTipoTarea`, `nombreTipo`) VALUES
	(1, 'control');
INSERT INTO `tareas_tipos` (`idTipoTarea`, `nombreTipo`) VALUES
	(2, 'elaboración');
/*!40000 ALTER TABLE `tareas_tipos` ENABLE KEYS */;

-- Volcando estructura para tabla admin_casakiki.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(200) DEFAULT NULL,
  `emailUsuario` varchar(200) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `idRolUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`) USING BTREE,
  KEY `idRolUsuario` (`idRolUsuario`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`idRolUsuario`) REFERENCES `roles` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla admin_casakiki.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `emailUsuario`, `password`, `idRolUsuario`) VALUES
	(1, 'test', 'test@data.es', 'test', 1);
INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `emailUsuario`, `password`, `idRolUsuario`) VALUES
	(2, 'admin', 'admin@casakiki.es', 'admin', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
