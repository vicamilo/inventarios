-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para db_inventarios
CREATE DATABASE IF NOT EXISTS `db_inventarios` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `db_inventarios`;

-- Volcando estructura para tabla db_inventarios.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `referencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` bigint(20) NOT NULL,
  `peso` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `stock` bigint(20) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_ultima_venta` datetime DEFAULT NULL,
  PRIMARY KEY (`referencia`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_inventarios.productos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `nombre_producto`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha_creacion`, `fecha_ultima_venta`) VALUES
	(1, 'lapiz', '1007', 100, 1, 'utiles', 1900, '2020-05-31', '2020-05-31 12:48:30'),
	(2, 'borrador', '102', 111, 1, 'utiles', 900, '2020-05-31', '2020-05-31 12:25:44');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
