-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.6.7-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bd_mdp
CREATE DATABASE IF NOT EXISTS `bd_mdp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_mdp`;

-- Volcando estructura para tabla bd_mdp.huellas
CREATE TABLE IF NOT EXISTS `huellas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) NOT NULL,
  `nombre_dedo` varchar(20) DEFAULT NULL,
  `huella` longblob DEFAULT NULL,
  `imgHuella` longblob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla bd_mdp.huellas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.huellas_temp
CREATE TABLE IF NOT EXISTS `huellas_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pc_serial` varchar(100) NOT NULL,
  `imgHuella` longblob DEFAULT NULL,
  `huella` longblob DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `texto` varchar(100) DEFAULT NULL,
  `statusPlantilla` varchar(100) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `dedo` varchar(20) DEFAULT NULL,
  `opc` varchar(20) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla bd_mdp.huellas_temp: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbacceso
CREATE TABLE IF NOT EXISTS `tbacceso` (
  `Acc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Acc_Descripcion` varchar(150) NOT NULL,
  `Acc_Estado` char(1) NOT NULL,
  PRIMARY KEY (`Acc_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbacceso: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbarea
CREATE TABLE IF NOT EXISTS `tbarea` (
  `Are_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Are_Estado` char(1) NOT NULL,
  `Are_Descripcion` varchar(200) NOT NULL,
  `Are_Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Are_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbarea: ~1 rows (aproximadamente)
INSERT INTO `tbarea` (`Are_Id`, `Are_Estado`, `Are_Descripcion`, `Are_Nombre`) VALUES
	(1, 'A', 'Rentas', 'Rentas');

-- Volcando estructura para tabla bd_mdp.tbasistenciapers
CREATE TABLE IF NOT EXISTS `tbasistenciapers` (
  `AsiPer_Id` int(11) NOT NULL AUTO_INCREMENT,
  `AsiPer_Fec` date NOT NULL,
  `AsiPer_IdTrab` int(11) NOT NULL,
  `AsiPer_Tiempo` time NOT NULL,
  `AsiPer_Mensaje` varchar(30) NOT NULL,
  `AsiPer_Detalle` varchar(80) NOT NULL,
  PRIMARY KEY (`AsiPer_Id`),
  KEY `AsiPer_IdTrab` (`AsiPer_IdTrab`),
  CONSTRAINT `tbasistenciapers_ibfk_1` FOREIGN KEY (`AsiPer_IdTrab`) REFERENCES `tbtrabajador` (`Tra_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbasistenciapers: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbatcasignacion
CREATE TABLE IF NOT EXISTS `tbatcasignacion` (
  `Atc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Atc_FecAsig` date NOT NULL,
  `Atc_IdCargo` int(11) NOT NULL,
  `Atc_FecIniCargo` date NOT NULL,
  `Atc_FecFinCargo` date NOT NULL,
  `Atc_IdArea` int(11) NOT NULL,
  `Atc_FecIniArea` date NOT NULL,
  `Atc_FecFinArea` date NOT NULL,
  `Atc_Estado` char(1) NOT NULL,
  `Atc_idTrabajador` int(11) NOT NULL,
  PRIMARY KEY (`Atc_Id`),
  KEY `Atc_IdArea` (`Atc_IdArea`),
  KEY `Atc_IdCargo` (`Atc_IdCargo`),
  KEY `Atc_idTrabajador` (`Atc_idTrabajador`),
  CONSTRAINT `tbatcasignacion_ibfk_1` FOREIGN KEY (`Atc_IdArea`) REFERENCES `tbarea` (`Are_Id`),
  CONSTRAINT `tbatcasignacion_ibfk_2` FOREIGN KEY (`Atc_IdCargo`) REFERENCES `tbcargo` (`Car_Id`),
  CONSTRAINT `tbatcasignacion_ibfk_3` FOREIGN KEY (`Atc_idTrabajador`) REFERENCES `tbtrabajador` (`Tra_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbatcasignacion: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbcargo
CREATE TABLE IF NOT EXISTS `tbcargo` (
  `Car_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Car_Estado` char(1) NOT NULL,
  `Car_Descripcion` varchar(200) NOT NULL,
  `Car_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Car_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbcargo: ~1 rows (aproximadamente)
INSERT INTO `tbcargo` (`Car_Id`, `Car_Estado`, `Car_Descripcion`, `Car_nombre`) VALUES
	(1, 'A', 'Alcalde', 'Alcalde');

-- Volcando estructura para tabla bd_mdp.tbcontrato
CREATE TABLE IF NOT EXISTS `tbcontrato` (
  `Con_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Con_SerialDoc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Con_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbcontrato: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbdocumento
CREATE TABLE IF NOT EXISTS `tbdocumento` (
  `Doc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Doc_Numero` char(15) NOT NULL,
  `Doc_IdTipoDoc` int(11) NOT NULL,
  `Doc_IdPersona` int(11) NOT NULL,
  PRIMARY KEY (`Doc_Id`),
  KEY `Doc_IdPersona` (`Doc_IdPersona`),
  KEY `Doc_IdTipoDoc` (`Doc_IdTipoDoc`),
  CONSTRAINT `tbdocumento_ibfk_1` FOREIGN KEY (`Doc_IdPersona`) REFERENCES `tbpersona` (`Per_Id`),
  CONSTRAINT `tbdocumento_ibfk_2` FOREIGN KEY (`Doc_IdTipoDoc`) REFERENCES `tbtipodocumento` (`TipDoc_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbdocumento: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbhorario
CREATE TABLE IF NOT EXISTS `tbhorario` (
  `Hor_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Dia_Semana` char(7) NOT NULL,
  `Hor_HoraIni` time NOT NULL,
  `Hor_HoraFin` time NOT NULL,
  PRIMARY KEY (`Hor_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbhorario: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbhorariostrabajador
CREATE TABLE IF NOT EXISTS `tbhorariostrabajador` (
  `HorTra_Id` int(11) NOT NULL AUTO_INCREMENT,
  `HorTra_IdTrabajador` int(11) DEFAULT NULL,
  `HorTra_IdHorario` int(11) DEFAULT NULL,
  `HorTra_Estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`HorTra_Id`),
  KEY `HorTra_IdTrabajador` (`HorTra_IdTrabajador`),
  KEY `HorTra_IdHorario` (`HorTra_IdHorario`),
  CONSTRAINT `tbhorariostrabajador_ibfk_1` FOREIGN KEY (`HorTra_IdTrabajador`) REFERENCES `tbtrabajador` (`Tra_Id`),
  CONSTRAINT `tbhorariostrabajador_ibfk_2` FOREIGN KEY (`HorTra_IdHorario`) REFERENCES `tbhorario` (`Hor_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbhorariostrabajador: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbpersona
CREATE TABLE IF NOT EXISTS `tbpersona` (
  `Per_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Per_Nombre` varchar(50) NOT NULL,
  `Per_ApePatMat` varchar(50) NOT NULL,
  `Per_Direccion` varchar(50) NOT NULL,
  `Per_Provincia` int(1) NOT NULL DEFAULT 0,
  `Per_Departamento` int(1) NOT NULL DEFAULT 0,
  `Per_Distrito` int(1) NOT NULL DEFAULT 0,
  `Per_Celular` int(1) NOT NULL,
  `Per_Correo` varchar(30) NOT NULL,
  `Per_Sexo` char(1) NOT NULL,
  `Per_FecNac` date NOT NULL,
  `Per_Foto` varchar(250) DEFAULT NULL,
  `Per_pcSerial` varchar(100) DEFAULT NULL,
  `Per_Documento` char(10) NOT NULL,
  PRIMARY KEY (`Per_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbpersona: ~1 rows (aproximadamente)
INSERT INTO `tbpersona` (`Per_Id`, `Per_Nombre`, `Per_ApePatMat`, `Per_Direccion`, `Per_Provincia`, `Per_Departamento`, `Per_Distrito`, `Per_Celular`, `Per_Correo`, `Per_Sexo`, `Per_FecNac`, `Per_Foto`, `Per_pcSerial`, `Per_Documento`) VALUES
	(1, 'yampier', 'hernandez', 'Jr.Bolivar 553', 4123, 4108, 4127, 987456321, 'yam.gil.sh@gmail.com', 'm', '2022-07-07', NULL, NULL, '96325874'),
	(3, 'Angela', 'tarrillo Chirinos', 'papa el toro 456', 3885, 3884, 3905, 987456321, 'yam.gil.sh@gmail.com', 'f', '1999-11-13', NULL, NULL, '96325874'),
	(13, 'Rosa', 'Rosa', '1111', 3927, 3926, 3944, 11111, '11111', 'f', '1111-11-11', NULL, NULL, '11111111');

-- Volcando estructura para tabla bd_mdp.tbprinthuella
CREATE TABLE IF NOT EXISTS `tbprinthuella` (
  `PriHue_Id` int(11) NOT NULL AUTO_INCREMENT,
  `PriHue_Documento` varchar(20) NOT NULL,
  `PriHue_Dedo` varchar(20) DEFAULT NULL,
  `PriHue_Huella` longblob DEFAULT NULL,
  `PriHue_Imagen` longblob DEFAULT NULL,
  PRIMARY KEY (`PriHue_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbprinthuella: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbrol
CREATE TABLE IF NOT EXISTS `tbrol` (
  `Rol_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rol_Descripcion` varchar(50) NOT NULL,
  `Rol_Estado` char(1) NOT NULL,
  PRIMARY KEY (`Rol_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbrol: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbrolacceso
CREATE TABLE IF NOT EXISTS `tbrolacceso` (
  `RolAcc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `RolAcc_Estado` char(1) NOT NULL,
  `RolAcc_IdRol` int(11) NOT NULL,
  `RolAcc_IdAcceso` int(11) NOT NULL,
  PRIMARY KEY (`RolAcc_Id`),
  KEY `RolAcc_IdAcceso` (`RolAcc_IdAcceso`),
  KEY `RolAcc_IdRol` (`RolAcc_IdRol`),
  CONSTRAINT `tbrolacceso_ibfk_1` FOREIGN KEY (`RolAcc_IdAcceso`) REFERENCES `tbacceso` (`Acc_Id`),
  CONSTRAINT `tbrolacceso_ibfk_2` FOREIGN KEY (`RolAcc_IdRol`) REFERENCES `tbrol` (`Rol_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbrolacceso: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbrolusuario
CREATE TABLE IF NOT EXISTS `tbrolusuario` (
  `RolUsu_Id` int(11) NOT NULL AUTO_INCREMENT,
  `RolUsu_Estado` char(1) NOT NULL,
  `RolUsu_IdRol` int(11) NOT NULL,
  `RolUsu_FecIni` date NOT NULL,
  `RolUsu_FecFin` date DEFAULT NULL,
  `RolUsu_IdUsuario` int(11) NOT NULL,
  PRIMARY KEY (`RolUsu_Id`),
  KEY `RolUsu_IdUsuario` (`RolUsu_IdUsuario`),
  KEY `RolUsu_IdRol` (`RolUsu_IdRol`),
  CONSTRAINT `tbrolusuario_ibfk_1` FOREIGN KEY (`RolUsu_IdUsuario`) REFERENCES `tbusuario` (`Usu_Id`),
  CONSTRAINT `tbrolusuario_ibfk_2` FOREIGN KEY (`RolUsu_IdRol`) REFERENCES `tbrol` (`Rol_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbrolusuario: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbtempprint
CREATE TABLE IF NOT EXISTS `tbtempprint` (
  `TemPri_Id` int(11) NOT NULL AUTO_INCREMENT,
  `TemPri_FecIni` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TemPri_Serial` varchar(100) NOT NULL,
  `TemPri_Imagen` longblob DEFAULT NULL,
  `TemPri_huella` longblob DEFAULT NULL,
  `TemPri_FecAct` timestamp NULL DEFAULT NULL,
  `TemPri_texto` varchar(100) DEFAULT NULL,
  `EstatusPlantilla` varchar(100) DEFAULT NULL,
  `TemPri_Documento` varchar(20) DEFAULT NULL,
  `TemPri_Nombre` varchar(20) DEFAULT NULL,
  `TemPri_Dedo` varchar(20) DEFAULT NULL,
  `TemPri_Opcion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`TemPri_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbtempprint: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbtipodocumento
CREATE TABLE IF NOT EXISTS `tbtipodocumento` (
  `TipDoc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `TipDoc_Descripcion` varchar(15) NOT NULL,
  `TipDoc_Estado` char(1) NOT NULL,
  PRIMARY KEY (`TipDoc_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbtipodocumento: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbtrabajador
CREATE TABLE IF NOT EXISTS `tbtrabajador` (
  `Tra_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tra_Sueldo` decimal(5,2) NOT NULL,
  `Tra_IdPersona` int(11) NOT NULL,
  `Tra_IdUsuario` int(11) NOT NULL,
  PRIMARY KEY (`Tra_Id`),
  KEY `Tra_IdPersona` (`Tra_IdPersona`),
  KEY `Tra_IdUsuario` (`Tra_IdUsuario`),
  CONSTRAINT `tbtrabajador_ibfk_1` FOREIGN KEY (`Tra_IdPersona`) REFERENCES `tbpersona` (`Per_Id`),
  CONSTRAINT `tbtrabajador_ibfk_2` FOREIGN KEY (`Tra_IdUsuario`) REFERENCES `tbusuario` (`Usu_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbtrabajador: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbtrabajadorcontrato
CREATE TABLE IF NOT EXISTS `tbtrabajadorcontrato` (
  `TraCon_Id` int(11) NOT NULL AUTO_INCREMENT,
  `TraCon_IdTrabajador` int(11) DEFAULT NULL,
  `TraCon_IdContrato` int(11) DEFAULT NULL,
  `TraCon_FecIni` date DEFAULT NULL,
  `TraCon_FecFin` date DEFAULT NULL,
  PRIMARY KEY (`TraCon_Id`),
  KEY `TraCon_IdContrato` (`TraCon_IdContrato`),
  KEY `TraCon_IdTrabajador` (`TraCon_IdTrabajador`),
  CONSTRAINT `tbtrabajadorcontrato_ibfk_1` FOREIGN KEY (`TraCon_IdContrato`) REFERENCES `tbcontrato` (`Con_Id`),
  CONSTRAINT `tbtrabajadorcontrato_ibfk_2` FOREIGN KEY (`TraCon_IdTrabajador`) REFERENCES `tbtrabajador` (`Tra_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbtrabajadorcontrato: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_mdp.tbusuario
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `Usu_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Usu_Descripcion` varchar(50) NOT NULL,
  `Usu_ygsh` varchar(20) NOT NULL,
  `Usu_Estado` char(1) NOT NULL,
  `Usu_FecCrea` date NOT NULL,
  `Usu_FecFin` date NOT NULL,
  `Usu_idPersona` int(11) NOT NULL,
  PRIMARY KEY (`Usu_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_mdp.tbusuario: ~1 rows (aproximadamente)
INSERT INTO `tbusuario` (`Usu_Id`, `Usu_Descripcion`, `Usu_ygsh`, `Usu_Estado`, `Usu_FecCrea`, `Usu_FecFin`, `Usu_idPersona`) VALUES
	(1, 'admin', 'admin', 'A', '2022-05-20', '2022-05-20', 1);

-- Volcando estructura para tabla bd_mdp.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `nombre_completo` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_crecion` timestamp NULL DEFAULT NULL,
  `pc_serial` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla bd_mdp.usuarios: ~1 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `documento`, `nombre_completo`, `telefono`, `fecha_crecion`, `pc_serial`) VALUES
	(1, '74304273', 'Yampier severino hernandez', '7163513', '2022-05-20 17:01:18', '001');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
