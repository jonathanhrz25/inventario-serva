-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2024 a las 20:21:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `serva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

CREATE TABLE `eventoscalendar` (
  `id` int(11) NOT NULL,
  `evento` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_dde`
--

CREATE TABLE `form_dde` (
  `Id` int(100) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `numero_serie` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `cedis` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `comentarios_observaciones` varchar(200) NOT NULL,
  `status` int(100) NOT NULL COMMENT '0 baja\r\n1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form_dde`
--

INSERT INTO `form_dde` (`Id`, `equipo`, `numero_serie`, `clave`, `estado`, `proceso`, `marca`, `modelo`, `cedis`, `usuario`, `area`, `comentarios_observaciones`, `status`) VALUES
(1, 'Disco Duro Externo', '82GCT14JTVEH', 'PADDCO01', '', '', 'TOSHIBA', 'DT320', 'Pachuca', 'SERVIDOR ASPEL', 'Contabilidad', 'USO EN RESPALDOS DE CARPETA COI', 1),
(2, 'Disco Duro Externo', '1I4420215522', '', '', '', 'ADATA ', 'HD710P-2T', '', '', '', '', 1),
(3, 'Disco Duro Externo', '1I4420215520', '', '', '', 'ADATA ', 'HD710P-2T', '', '', '', '', 1),
(4, 'Disco Duro Externo', '1I3720241289', '', '', '', 'ADATA ', 'HD710P-2T', '', '', '', '', 1),
(5, 'Disco Duro Externo', '1I3620166063', '', '', '', 'ADATA ', 'HD710P-2T', '', '', '', '', 1),
(6, 'Disco Duro Externo', '1H4820031344', '', '', '', 'ADATA ', 'HD710P-2T', '', '', '', '', 1),
(7, 'Disco Duro Externo', 'WDS120G2G0A', 'PADDAD07', 'NUEVO', '', 'WD GREEN', 'HD-1635', '', '', 'ADUANA', '', 1),
(8, 'Disco Duro Externo', '70E1T0LUTRRG', 'PADDSI08', 'NUEVO', '', 'TOSHIBA', 'HD-1620', 'Pachuca', 'PRESTAMO SISTEMAS', 'SISTEMAS', '', 1),
(9, 'Disco Duro Externo', 'na9qywr4', 'PADDSI09', 'NUEVO', '', 'SEAGATE', 'SRD0PV1', 'Pachuca', 'SISTEMAS', 'SISTEMAS', '', 1),
(10, 'Disco Duro Externo', '1K3120143695', 'PADDSI10', 'NUEVO', '', 'ADATA ', 'HD710P-2T', 'Pachuca', 'SISTEMAS', 'SISTEMAS', '', 1),
(11, 'Disco Duro Externo', '1H5120127961', 'PADDSI11', 'REGULAR', '', 'ADATA ', 'HV620S-2T', 'Pachuca', 'SISTEMAS', 'SISTEMAS', '', 1),
(12, 'Disco Duro Externo', '1I1220108078', 'PADDME12', 'REGULAR', '', 'ADATA ', 'HD710P-2T', 'Pachuca', 'PAUL GUTIERREZ', 'MERCADOTECNIA', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_hh`
--

CREATE TABLE `form_hh` (
  `Id` int(10) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `numero_serie` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `estatus` varchar(200) NOT NULL,
  `cedis` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `comentarios_observaciones` varchar(200) NOT NULL,
  `status` int(100) NOT NULL COMMENT '0 baja\r\n1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_impresora`
--

CREATE TABLE `form_impresora` (
  `Id` int(11) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `numero_serie` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cedis` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `comentarios_observaciones` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 baja\r\n1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form_impresora`
--

INSERT INTO `form_impresora` (`Id`, `equipo`, `numero_serie`, `clave`, `estado`, `cedis`, `proceso`, `marca`, `modelo`, `usuario`, `area`, `comentarios_observaciones`, `status`) VALUES
(1, 'IMPRESORA', 'X644826843', 'PAIMCM02', '', 'Pachuca', '', 'EPSON', 'L3110', '', 'COMPRAS', '', 1),
(2, 'IMPRESORA', 'CNDKMD824G', '', '', 'Pachuca', '', 'HP', 'M521DN', '', 'COMPRAS', '', 1),
(3, 'IMPRESORA', 'U65046E8H669950', '', '', 'Pachuca', '', 'BROTHER', 'T310', '', 'CREDITO Y COBRANZA', '', 1),
(4, 'IMPRESORA', 'CNDKN5H17Z', 'PAIMCC01', '', 'Pachuca', '', 'HP', 'M521DN', '', 'CREDITO Y COBRANZA', '', 1),
(5, 'IMPRESORA', 'CNG9BDWB4S', 'PAIMRH01', '', 'Pachuca', '', 'HP', 'M1132', 'ESTEFANY VEGA JACOME', 'RECURSOS HUMANOS', '', 1),
(6, 'IMPRESORA', 'U65046G9H671328', 'PAIMRE01', '', 'Pachuca', '', 'BROTHER', 'T310', 'MARIA GUADALUPE', '', '', 1),
(7, 'IMPRESORA', 'VND3940685', 'PAIMSM01', '', 'Pachuca', '', 'HP', 'P1102W', 'doctora Mara', 'SERVICIO MEDICO', '', 1),
(8, 'IMPRESORA', 'X7GP116674', '', '', 'Pachuca', '', 'EPSON', 'L3150', '', 'CONTABILIDA', '', 1),
(9, 'IMPRESORA', '', 'PAIMCO01', '', 'Pachuca', '', 'HP', 'M521DN', 'depto Contabilidad', 'CONTABILIDA', '', 1),
(10, 'IMPRESORA', '', '', '', 'Pachuca', '', 'CANON', 'D1620', '', 'TELEMARKETING', '', 1),
(11, 'IMPRESORA', '', '', '', 'Pachuca', '', 'HP', '1018', '', 'FINANZAS', '', 1),
(12, 'IMPRESORA', 'VNB3S56100', '', '', 'Pachuca', '', 'HP', 'P1102W', 'mar?a de Jes?s santander', 'FINANZAS', '', 1),
(13, 'IMPRESORA', 'CNDKN5H0QH', '', '', 'Pachuca', '', 'HP', 'M521DN', 'nayeli bautista GERENTE', 'FINANZAS', '', 1),
(14, 'impresora', 'X7GP267758', '', '', 'Pachuca', '', 'epson', 'L3150', '', 'VENTAS', '', 1),
(15, 'IMPRESORA', 'X7GP268212', '', '', 'Pachuca', '', 'EPSON', 'L3150', 'nayely hdz vital', 'ADMINISTRACION CEDIS', '', 1),
(16, 'IMPRESORA', '2SN41444', 'PAIMAC01', '', 'Pachuca', '', 'CANON', 'D1620', 'DEPTOP NAYELI', 'ADMINISTRACION CEDIS', '', 1),
(17, 'IMPRESORA', 'CNB3L8Z177', 'PAIMRE01', '', 'Pachuca', '', 'SAMSUNG', 'M2020', '', 'INVENTARIOS', '', 1),
(18, 'impresora', '', '', '', 'Pachuca', '', 'hp p1102w', 'p1102w', '', 'MERCADOTECNIA', '', 1),
(19, 'IMPRESORA', '', '', '', 'Pachuca', '', 'HP', '', 'MARISOL GAMERO', 'MERCADOTECNIA', '', 1),
(20, 'IMPRESORA', '', '', '', 'Pachuca', '', 'BROTHER', 'T310', '', 'GERENCIA', '', 1),
(21, 'IMPRESORA', 'VNB3K65953', 'PAIMVT01', '', 'Pachuca', '', 'HP', 'LJ PRO MFP M182NW', 'IKTANI LOZANO', 'GERENCIA', '', 1),
(22, 'IMPRESORA', 'AMGC3CSQ400412Y', '', '', 'Pachuca', '', 'HP', 'LN37A330J1DXZX', '', 'VIGILANCIA', '', 1),
(23, 'IMPRESORA', 'CNB1LCJWZH', 'PAIMVI01', '', 'Pachuca', '', 'SAMSUNG', 'M2020', '', '', '', 1),
(24, 'IMPRESORA', '', '', '', 'Pachuca', '', 'HP', 'M130W', '', 'DEVOLUCIONES', '', 1),
(25, 'impresora ', '', '', '', 'Pachuca', '', 'zebra', 'LP 2844', '', 'EMBARQUES', '', 1),
(26, 'impresora ', 'en foto', '', '', 'Pachuca', '', 'zebra', 'GC420T', '', 'EMBARQUES', '', 1),
(27, 'impresora', 'en foto', '', '', 'Pachuca', '', 'zebra', 'zd620', 'Oscar Salazar', 'EMBARQUES', '', 1),
(28, 'impresora ', 'en foto', '', '', 'Pachuca', '', 'zebra', 'zp505', 'oscar', 'EMBARQUES', '', 1),
(29, 'impresora ', 'DA220080188', '', '', 'Pachuca', '', 'tsc', 'da210', 'mar?a maritza', 'EMBARQUES', '', 1),
(30, 'impresora matricial', 'foto', '', '', 'Pachuca', '', 'epson', 'fx-890 ', '', 'EMBARQUES', '', 1),
(31, 'impresora ', 'en foto', '', '', 'Pachuca', '', 'hp', 'p1102w', 'Mariana Cruz', 'EMBARQUES', '', 1),
(32, 'impresora etiquetas', '41J114500793', '', '', 'Pachuca', '', 'zebra', 'TLP 2844', '', 'EMBARQUES', '', 1),
(33, 'impresora ', 'RT420ME2104271327', '', '', 'Pachuca', '', 'ribetec', 'rt-420ME', '', 'EMBARQUES', '', 1),
(34, 'impresora', 'vnd3h59773', '', '', 'Pachuca', '', 'hp', 'p1102w', 'gadiel', 'EMBARQUES', '', 1),
(35, 'impresora ', 'en foto', '', '', 'Pachuca', '', 'hp', 'm521dn ', 'Zuleima', 'PICKING', '', 1),
(36, 'IMPRESORA ', '99J193900095', 'PAIMAL01', '', 'Pachuca', '', 'ZEBRA ', 'ZT411', 'AREA 915', 'PICKING', '', 1),
(37, 'impresora ', '', '', '', 'Pachuca', '', 'CANON', 'D1620', '', 'SURTIDO CEDIS', '', 1),
(38, 'impresora ', 'buscar serie en inventario', '', '', 'Pachuca', '', 'zebra ', 'zt411', 'Mariana', 'SURTIDO CEDIS', '', 1),
(39, 'impresora ', 'CNCCF3F2DK', '', '', 'Pachuca', '', 'hp', 'laserjet 600 M601', 'Mariana', 'SURTIDO CEDIS', '', 1),
(40, 'impresora ', 'U66051C2H872638', '', '', 'Pachuca', '', 'brother', 'T220', 'Arturo almac?n ', 'ALMACEN AL FONDO', '', 1),
(41, 'IMPRESORA', '', '', '', 'Pachuca', '', 'HP', '', '', 'SISTEMAS', '', 1),
(42, 'IMPRESORA', '', '', '', 'Pachuca', '', 'EPSON', 'L3110', '', 'SISTEMAS', '', 1),
(43, 'IMPRESORA', '2SN39223', 'SL-IMP00001', '', 'San Luis Potosi', '', 'CANON', 'D1620', '', 'SAN LUIS POTOSI', '', 1),
(44, 'IMPRESORA ETIQUETAS', 'XXZEN223501748', '', '', 'San Luis Potosi', '', 'ZEBRA', 'ZQ310', '', 'SAN LUIS POTOSI', '', 1),
(45, 'IMPRESORA ETIQUETAS', 'XXZEN223501736', '', '', 'San Luis Potosi', '', 'ZEBRA', 'ZQ310', '', 'SAN LUIS POTOSI', '', 1),
(46, 'IMPRESORA ETIQUETAS', 'XXZEN203100335', 'SL-IE00003', '', 'San Luis Potosi', '', 'ZEBRA', 'ZQ310', '', 'SAN LUIS POTOSI', '', 1),
(47, 'IMPRESORA', '2SN38655', '', '', 'Guadalajara', '', 'CANON', 'D1620', 'GUADALAJARA', 'GUADALAJARA', '', 1),
(48, 'IMPRESORA', '', '', '', 'Villahermosa', '', 'HP', 'M604', '', 'VILLAHERMOSA', '', 1),
(49, 'IMPRESORA', 'CNDKN2P5QP', 'VHIMCD01', '', 'Villahermosa', '', 'HP ', 'M521DN', '', 'VILLAHERMOSA', '', 1),
(50, 'IMPRESORA', '2SN38967', 'MT-IMP0001', '', 'Monterrey', '', 'CANON', 'D1620', '', 'MONTERREY', '', 1),
(51, 'Equipo', 'Numero de Serie', 'Clave', 'Estado', 'Cedis', 'Procedimiento', 'Marca', 'Modelo', 'Usuario', 'Area', 'Comentario y Observaciones', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_laptop`
--

CREATE TABLE `form_laptop` (
  `Id` int(11) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `numero_serie` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `especificaciones` varchar(200) NOT NULL,
  `cedis` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `responsiva` varchar(200) NOT NULL,
  `comentarios_observaciones` varchar(200) NOT NULL,
  `status` int(100) NOT NULL COMMENT '0 baja\r\n1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form_laptop`
--

INSERT INTO `form_laptop` (`Id`, `equipo`, `numero_serie`, `clave`, `estado`, `proceso`, `marca`, `modelo`, `especificaciones`, `cedis`, `usuario`, `area`, `responsiva`, `comentarios_observaciones`, `status`) VALUES
(1, 'LAPTOP', 'CND1270R61', 'PALARE01', 'Buena', 'Mantenimiento', 'HP', '15-DW3033DX', 'CI3-1115G4 8GB WIN10 H 22H2 SSD 256GB', 'Pachuca', 'ALEJANDRO ROJAS', '', 'Si', '', 1),
(2, 'LAPTOP', 'G0D9ZJ3', '', '', '', 'DELL', '15 3511', 'CI3-1115G4 8GB WIN11 HOME 21H2 SSD 256GB', 'Pachuca', 'ALEJANDRO ROJAS', '', '', 'YA NO PRENDIO, SE DA DE BAJA', 1),
(3, 'LAPTOP', 'MP1P3ZTK', '', '', '', 'lenovo', 'S340-14iwl', 'ci5-8265u win11 home sl 21h2 ssd 125gb hdd 1tb', 'Pachuca', 'Emmanuel ', 'CONTABILIDA', '', 'monitor mon00144 acer', 1),
(4, 'LAPTOP', 'G2N0CX04D775088', 'PALATL01', '', '', 'ASUS', 'TP501U', 'CI7-6500U 8GB WIN10 HOME SL 22H2  SSD 500GB', 'Pachuca', ' ', 'TELEMARKETING', '', 'AUMENTAR 4GB DE RAM', 1),
(5, 'LAPTOP', 'CND2210GGM', 'PALATL02', '', '', 'HP', '15-DW1XXX', 'CI7-10510U 8GB WIN11 HOME SSD 512GB', 'Pachuca', 'RAUL PEREZ PEREZ', 'TELEMARKETING', '', '', 1),
(6, 'LAPTOP', '8RQRYH3', 'PALAAC01', '', '', 'DELL', 'VOSTRO 14 3400', 'LAPTOP CI5-1135G7 8GB WIN11 PRO 21H2 SSD 250GB HDD 1TB', 'Pachuca', 'ETEFANI PEREZ JIMENEZ', 'CENTRO DE ATENCION AL CLIENTE', '', '', 1),
(7, 'LAPTOP', '3BRTYH3', 'PALAAC02', '', '', 'DELL', 'VOSTRO 14 3400', 'LAPTOP CI5-1135G7 8GB WIN11 PRO 21H2 SSD 250GB HDD 1TB', 'Pachuca', 'BEATRIZ CHAVARRIA', 'CENTRO DE ATENCION AL CLIENTE', '', '', 1),
(8, 'LAPTOP', '8MKQYH3', 'PALAAC03', '', '', 'DELL', 'VOSTRO 14 3400', 'LAPTOP CI5-1135G7 8GB WIN11 PRO 22H2 SSD 250GB', 'Pachuca', 'AMERICA', 'CENTRO DE ATENCION AL CLIENTE', '', '', 1),
(9, 'LAPTOP', '1ZMVYH3', 'PALAAC04', '', '', 'DELL', 'VOSTRO 14 3400', 'LAPTOP CI5-1135G7 8GB WIN11 PRO 22H2 SSD 250GB', 'Pachuca', 'JACQUELIN SANTIBA?EZ GARCIA', 'CENTRO DE ATENCION AL CLIENTE', '', '', 1),
(10, 'LAPTOP', '5CG2343NS0', 'PALAAC05', '', '', 'HP', '240 G8', 'LAPTOP CI5-1135G7 8GB WIN11 PRO 22H2 SSD 250GB', 'Pachuca', 'MARIA JOSE TELLEZ', 'CENTRO DE ATENCION AL CLIENTE', '', '', 1),
(11, 'LAPTOP', 'CND30818GL', 'PALAAC06', '', '', 'HP', '250 G9', 'LAPTOP CI7-1225U 8GB WIN11 PRO 22H2 SSD 250GB', 'Pachuca', 'CRISTAL OLVERA LEON', 'CENTRO DE ATENCION AL CLIENTE', '', '', 1),
(12, 'LAPTOP', 'PF0HNG79', '', '', '', 'lenovo', 'ideapad 100-14IBD', 'ci3-5005u 4gb win11 home sl 21h2 ssd 240gb', 'Pachuca', 'enhio romeo gomez sanchez', 'VENTAS', '', 'retiene poco la carga', 1),
(13, 'LAPTOP', '5CD9086H0Y', 'PALAVT02', '', '', 'HP', '240 G6', 'CELERON N4000 4GB WIN 10 HOME SL 22H2 SSD 240GB', 'Pachuca', 'ROBERTO CARLOS MARQUEZ ROMAN', 'VENTAS', '', 'no sirve la bateria', 1),
(14, 'LAPTOP', '6Q691F2', '', '', '', 'dell', 'latitudes 3160', 'pentium N3710 4gb win10 pro 21h2 ssd 128gb', 'Pachuca', 'Carlos ilich colmenarez', 'VENTAS', '', 'boton encendido esta flojo al poner las manos sobre la lap se presiona la pantalla', 1),
(15, 'LAPTOP', 'NXGQBAL003834DC5879501', '', '', '', 'acer', 'A515-51-55QD', 'Ci5-7200 8gb win10 home sl 21h2 hdd 500gb', 'Pachuca', 'jose Antonio barragan', 'VENTAS', '', 'trace pad aveces no funciona bien', 1),
(16, 'LAPTOP', 'cnd2047m32', '', '', '', 'hp', '250 g8', 'ci7-1165g7 8gb win 10 pro 21h2 ssd 120gb + hdd 1tb', 'Pachuca', 'emiliano juarez', 'VENTAS', '', '', 1),
(17, 'LAPTOP', 'CND25124VZ', 'PALAVT03', '', '', 'HP', '250 G8', 'CI7-1165G7 8GB WIN 11 PRO 22H2 SSD 512GB', 'Pachuca', 'HECTOR YITZAHK MENDOZA PEREZ', 'VENTAS', '', '', 1),
(18, 'LAPTOP', 'CND25124JV', 'PALAVT01', '', '', 'HP', '250 G8', 'CI7-1165G7 8GB 512GB WIN 11 PRO 22H2', 'Pachuca', 'HENIO ROMEO GOMEZ SANCHEZ', 'VENTAS', '', 'GERENTE COMERCIAL', 1),
(19, 'LAPTOP', 'FXM69T3', 'PALAVT02', '', '', 'DELL', 'VOSTRO 14 3400', 'CI5-1135G7 8GB 256GB WIN 10 PRO 22H2', 'Pachuca', 'CARLOS ILICH COLMENAREZ RANGEL ', 'VENTAS', '', 'SURESTE ', 1),
(20, 'LAPTOP', '5JB69T3', 'PALAVT04', '', '', 'DELL', 'VOSTRO 14 3400', 'CI5-1135G7 8GB 256GB WIN 10 PRO 22H2', 'Pachuca', 'JUAN CARLOS COLMENAREZ RANGEL', 'VENTAS', '', 'OCCIDENTE', 1),
(21, 'LAPTOP', 'J7J69T3', 'PALAVT05', '', '', 'DELL', 'VOSTRO 14 3400', 'CI5-1135G7 8GB 256GB WIN 10 PRO 22H2', 'Pachuca', 'ROBERTO CARLOS MARQUEZ ROMAN ', 'VENTAS', '', 'NORTE', 1),
(22, 'LAPTOP', 'BFB69T3', 'PALAVT06', '', '', 'DELL', 'VOSTRO 14 3400', 'CI5-1135G7 8GB 256GB WIN 10 PRO 22H2', 'Pachuca', ' ALBERTO CARLOS MARTINEZ HERNANDEZ', 'VENTAS', '', 'CENTRO', 1),
(23, 'LAPTOP', '2YC99T3', 'PALAVT07', '', '', 'DELL', 'VOSTRO 14 3400', 'CI5-1135G7 8GB 256GB WIN 10 PRO 22H2', 'Pachuca', 'Jose Antonio Barragan', 'VENTAS', '', 'SUR', 1),
(24, 'LAPTOP', '24FD9T3', 'PALAVT08', '', '', 'DELL', 'VOSTRO 14 3400', 'CI5-1135G7 8GB 256GB WIN 10 PRO 22H2', 'Pachuca', 'FABIAN SOTO', 'VENTAS', '', 'SUP VENTAS', 1),
(25, 'LAPTOP', '5CG24717WL', 'PALAVT09', '', '', 'HP', 'ZBOOK FIREFLY G8', 'CI7-1165G7 16GB 512GB WIN 10 PRO 22H2', 'Pachuca', 'MIGUEL AGUIRRE', 'VENTAS', '', 'GERENTE DE VENTAS', 1),
(26, 'LAPTOP', '5CG3172K4K', 'PALAVT10', '', '', 'HP', '240 G8', 'CI5-1135G7 8GB 256GB WIN 11 HOME SL 22H2', 'Pachuca', 'DANIIEL TAVALES', 'VENTAS', '', 'SUPERVISOR', 1),
(27, 'LAPTOP', '5CD2250RC3', 'PALAVT11', '', '', 'HP', 'PROBOOK 440 G9', 'CI3-1215U 8GB WIN11 PRO SSD 256GB', 'Pachuca', 'JESUS RAMIREZ GARCIA', 'VENTAS', '', 'PROMOTOR FRITEC', 1),
(28, 'LAPTOP', 'PF189L4G', 'PALAVT12', '', '', 'LENOVO', '80XH', 'CI3-6006U 8GB 240GB WIN11 HOME SL 22H2', 'Pachuca', 'JESUS GONZALEZ BUSTAMANTE', 'VENTAS', '', 'NO SIRVE TECLA SHIFT', 1),
(29, 'LAPTOP', 'CND1501J0F', 'PALACD01', '', '', 'HP', '250 G8', 'CI7-1165G7 8GB WIN10 PRO 22H2 SSD 512GB', 'Pachuca', 'DARIANN TORRES', 'ADMINISTRACION CEDIS', '', '', 1),
(30, 'LAPTOP', 'mp13cw0p', '', '', '', 'LENOVO', '100-14IBY', 'celeron N2840 4gb win10 home sl 21h2 ssd 240gb', 'Pachuca', 'bisagra derecha rota', 'PROMOTORIA', '', '', 1),
(31, 'LAPTOP', '5CG2502MW8', 'PALAIN01', '', '', 'HP', '240 G8', 'CI5-1135G7 8GB SSD 512GB WIN 11 HOME', 'Pachuca', 'ALONSO VARGAS ORTIZ', 'INVENTARIOS', '', '', 1),
(32, 'LAPTOP', 'NXGWAAL002051306127600', 'PALAIN02', '', '', 'ACER', 'A114-32-C896', 'CELERON 4GB WIN10 HOME SL 21H2 SSD 64GB', 'Pachuca', 'JONATHAN DAVID ESTEVEZ AVILES', 'INVENTARIOS', '', 'se devolvio el 21-04-23', 1),
(33, 'LAPTOP', '5CG20121GY', 'PALAIN03', '', '', 'HP', '240 G8', 'CI5-10210U 8GB WIN 10 PRO 22H2 SSD 256GB', 'Pachuca', 'HUGO BRAVO ORTIZ', 'INVENTARIOS', '', '', 1),
(34, 'LAPTOP', 'NXGWAAL002051305CD7600', 'PALAIN04', '', '', 'ACER', 'ASPIRE A114-32', 'CELERON N4020 4GB WIN10 HOME SL 22H2 SSD 64GB', 'Pachuca', 'HEBERTH EDUARDO MORALES  ISLAS', 'INVENTARIOS', '', '', 1),
(35, 'LAPTOP', '5CG2011ZKF', 'PALAIN05', '', '', 'HP', '240 G8', 'CI5-10210U  8GB WIN10 PRO SSD 256GB', 'Pachuca', 'ROBERTO CARLOS MARQUEZ ROMAN', 'INVENTARIOS', '', '', 1),
(36, 'LAPTOP', '5CD2250RC3', '', '', '', 'HP', 'PROBOOK 440 G9', 'CI3-1215U 8GB WIN11 PRO SSD 256GB', 'Pachuca', '', '', '', 'Se asigno a Promotor?a (ventas)', 1),
(37, 'LAPTOP', 'R90G7RNB', 'PALAME02', '', '', 'LENOVO', 'THINKPAD W541', 'CI7-4910MQ 16GB WIN10 PRO 22H2 SSD 1TB', 'Pachuca', 'DENISSE', 'MERCADOTECNIA', '', '', 1),
(38, 'LAPTOP', '5CG20121GY', 'PALAME01', '', '', 'HP', '240 G8', 'CI5-10210U 8GB WIN 11 PRO 22H2 SSD 256GB', 'Pachuca', 'FERNANDO REYES', 'MERCADOTECNIA', '', '', 1),
(39, 'LAPTOP', '6WTKS53', '', '', '', 'dell', '3493', 'ci5-1035g1 8gb win10 home 21h1 ssd 256gb ', 'Pachuca', 'se conecta a la L3150 de planeacion ', 'GERENTE NACIONAL CEDIS', '', '', 1),
(40, 'LAPTOP', 'GR0SQ93', '', '', '', 'dell', 'vostro 5301  p121g', 'ci7-1165G7 8gb win11 pro 21h2  ssd 512gb', 'Pachuca', 'brother T310', 'GERENCIA', '', '', 1),
(41, 'LAPTOP', 'CND5451B42', 'PALARC01', '', '', 'HP', '15-AC114LA', 'CI5-5200U 8GB WIN10 HOME HDD 500GB', 'Pachuca', 'ZURISADAI', 'RECEPCION', '', '', 1),
(42, 'LAPTOP', '5CD22897Z5', 'PALADE06', '', '', 'HP', '15-DY2508LA', 'CI3-1115G4 8GB SSD 512GB WIN10 HOME', 'Pachuca', 'HUGO CARPIO ROMERO', 'DEVOLUCIONES', '', '', 1),
(43, 'LAPTOP', 'cnd1508mhw', '', '', '', 'hp', '250 g8 ', 'ci7-1065g7 8gb win10 pro 21h2 hdd 1tb', 'Pachuca', 'monitor balamrush br-932448.  serie: 33533244000623', 'MODELADO DE PRODUCTOS', '', '', 1),
(44, 'LAPTOP', 'CND1508M39', '', '', '', 'hp', '250 g8', 'ci7-1065g7 8gb win10 pro 21h2 hdd 1tb', 'Pachuca', 'monitor Samsung datos en la foto', 'MODELADO DE PRODUCTOS', '', '', 1),
(45, 'LAPTOP', '5CD9086DJS', 'PALAEM01', '', '', 'HP', '240G6', 'CELERON N4000 4GB WIN10 HOME SL 22h2 SDD 240GB', 'Pachuca', 'OSCAR HUGO SALAZAR RAMIREZ', 'EMBARQUES', '', '', 1),
(46, 'LAPTOP', 'CND8445YJY', 'PALAAL01', '', '', 'HP', '15-DA0001LA', 'CELERON N4000 4GB WIN10 HOME SL 22H2 HDD 500GB', 'Pachuca', 'MANUEL BARRAZA', 'PICKING', '', '', 1),
(47, 'LAPTOP', '5CG2020R7N', 'PALARA01', '', '', 'HP', '240 G8', 'CI3-1115G4 8GB WIN11 PRO 22H2 SSD 256GB', 'Pachuca', 'ALVARO PEREZ', 'REABASTO', '', '', 1),
(48, 'LAPTOP', 'CND8445Y26', 'PALARA02', '', '', 'HP', '15-DA0001LA', 'CELERON N4000 4GB WIN10 HOME 22H2 SSD 120GB (ADATA)', 'Pachuca', 'CRISTIAN SANCHEZ PINEDA', 'REABASTO', '', '', 1),
(49, 'LAPTOP', '5CG6072RCY', 'PALARA03', '', '', 'HP', '240 G4', 'CELERON N3050 4GB WIN10 PRO SSD 240GB (KGT)', 'Pachuca', 'JHONATAN FLORES GUZMAN', 'REABASTO', '', '', 1),
(50, 'LAPTOP', '5CG6072S9W', 'PALARA04', '', '', 'HP', '240 G4', 'CELERON N3050 4GB WIN10 PRO SSD 240GB (KGT)', 'Pachuca', 'RAYMUNDO PEREZ', 'REABASTO', '', '', 1),
(51, 'LAPTOP', 'PF0HNG79 ', '', '', '', 'LENOVO', '100-14IBD', 'CI3-5005 4GB WIN11 HOME 21H2 SSD 240 GB', 'Pachuca', 'IVAN SILVA RODRIGUEZ', 'REABASTO', '', '', 1),
(52, 'LAPTOP', '5cd9086dmt', '', '', '', 'HP', '240 g6', 'celeron n4000 4gb win11 pro 21h2 ssd 120gb', 'Pachuca', '', 'REABASTO', '', '', 1),
(53, 'LAPTOP', '5cd9086dkk', '', '', '', 'hp', '240 g6', 'celeron N4000 4gb win10 home SL 21h2 ssd 120gb', 'Pachuca', 'Juan Duran vazquez', 'IFUEL', '', '', 1),
(54, 'LAPTOP', '5cd9086ff6', '', '', '', 'hp ', '240 g6', 'celeron n4000 4gb win19 home sl 21h2 hdd 500gb', 'Pachuca', 'leandro Aldahir', 'IFUEL', '', '', 1),
(55, 'LAPTOP', 'CND8445ZBT', '', '', '', 'hp ', '15-da0001la', 'celeron N4000 4gb win10 home SL 21h2 hdd  500gb', 'Pachuca', 'mariana hernandez Torres', 'SURTIDO CEDIS', '', 'se entrego a Manuel Agosto 2023', 1),
(56, 'LAPTOP', '5CD9086FSY', '', '', '', 'hp ', '240 g6', 'celeron N4000 4gb Win11 home sl 21h2 hdd 500gb', 'Pachuca', 'Jorge Bodegas', 'ALMACEN AL FONDO', '', 'ip   192.168.11.233', 1),
(57, 'LAPTOP', '5CG6072R6Q', '', '', '', 'hp', '240 g4', 'celeron N3050 4gb win11 pro mini OS 21h2 hdd 500gb', 'Pachuca', 'Almac?n Guillermo D ********', 'ALMACEN AL FONDO', '', 'ip   192.168.6.2', 1),
(58, 'LAPTOP', 'CND2283W5X', 'PALAAD01', '', '', 'HP', '250 G8', 'CI3-1115G4 8GB WIN 11 PRO 21H2 SSD  512GB 15.6PLG', 'Pachuca', 'DIANA HURTADO ', 'ADQUISICIONES', '', 'monitor Samsung C24F390FHL', 1),
(59, 'LAPTOP', 'PF3FACWQ', 'PALAJB01', '', '', 'LENOVO', 'V14 G1 IML', 'CI3-10110U 8GB 1TB WIN10 PRO 22H2', 'Pachuca', 'ARTURO JEFE BODEGAS', 'BODEGAS', '', '', 1),
(60, 'LAPTOP', 'MP1G4GQA', 'PALABO02', '', '', 'LENOVO', 'V130-14IKB', 'CI5-7200U 8GB WIN10 PRO 21H2 SSD 240GB', 'Pachuca', 'JONATHAN ADAN MARTINEZ', 'BODEGAS', '', '', 1),
(61, 'LAPTOP', '5CG6072RM8', 'PALABO03', '', '', 'HP', '240 G4', 'CELERON N3050 4GB WIN 10 PRO 22H2 SSD 240GB', 'Pachuca', 'ANDRES LUNA LEON', 'BODEGAS', '', '', 1),
(62, 'LAPTOP', '5CD9086DJG', 'PALABO04', '', '', 'HP', '240 G6', 'CELERON N4000 4GB WIN10 HOME 22H2 HDD 500GB', 'Pachuca', 'FERNANDO ALVAREZ TREJO', 'BODEGAS', '', '', 1),
(63, 'LAPTOP', '5CD9086GWT', 'PALABO05', '', '', 'HP', '240 G6', 'CELERON N4000 4GB WIN 10 HOME 22H2 HOME SL SSD 240GB', 'Pachuca', 'JUAN MANUEL  PONTAZA ESPEJEL', 'BODEGAS', '', '', 1),
(64, 'LAPTOP', '2T791F2', 'PALABO06', '', '', 'DELL', 'LATITUDE 3160', 'PENTIUM N3710 4B WIN 10 PRO 22H2 SSD 120GB', 'Pachuca', 'LUIS ISLAS RAMIREZ', 'BODEGAS', '', '', 1),
(65, 'LAPTOP', '5CD9086G2S', 'PALABO07', '', '', 'HP', '240 G6', 'CELERON N4000 4GB WIN 10 HOME SL 22H2 HDD 500GB', 'Pachuca', 'JAVIER TORRES  GONZALEZ', 'BODEGAS', '', '', 1),
(66, 'LAPTOP', '5CD9086DZ4', 'PALABO08', '', '', 'HP', '240 G6', 'CELERON N4000 4GB WIN 10 HOME SL 22H2 HDD 500GB', 'Pachuca', 'CRISTIAN RODRIGO ACOSTA RODRIGUEZ', 'BODEGAS', '', 'PENDIENTE RESPONSIVA', 1),
(67, 'LAPTOP', '5CG6072R6Q', 'PALABO09', '', '', 'HP', '240 G4', 'CELERON N3050 4GB WIN 10 PRO 22H2 HDD 500GB', 'Pachuca', 'DANIEL REYES LOZANO', 'BODEGAS', '', '', 1),
(68, 'LAPTOP', '5CD2250R8P', '', '', '', 'HP', 'PROBOOK 440 G9', 'CI3-1215U 8GB WIN11 PRO SSD 256GB', 'Pachuca', 'AYERIM CONTRERAS', 'FLOTILLAS', '', 'ANTES PERTENECIA A INVENTARIOS ', 1),
(69, 'LAPTOP', '5CD3452R7Y', 'PALAFL01', '', '', 'HP', '14-N08LA', 'CI5-4200U 8GB WIN10 HOME 22H2 SSD 120GB', 'Pachuca', 'MARIA GUADALUPE', 'FLOTILLAS', '', '', 1),
(70, 'LAPTOP', 'PF17ZWSZ', 'PALACD02', '', '', 'LENOVO', 'IDEAPAD 320-14', 'CI3-6006U 4GB WIN 10 PRO 22H2 SSD  240GB', 'Pachuca', 'PRACTICANTE', 'EQUIPO EN PRESTAMO', '', '', 1),
(71, 'LAPTOP', '', '', '', '', 'HP', '', '', 'Pachuca', 'CRISTIAN', 'SISTEMAS', '', '', 1),
(72, 'LAPTOP', '', '', '', '', 'HP', '250 G8', '', 'Pachuca', 'MISAEL', 'SISTEMAS', '', '', 1),
(73, 'LAPTOP', '', '', '', '', 'HP', '250 G8', '', 'Pachuca', 'GUILLERMINA', 'SISTEMAS', '', '', 1),
(74, 'LAPTOP', '', '', '', '', 'LENOVO', 'YOGA', '', 'Pachuca', 'URIEL', 'SISTEMAS', '', '', 1),
(75, 'LAPTOP', '', '', '', '', 'DELL', '', '', 'Pachuca', 'CARLOS', 'SISTEMAS', '', '', 1),
(76, 'LAPTOP', '', '', '', '', 'LENOVO', '', '', 'Pachuca', 'ARIATNA', 'SISTEMAS', '', '', 1),
(77, 'LAPTOP', 'GRCZ5R3', 'SLLAGT01', '', '', 'DELL', 'VOSTRO 3401', 'CI3-1005G1 12GB 256GB WIN11 PRO 22H2', 'San Luis Potosi', '', 'SAN LUIS POTOSI', '', '', 1),
(78, 'LAPTOP', 'PF0MVEJ7', 'TGLACD01', '', '', 'LENOVO', 'IDEAPAD 100-14IBD', 'CI3-5005U 4GB WIN10 HOME SL HDD 500GB', 'Tuxtla', 'GERENTE ERICK TOLEDO GARCIA', 'TUXTLA', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_monitor`
--

CREATE TABLE `form_monitor` (
  `Id` int(100) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `numero_serie` varchar(200) NOT NULL,
  `clave` varchar(200) DEFAULT NULL,
  `estado` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `tipo_pantalla` varchar(200) NOT NULL,
  `tamaño_pantalla` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `cedis` varchar(200) NOT NULL,
  `comentarios_observaciones` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 baja\r\n1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form_monitor`
--

INSERT INTO `form_monitor` (`Id`, `equipo`, `numero_serie`, `clave`, `estado`, `proceso`, `marca`, `modelo`, `tipo_pantalla`, `tamaño_pantalla`, `usuario`, `area`, `cedis`, `comentarios_observaciones`, `status`) VALUES
(1, 'MONITOR', '', '', '', '', '', '', '', '', 'julio sicardo', 'COMPRAS', 'Pachuca', '', 1),
(2, 'MONITOR', '', '', '', '', '', '', '', '', 'magdalena Paramo', 'COMPRAS', 'Pachuca', '', 1),
(3, 'MONITOR', '', '', '', '', '', '', '', '', 'Adriana Uribe', 'COMPRAS', 'Pachuca', '', 1),
(4, 'MONITOR', '', '', '', '', '', '', '', '', 'addiel Escudero', 'COMPRAS', 'Pachuca', '', 1),
(5, 'MONITOR', 'CNC9232F1X', 'PAMNCM02', '', '', 'HP', '', '', '', 'LUIS HERNAN MENDOZA', 'COMPRAS', 'Pachuca', '', 1),
(6, 'MONITOR', '', 'PAMNCM03', '', '', '', '', '', '', 'OMAR GONZALEZ', 'COMPRAS', 'Pachuca', '', 1),
(7, 'MONITOR', '', '', '', '', '', '', '', '', 'sin usuario', 'COMPRAS', 'Pachuca', '', 1),
(8, 'MONITOR', '', 'PAMNCC01', '', '', '', '', '', '', 'ver?nica Gallegos Lazcano', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(9, 'MONITOR', 'CN-0H9WTF-64180-36N-00ZM', 'PAMNCC02', '', '', 'DELL', 'E2213C', '', '', 'MARTHA', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(10, 'MONITOR', 'CN-0H9WTF-64180-36N-070M', 'PAMNCC03', '', '', 'DELL', 'E2213C', '', '', 'ARIANA AGUILAR AVILA', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(11, 'MONITOR', 'CN-0H9WTF-64180-36M-0915', 'PAMNCC04', '', '', 'DELL', 'E2213C', '', '', 'REYNA DOMINGUEZ HERNANDEZ', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(12, 'MONITOR', 'CN-0H9WTF-64180-34C-35ZS', 'PAMNCC05', '', '', 'DELL', 'E2213C', '', '', 'CAROLINA RAMIREZ', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(13, 'MONITOR', 'V3CC2253', 'PAMNCC06', '', '', 'LENOVO', 'C22-20', '', '', 'ELIZABETH', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(14, 'MONITOR', '6CM4092GQY', 'PAMNCC07', '', '', 'HP', 'P201', '', '', 'IRMA LECHUGA FRANCISCO', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(15, 'MONITOR', 'CN-0H9WTF-64180-36M-0ALS', 'PAMNCC08', '', '', 'DELL', 'E2213C', '', '', 'MAYELY MEJIA', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(16, 'MONITOR', 'V5CCY166', 'PAMNCC09', '', '', 'LENOVO', 'C22-20', '', '', 'VERONICA HERNANDEZ', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(17, 'MONITOR', 'CN-0H9WTF-64180-37V-185M', 'PAMNCC10', '', '', 'DELL', 'E2213C', '', '', 'DULCE HERNANDEZ', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(18, 'MONITOR', 'CN-0H9WTF-64180-36N-00WM', 'PAMNCC11', '', '', 'DELL', 'E2213C', '', '', 'KARLA ORTIZ', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(19, 'MONITOR', 'CN-0H9WTF-64180-33V-1CHM', 'PAMNCC12', '', '', 'DELL', 'E2213C', '', '', 'MAGDALENA DIAZ PEREZ', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(20, 'MONITOR', 'CN-0H9WTF-64180-35R-082M', 'PAMNCC13', '', '', 'DELL', 'E2213C', '', '', 'DANAHE VALENCIA', 'CREDITO Y COBRANZA', 'Pachuca', '', 1),
(21, 'MONITOR', '', 'PAMNPE01', '', '', '', '', '', '', 'silvia Edith Galvan guerrero', 'PRECIOS ESPECIALES', 'Pachuca', '', 1),
(22, 'MONITOR', '309NDNUAD911', 'PAMNRH01', '', '', 'LG', '19EN33S', '', '', 'ESTEFANY VEGA JACOME', 'RECURSOS HUMANOS', 'Pachuca', '', 1),
(23, 'MONITOR', 'YC60H9NB302047N', 'PAMNRE01', '', '', 'SAMSUNG', 'B1930N', '', '', 'MARIA GUADALUPE', 'ADMIN REFAS', 'Pachuca', '', 1),
(24, 'MONITOR', 'MMLY6AM0014350F6298504', 'PAMNSM01', '', '', 'ACER', 'V206HQL', '', '', 'doctora Mara', 'SERVICIO MEDICO', 'Pachuca', '', 1),
(25, 'MONITOR', 'ET8CE01966SL0', 'PAMNCO02', '', '', 'BENQ', 'DL2020-B', '', '', 'berenice Perez hernandez', 'CONTABILIDA', 'Pachuca', '', 1),
(26, 'MONITOR', 'CN-07XJH5-FCC00-8B6-AF3U-A05', 'PAMNCO03', '', '', 'DELL', 'E2016HV', '', '', 'erika salazar tolentino', 'CONTABILIDA', 'Pachuca', '', 1),
(27, 'MONITOR', 'CN-07XJH5-FCC00-8AI-A9FU-A04', 'PAMNCO04', '', '', 'DELL', 'E2016HV', '', '', 'faustino Ivan Rangel Cortes', 'CONTABILIDA', 'Pachuca', '', 1),
(28, 'MONITOR', 'CN-07XJH5-FCC00-8AI-A9DU-A04', 'PAMNCO05', '', '', 'DELL', 'E2016HV', '', '', 'irais Ramirez Garcia', 'CONTABILIDA', 'Pachuca', '', 1),
(29, 'MONITOR', '', 'PAMNAU01', '', '', '', '', '', '', 'FELIPE GARCIA QUIROZ', 'AUDITORIA', 'Pachuca', '', 1),
(30, 'MONITOR', 'CN02XG66FCC001BGCHPI', 'PAMNTL02', '', '', 'DELL', '22PLGE2221HN', '', '', 'SELENE DE LOS ANGELES MARTINEZ PEREZ', 'TELEMARKETING', 'Pachuca', '', 1),
(31, 'MONITOR', 'CN02XG66FCC001BGC1MI', 'PAMNTL03', '', '', 'DELL', '22PLGE2221HN', '', '', 'ESBEIDY MENDOZA FLORES', 'TELEMARKETING', 'Pachuca', '', 1),
(32, 'MONITOR', 'CN02XG66FCC001BGC23I', 'PAMNTL04', '', '', 'DELL', '22PLGE2221HN', '', '', 'JOSUE FRANCISCO RODRIGUEZ PE?A', 'TELEMARKETING', 'Pachuca', '', 1),
(33, 'MONITOR', 'CN02XG66FCC001BGC4HI', 'PAMNTL05', '', '', 'DELL', '22PLGE2221HN', '', '', 'ADRIAN BARREIRO ALVAREZ', 'TELEMARKETING', 'Pachuca', '', 1),
(34, 'MONITOR', 'CNC9251SN5', 'PAMNTL06', '', '', 'HP', 'V214A', '', '', 'ALAN MEJIA DE JESUS ', 'TELEMARKETING', 'Pachuca', '', 1),
(35, 'MONITOR', '', 'PAMNTL07', '', '', '', '', '', '', 'LAURA FERNANDEZ SANCHEZ CABRERA', 'TELEMARKETING', 'Pachuca', '', 1),
(36, 'MONITOR', 'PU19H9FZ704561K', 'PAMNTL30', '', '', 'SAMSUNG', 'B1930N', '', '', 'SIN USUARIO.', 'TELEMARKETING', 'Pachuca', '', 1),
(37, 'MONITOR', 'CNC9251SNS', 'PAMNTL08', '', '', 'HP', '214A', '', '', 'ENRIQUE CORTES CAMPERO', 'TELEMARKETING', 'Pachuca', '', 1),
(38, 'MONITOR', '', 'PAMNTL08', '', '', '', '', '', '', '', 'TELEMARKETING', 'Pachuca', '', 1),
(39, 'MONITOR', 'CM19H9FSC014430', 'PAMNTL09', '', '', 'SAMSUNG', '933SNPLUS', '', '', 'SIN USUARIO', 'TELEMARKETING', 'Pachuca', '', 1),
(40, 'MONITOR', '3CQ93202LZ', 'PAMNTL11', '', '', 'HP', 'P204V', '', '', 'SIN USUARIO', 'TELEMARKETING', 'Pachuca', '', 1),
(41, 'MONITOR', 'CN-0N5P3K-TV200-78Q-0MXU-A01', 'PAMNTL10', '', '', 'DELL', 'P2018H', '', '', 'RIGOBERTO HERNANDEZ HIDALGO', 'TELEMARKETING', 'Pachuca', '', 1),
(42, 'MONITOR', 'V9-02ND1X', 'PAMNTL12', '', '', 'LENOVO', 'T2224PD', '', '', 'HUGO CARPIO ROMERO', 'TELEMARKETING', 'Pachuca', '', 1),
(43, 'MONITOR', 'CN-02XG66-FCC00-1BG-AD1I-A04', 'PAMNTL31', '', '', 'DELL', 'E2221HN', '', '', 'EDWIN ENRIQUE LOPEZ CRUZ', 'TELEMARKETING', 'Pachuca', '', 1),
(44, 'MONITOR', 'CN-0N5P3K-TV200-783-25VU-A01', 'PAMNTL13', '', '', 'DELL', 'P2018H', '', '', 'GUADALUPE SANCHEZ RUIZ', 'TELEMARKETING', 'Pachuca', '', 1),
(45, 'MONITOR', 'V9-02ND2K', 'PAMNTL14', '', '', 'LENOVO', 'T2224PD', '', '', 'ALIS ARELY QUEZADA GOMEZ', 'TELEMARKETING', 'Pachuca', '', 1),
(46, 'MONITOR', 'MMLY6AM00153811B7B8504', 'PAMNTL15', '', '', 'ACER', 'V206HQL', '', '', 'SIN USUARIO', 'TELEMARKETING', 'Pachuca', '', 1),
(47, 'MONITOR', 'CNC92251SL8', 'PAMNTL16', '', '', 'HP', 'V214A', '', '', 'NAHOMY KAREL CAMACHO LOPEZ', 'TELEMARKETING', 'Pachuca', '', 1),
(48, 'MONITOR', 'ZTVCH9LBC17457P', 'PAMNTL17', '', '', 'SAMSUNG', 'S19A100N', '', '', 'CARLOS ROMERO TORRES', 'TELEMARKETING', 'Pachuca', '', 1),
(49, 'MONITOR', 'CN-0N5P3K-TV200-78Q-1NAU-A01', 'PAMNTL18', '', '', 'DELL', 'P2018H', '', '', 'JUAN CARLOS ISLAS VEGA', 'TELEMARKETING', 'Pachuca', '', 1),
(50, 'MONITOR', 'V9-02F8NZ', 'PAMNTL19', '', '', 'LENOVO', 'T2224PD', '', '', 'SIN USUARIO', 'TELEMARKETING', 'Pachuca', '', 1),
(51, 'MONITOR', '', '', '', '', '', '', '', '', 'JOSUE FRANCISCO RODRIGUEZ PE?A', 'TELEMARKETING', 'Pachuca', '', 1),
(52, 'MONITOR', 'CN-0N5P3K-TV200-794-2FJU-A01', 'PAMNTL20', '', '', 'DELL', 'P2018H', '', '', 'SIN USUARIO', 'TELEMARKETING', 'Pachuca', '', 1),
(53, 'MONITOR', 'CN-0N5P3K-TV200-78S-1KNU-A01', 'PAMNTL21', '', '', 'DELL', 'P2018H', '', '', 'SERGIO MElGOZA ANGELES', 'TELEMARKETING', 'Pachuca', '', 1),
(54, 'MONITOR', 'V9-02ND24', 'PAMNTL22', '', '', 'LENOVO', 'T2224PD', '', '', 'ANTHONY MORENO HURTADO', 'TELEMARKETING', 'Pachuca', '', 1),
(55, 'MONITOR', '3CQ93628MN', 'PAMNTL23', '', '', 'HPV194', '', '', '', 'STHEPHANY ANARSABETH VAZQUEZ RODRIGUEZ', 'TELEMARKETING', 'Pachuca', '', 1),
(56, 'MONITOR', 'ETLPL0W001211012E34300', 'PAMNTL32', '', '', 'ACER', 'G185HV', '', '', '', 'TELEMARKETING', 'Pachuca', '', 1),
(57, 'MONITOR', 'CNC9251SPG', 'PAMNTL24', '', '', 'HP', 'V214A', '', '', 'ADRIAN ALEJANDRO SANCHEZ GARNICA', 'TELEMARKETING', 'Pachuca', '', 1),
(58, 'MONITOR', 'CN-0N5P3K-TV200-78Q-40KU-A01', 'PAMNTL25', '', '', 'DELL', 'P2018H', '', '', 'JESUS RAMIREZ GARCIA', 'TELEMARKETING', 'Pachuca', '', 1),
(59, 'MONITOR', '403NDRFJS182', 'PAMNTL26', '', '', 'LG', '19M35A', '', '', 'LUIS ANTONIO MARTINEZ HERNANDEZ', 'TELEMARKETING', 'Pachuca', '', 1),
(60, 'MONITOR', 'V5G24771', 'PAMNTL27', '', '', 'LENOVO', 'T2224PD', '', '', 'EDUARDO ALEJO GONZALEZ', 'TELEMARKETING', 'Pachuca', '', 1),
(61, 'MONITOR', '', '', '', '', '', '', '', '', '', 'TELEMARKETING', 'Pachuca', '', 1),
(62, 'MONITOR', 'CM19H9FSC39377E', 'PAMNTL28', '', '', 'SAMSUNG', 'LS19CMYKFNAUZX', '', '', 'OSCAR ARAU CAMPOS', 'TELEMARKETING', 'Pachuca', '', 1),
(63, 'MONITOR', '5080MK3', 'PAMNTL29', '', '', 'DELL', 'E2221HN', '', '', 'STHEPHANY VARGAS PINTO DE LE?N ', 'TELEMARKETING', 'Pachuca', '', 1),
(64, 'MONITOR', '', 'OXMNVT01', '', '', '', '', '', '', 'VENTAS 1', 'OAXACA', 'Pachuca', '', 1),
(65, 'MONITOR', '', 'OXMNAL01', '', '', '', '', '', '', 'JEFE DE MESAS', 'OAXACA', 'Pachuca', '', 1),
(66, 'MONITOR', '6CM4030WY2', 'PAMNFI01', '', '', 'HP', 'P201', '', '', 'NAYELI BAUTISTA', 'FINANZAS', 'Pachuca', '', 1),
(67, 'MONITOR', 'YC67H9LB504083T', 'PAMNFI02', '', '', 'SAMSUNG', 'B2030N', '', '', 'GLORIA BARRERA', 'FINANZAS', 'Pachuca', '', 1),
(68, 'MONITOR', 'MMLY6AM001541065218504', 'PAMNFI03', '', '', 'ACER', 'V206HQL', '', '', 'MARIA DE JESUS SANTANDER', 'FINANZAS', 'Pachuca', '', 1),
(69, 'MONITOR', 'MMLY6AM0015200F1D38504', 'PAMNFI04', '', '', 'ACER', 'V206HQL', '', '', 'Sandra martinez ramirez', 'FINANZAS', 'Pachuca', '', 1),
(70, 'MONITOR', 'ETLRD08008108046694221', 'PAMNFI05', '', '', 'ACER', 'V193WV', '', '', 'ADRIANA AGUIRRE', 'FINANZAS', 'Pachuca', '', 1),
(71, 'MONITOR', '', '', '', '', '', '', '', '', 'Felipe Garcia quieroz ', 'AUDITORIA', 'Pachuca', '', 1),
(72, 'MONITOR', '309NDBPAC525', 'PAMNVT13', '', '', 'LG', 'FLATRON', '', '', 'PROMOTORES', 'VENTAS', 'Pachuca', '', 1),
(73, 'MONITOR', '', 'PAMNCD04', '', '', '', '', '', '', 'ANDREA RAMOS', 'ADMINISTRACION CEDIS', 'Pachuca', '', 1),
(74, 'MONITOR', 'ETR7E01590019', 'PAMNCD03', '', '', 'BENQ', 'GL950-TA', '', '', 'JESSICA MEJIA', 'ADMINISTRACION CEDIS', 'Pachuca', '', 1),
(75, 'MONITOR', 'MMLY6AM0014240E1FE8504', 'PAMNCD02', '', '', 'ACER', 'V206HQL', '', '', 'ZULEIMA VALENCIANA', 'ADMINISTRACION CEDIS', 'Pachuca', '', 1),
(76, 'MONITOR', 'ETLNT080021500C0784224', 'PAMNCD01', '', '', 'ACER', 'G185HV', '', '', 'DARIANN TORRES', 'ADMINISTRACION CEDIS', 'Pachuca', '', 1),
(77, 'MONITOR', '', '', '', '', '', '', '', '', 'aveces mo retiene la carga ', 'MERCADOTECNIA', 'Pachuca', '', 1),
(78, 'MONITOR', '', 'PAMNME01', '', '', '', '', '', '', 'MARISOL GAMERO', 'MERCADOTECNIA', 'Pachuca', '', 1),
(79, 'MONITOR', 'CNC3132CW0', 'PAMNME02', '', '', 'HP', 'P27G5FHD', '', '', 'YANETH MERCHAIN DE LA ROSA', 'MERCADOTECNIA', 'Pachuca', '', 1),
(80, 'MONITOR', '', 'PAMNVI01', '', '', '', '', '', '', '', 'VIGILANCIA', 'Pachuca', '', 1),
(81, 'MONITOR', '', '', '', '', '', '', '', '', '', 'RECIBO DE MERCANCIAS', 'Pachuca', '', 1),
(82, 'MONITOR', '', '', '', '', '', '', '', '', '', 'RECIBO DE MERCANCIAS', 'Pachuca', '', 1),
(83, 'MONITOR', '', '', '', '', '', '', '', '', '', '', 'Pachuca', '', 1),
(84, 'MONITOR', '', 'PAMNDE01', '', '', '', '', '', '', 'Diana  olmedo Islas', 'DEVOLUCIONES', 'Pachuca', '', 1),
(85, 'MONITOR', '', 'PAMNDE04', '', '', '', '', '', '', 'lector de cb 3nstar sc310bt', 'DEVOLUCIONES', 'Pachuca', '', 1),
(86, 'MONITOR', '', 'PAMNDE05 ANT.', '', '', '', '', '', '', '', 'DEVOLUCIONES', 'Pachuca', '', 1),
(87, 'MONITOR', '', 'PAMNDE05', '', '', '', '', '', '', '', 'DEVOLUCIONES', 'Pachuca', '', 1),
(88, 'MONITOR', '3CQ224084C', 'PAMNDE02', '', '', 'HP', 'P204V', '', '', 'Yuli', 'DEVOLUCIONES', 'Pachuca', '', 1),
(89, 'MONITOR', '3CQ224084G', 'PAMNDE03', '', '', 'HP', 'P204V', '', '', 'nueva', 'DEVOLUCIONES', 'Pachuca', '', 1),
(90, 'MONITOR', '3B8DWK2', 'PAMNEM01', '', '', 'LENOVO', 'P2018H', '', '', 'MARIANA CRUZ HERNANDEZ', 'EMBARQUES', 'Pachuca', '', 1),
(91, 'MONITOR', '310NDX05T01B', 'PAMNEM02', '', '', 'LG', 'FLATRON 20EN33SS-B', '', '', 'MARIA MARITZA URIBE MORALES', 'EMBARQUES', 'Pachuca', '', 1),
(92, 'MONITOR', 'MMLY6AM0014350F10A8504', 'PAMNEM03', '', '', 'HACER', 'V206HQL', '', '', 'AVILA TREJO TOMAS ALFREDO', 'EMBARQUES', 'Pachuca', '', 1),
(93, 'MONITOR', '307NDXQLX954', 'PAMNEM04', '', '', 'FLATRON', '19EN33S', '', '', 'RUBI ESMERALDA RODRIGUEZ ANDRADE', 'EMBARQUES', 'Pachuca', '', 1),
(94, 'MONITOR', 'CN-OH9WTF-64180-36M-02SS', 'PAMNEM05', '', '', 'DELL', 'E2213C', '', '', 'ALFREDO ORTIZ CONTRERAS', 'EMBARQUES', 'Pachuca', '', 1),
(95, 'MONITOR', '307NDFVLV675', 'PAMNEM06', '', '', 'LG', 'FLATRON 19EN33S', '', '', 'MIGUEL ROBERTO HERNANDE CHAVEZ', 'EMBARQUES', 'Pachuca', '', 1),
(96, 'MONITOR', '', '', '', '', '', '', '', '', 'GADDIEL', 'EMBARQUES', 'Pachuca', '', 1),
(97, 'MONITOR', '', '', '', '', '', '', '', '', 'rub? Esmeralda Rodriguez', 'EMBARQUES', 'Pachuca', '', 1),
(98, 'MONITOR', '', 'PAMNAL02', '', '', '', '', '', '', 'MESA 2', 'MESAS ALMACEN', 'Pachuca', '', 1),
(99, 'MONITOR', '', 'PAMNAL01', '', '', '', '', '', '', 'MESA 1', 'MESAS ALMACEN', 'Pachuca', '', 1),
(100, 'MONITOR', '', 'PAMNAL03', '', '', '', '', '', '', 'MESA 3', 'MESAS ALMACEN', 'Pachuca', '', 1),
(101, 'MONITOR', '', 'PAMNAL04', '', '', '', '', '', '', 'MESA 4', 'MESAS ALMACEN', 'Pachuca', '', 1),
(102, 'MONITOR', '', 'PAMNAL05', '', '', '', '', '', '', 'MESA 5', 'MESAS ALMACEN', 'Pachuca', '', 1),
(103, 'MONITOR', '', 'PAMNAL06', '', '', '', '', '', '', 'MESA 6', 'MESAS ALMACEN', 'Pachuca', '', 1),
(104, 'MONITOR', '', 'PAMNAL07', '', '', '', '', '', '', 'MESA 7', 'MESAS ALMACEN', 'Pachuca', '', 1),
(105, 'MONITOR', '', 'PAMNAL08', '', '', '', '', '', '', 'MESA 8', 'MESAS ALMACEN', 'Pachuca', '', 1),
(106, 'MONITOR', '', 'PAMNAL09', '', '', '', '', '', '', 'LAURA', 'PICKING', 'Pachuca', '', 1),
(107, 'MONITOR', '6CM42606HY', 'PAMNSC01', '', '', 'HP', 'P201', '', '', 'MESA1', 'SURTIDO CEDIS', 'Pachuca', '', 1),
(108, 'MONITOR', '307ND0FLX958', 'PAMNSC02', '', '', 'LG', 'FLATRON 19EN33S', '', '', 'MESA2', 'SURTIDO CEDIS', 'Pachuca', '', 1),
(109, 'MONITOR', 'CM19H9FSC14746X', 'PAMNSC03', '', '', 'SAMSUNG', '933SNPLUS', '', '', 'MESA3', 'SURTIDO CEDIS', 'Pachuca', '', 1),
(110, 'MONITOR', '404NDCR2E011', 'PAMNSC04', '', '', 'LG', '19M35A-B', '', '', 'MESA 4', 'SURTIDO CEDIS', 'Pachuca', '', 1),
(111, 'MONITOR', 'HA17HVGQ606642Z', 'PAMNSC05', '', '', 'SAMSUNG', '740NW', '', '', 'MESA 5', 'SURTIDO CEDIS', 'Pachuca', '', 1),
(112, 'MONITOR', 'ETLPC0D001208007C08508', 'PAMNSC06', '', '', 'HACER', 'G185MN', '', '', 'MESA6', 'SURTIDO CEDIS', 'Pachuca', '', 1),
(113, 'MONITOR', '6CM4011ZBS', 'PAMNSC07', '', '', 'HP', 'P201', '', '', 'VICTOR HERNANDEZ GONZALEZ', 'SURTIDO CEDIS', 'Pachuca', '', 1),
(114, 'MONITOR', '302NDBPGQ733', 'PAMNSC08', '', '', 'LG', 'MOD.19EN33S', '', '', 'NANCY KARINA REYES VALENCIA', 'SURTIDO CEDIS', 'Pachuca', '', 1),
(115, 'MONITOR', '', '', '', '', '', '', '', '', 'Arturo almac?n ', 'ALMACEN AL FONDO', 'Pachuca', '', 1),
(116, 'MONITOR', '', 'NA', '', '', '', '', '', '', 'MESA 6', 'EQUIPO EN PRESTAMO', 'Pachuca', '', 1),
(117, 'MONITOR', 'NA', 'PAMNMI01', '', '', 'NO', 'TIENE', '', '', 'SERVIDOR MYB MINERO', 'REFA MINERO', 'Pachuca', '', 1),
(118, 'MONITOR', 'D6YN6H3', 'PAMNMI02', '', '', 'DELL', 'E2222H', '', '', 'MOSTRADOR 1 MINERO', 'REFA MINERO', 'Pachuca', '', 1),
(119, 'MONITOR', 'F9YN6H3', 'PAMNMI03', '', '', 'DELL', 'E2222H', '', '', 'MOSTRADOR 2 MINERO', 'REFA MINERO', 'Pachuca', '', 1),
(120, 'MONITOR', '', '', '', '', '', '', '', '', 'FACTURACION', 'REFA MINERO', 'Pachuca', '', 1),
(121, 'MONITOR', 'NA', 'PAMNAC01', '', '', 'NO', 'TIENE', '', '', 'SERVIDOR MYB ACTOPAN', 'REFA ACTOPAN', 'Actopan', '', 1),
(122, 'MONITOR', 'BVZNWQ3', 'PAMNAC02', '', '', 'DELL', 'E2222H', '', '', 'MOSTRADOR 1 ACTOPAN', 'REFA ACTOPAN', 'Actopan', '', 1),
(123, 'MONITOR', 'CQFXLK3', 'PAMNAC03', '', '', 'DELL', 'E2222H', '', '', 'MOSTRADOR 2 ACTOPAN', 'REFA ACTOPAN', 'Actopan', '', 1),
(124, 'MONITOR', 'VNA31GG6', 'PAMNAC04', '', '', 'LENOVO', 'T2054pC', '', '', 'FACTURACION ACTOPAN', 'REFA ACTOPAN', 'Actopan', '', 1),
(125, 'MONITOR', '', '', '', '', '', '', '', '', '', 'REFA ACTOPAN', 'Actopan', '', 1),
(126, 'MONITOR', 'NA', 'PAMNTU01', '', '', 'NO', 'TIENE', '', '', 'SERVIDOR MYB TULANCINGO', 'REFA TULANCINGO', 'Tulancingo', '', 1),
(127, 'MONITOR', '962B2Q3', 'PAMNTU02', '', '', 'DELL', 'E2222H', '', '', 'MOSTRADOR 1 TULANCINGO', 'REFA TULANCINGO', 'Tulancingo', '', 1),
(128, 'MONITOR', '8ZQ82Q3', 'PAMNTU03', '', '', 'DELL', 'E2222H', '', '', 'MOSTRADOR 2 TULANCINGO', 'REFA TULANCINGO', 'Tulancingo', '', 1),
(129, 'MONITOR', '', 'PAMNTU04', '', '', '', '', '', '', 'FACTURACION TULANCINGO', 'REFA TULANCINGO', 'Tulancingo', '', 1),
(130, 'MONITOR', '', 'SL-MN00001', '', '', '', '', '', '', '', 'SAN LUIS POTOSI', 'San Luis Potosi', '', 1),
(131, 'MONITOR', '', 'SL-MN00002', '', '', '', '', '', '', '', 'SAN LUIS POTOSI', 'San Luis Potosi', '', 1),
(132, 'MONITOR', '', 'SL-MN00003', '', '', '', '', '', '', '', 'SAN LUIS POTOSI', 'San Luis Potosi', '', 1),
(133, 'MONITOR', '', 'SL-MN00004', '', '', '', '', '', '', '', 'SAN LUIS POTOSI', 'San Luis Potosi', '', 1),
(134, 'MONITOR', '', 'SL-MN00005', '', '', '', '', '', '', '', 'SAN LUIS POTOSI', 'San Luis Potosi', '', 1),
(135, 'MONITOR', '', 'SL-MN00006', '', '', '', '', '', '', '', 'SAN LUIS POTOSI', 'San Luis Potosi', '', 1),
(136, 'MONITOR', '', 'CHMNGT01', '', '', '', '', '', '', 'GERENTE CEDIS', 'CHIHUAHUA', 'Chihuahua', '', 1),
(137, 'MONITOR', '', 'CHMNCD02', '', '', '', '', '', '', 'PIBOTE', 'CHIHUAHUA', 'Chihuahua', '', 1),
(138, 'MONITOR', '', 'CHMNCD03', '', '', '', '', '', '', 'ACTUAL FACTURACION, CARLOS URRUETA ALMEIDA', 'CHIHUAHUA', 'Chihuahua', '', 1),
(139, 'MONITOR', '', 'CHMNCD04', '', '', '', '', '', '', 'ALMACEN, ENCARGADO ALEXANDER QUINTANA', 'CHIHUAHUA', 'Chihuahua', '', 1),
(140, 'MONITOR', '', '', '', '', '', '', '', '', 'ALMACEN, MESA', 'CHIHUAHUA', 'Chihuahua', '', 1),
(141, 'MONITOR', '', 'ME-MN00001', '', '', '', '', '', '', '', '', '', '', 1),
(142, 'MONITOR', 'CN42122MD3', 'VHMNGC01', '', '', '', '', '', '', 'GERENTE CEDIS', 'VILLAHERMOSA', 'Villahermosa', '', 1),
(143, 'MONITOR', '3CM235130W', 'MTMNCD01', '', '', 'HP', 'P24 G4 23.8PLG', '', '', 'GERENTE CARLOS ALBERTO CABRERA PINEDA', 'MONTERREY', 'Monterrey', '', 1),
(144, 'MONITOR', '', 'MTMNCD02', '', '', 'HP', 'P24 G4 23.8PLG', '', '', 'LIDER DE ALMACEN - JESSICA BERENICE DORIA URBINA', 'MONTERREY', 'Monterrey', '', 1),
(145, 'MONITOR', '', 'MTMNCD03', '', '', '', '', '', '', 'FACTURACION-VANESA DURAN', 'MONTERREY', 'Monterrey', '', 1),
(146, 'MONITOR', '', '', '', '', '', '', '', '', '', 'PUEBLA', 'Puebla', '', 1),
(147, 'MONITOR', '', 'LEMNTL01', '', '', '', '', '', '', 'TELEMARKETING, CRISTIAN GIOVANY MOERNO', 'LEON', 'Leon', '', 1),
(148, 'MONITOR', '', '', '', '', '', '', '', '', 'TELEMARKETING, CRISTIAN ANTONIO NEGRETE', 'LEON', 'Leon', '', 1),
(149, 'MONITOR', '', '', '', '', '', '', '', '', 'JEFE MESA 1', 'LEON', 'Leon', '', 1),
(150, 'MONITOR', '', '', '', '', '', '', '', '', 'JEFE DE RECIBO', 'LEON', 'Leon', '', 1),
(151, 'MONITOR', '', '', '', '', '', '', '', '', 'JEFE DE PISO 2, GUILLERMO', 'LEON', 'Leon', '', 1),
(152, 'MONITOR', '', '', '', '', '', '', '', '', 'LIDER DE ALMACEN, HORACIO SALVADOR', 'LEON', 'Leon', '', 1),
(153, 'MONITOR', '', '', '', '', '', '', '', '', 'FACTURACION', 'LEON', 'Leon', '', 1),
(154, 'MONITOR', '', '', '', '', '', '', '', '', 'GERENTE', 'LEON', 'Leon', '', 1),
(155, 'MONITOR', '', 'TGMNCD02', '', '', '', '', '', '', 'FACTURACION', 'TUXTLA', 'Tuxtla', '', 1),
(156, 'MONITOR', '', 'QRMNCD01', '', '', '', '', '', '', 'JEFE ALMACEN CARLOS', 'QUERETARO', 'Queretaro', '', 1),
(157, 'MONITOR', '', 'HRMNCD01', '', '', '', '', '', '', '', 'HERMOSILLO', 'Hermosillo', '', 1),
(158, 'MONITOR', '', 'CAMNCD01', '', '', '', '', '', '', 'DANIEL DE JESUS  MARTINEZ PEREZ', 'CANCUN', 'Cancun', '', 1),
(159, 'MONITOR', '', 'CAMNCD02', '', '', '', '', '', '', 'KIMBERLY GUADALUPE ZU?IGA MORALES', 'CANCUN', 'Cancun', '', 1),
(160, '', '0ACKHCPTB01304', 'PAMNTL01', '', '', 'SAMSUNG', 'CF390', 'MONITIR CURVO', '24PG', '', 'TELEMARKETING', '', '', 1),
(161, '', 'ZT16H9NB802443W', 'PAMNAC01', '', '', 'SAMSUNG', 'S19A10N', 'MONITOR ', '18.5 PULGADAS VGA', '', 'CENTRO DE ATENCION AL CLIENTE', '', '', 1),
(162, '', '0ACKHCPTB01308P', 'PAMNVT02', '', '', 'SAMSUNG', 'C24F390FH', 'MONITOR CURVO', '24PLG', '', 'VENTAS', '', '', 1),
(163, '', 'MMLY6AM001541065198504', '', '', '', 'HACER', 'V206HQL', '', '', '', 'VIGILANCIA', '', '', 1),
(164, '', '', '', '', '', 'SAMSUNG', '', '', '', '', 'SISTEMAS', '', '', 1),
(165, '', '', '', '', '', 'SAMSUNG', '', '', '', '', 'SISTEMAS', '', '', 1),
(166, '', '', '', '', '', 'SAMSUNG', '', '', '', '', 'SISTEMAS', '', '', 1),
(167, '', '', '', '', '', 'SAMSUNG', '', '', '', '', 'SISTEMAS', '', '', 1),
(168, '', '', '', '', '', 'HP', '', '', '', '', 'SISTEMAS', '', '', 1),
(169, '', '3CQ21018WF', '', '', '', 'HP', 'P204V', '', '', '', 'SAN LUIS POTOSI', '', '', 1),
(170, '', '3CQ2080LLT', '', '', '', 'HP', 'P204V', '', '', '', 'SAN LUIS POTOSI', '', '', 1),
(171, '', '3CQ2140N28', '', '', '', 'HP', 'P204V', '', '', '', 'SAN LUIS POTOSI', '', '', 1),
(172, '', '3CQ2080LMQ', '', '', '', 'HP', 'P204V', '', '', '', 'SAN LUIS POTOSI', '', '', 1),
(173, '', '3CQ2080LLN', '', '', '', 'HP', 'P204V', '', '', '', 'SAN LUIS POTOSI', '', '', 1),
(174, '', '3CQ2080LM2', '', '', '', 'HP', 'P204V', '', '', '', 'SAN LUIS POTOSI', '', '', 1),
(175, '', '3FDRLK3', 'CVMNFA01', '', '', 'DELL', 'E2223HV', 'MONITOR', '22 PLG', '', 'CUERNAVACA', '', '', 1),
(176, '', 'CN42013PDR', '', '', '', 'HP', 'P22VA G4', '', '', '', 'MERIDA', '', '', 1),
(177, '', '3CQ2130NFH', '', '', '', 'HP', 'P204V', '', '', '', 'MERIDA', '', '', 1),
(180, 'Equipo', 'Numero de Serie', 'Clave', 'Estado', 'Procedimiento', 'Marca', 'Modelo', 'Tipo de Pantalla', 'Tama?o de Pantalla (pulgadas)', 'Usuario', 'Area', 'Cedis', 'Comentarios y Observaciones', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_nobreak`
--

CREATE TABLE `form_nobreak` (
  `Id` int(100) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `numero_serie` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `cedis` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `comentarios_observaciones` varchar(200) NOT NULL,
  `status` int(100) NOT NULL COMMENT '0 baja\r\n1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form_nobreak`
--

INSERT INTO `form_nobreak` (`Id`, `equipo`, `numero_serie`, `clave`, `estado`, `proceso`, `marca`, `modelo`, `cedis`, `usuario`, `area`, `comentarios_observaciones`, `status`) VALUES
(1, 'NOBREAK', '', '', 'Bueno', 'Mantenimiento', '', 'isb nbks1000', 'PACHUCA', 'julio sicardo', 'COMPRAS', 'Sin comentarios', 1),
(2, 'NOBREAK', 'E19B9445', '', '', '', '', 'nbks1000', 'PACHUCA', 'magdalena Paramo', 'COMPRAS', '', 1),
(3, 'NOBREAK', '', '', '', '', '', 'nbks1000', 'PACHUCA', 'Adriana Uribe', 'COMPRAS', '', 1),
(4, 'NOBREAK', 'E20A5113', '', '', '', '', 'nbks100', 'PACHUCA', 'addiel Escudero', 'COMPRAS', '', 1),
(5, 'NOBREAK', 'E19B9356', 'PANBCM02', '', '', '', 'NBKS1000', 'PACHUCA', 'LUIS HERNAN MENDOZA', 'COMPRAS', '', 1),
(6, 'NOBREAK', 'E19B9357', 'PANBCM03', '', '', '', 'nbks1000', 'PACHUCA', 'OMAR GONZALEZ', 'COMPRAS', '', 1),
(7, 'NOBREAK', '', '', '', '', '', 'cdp sin modelo', 'PACHUCA', 'sin usuario', 'COMPRAS', '', 1),
(8, 'NOBREAK', '320527BU30004077', 'PANBCC01', '', '', '', 'UT750GU', 'PACHUCA', 'ver?nica Gallegos Lazcano', 'CREDITO Y COBRANZA', '', 1),
(9, 'NOBREAK', 'NA', 'PANBCC02', '', '', '', 'FORZA NT-511', 'PACHUCA', 'MARTHA', 'CREDITO Y COBRANZA', '', 1),
(10, 'NOBREAK', '', 'PANBCC03', '', '', '', 'NO ', 'PACHUCA', 'ARIANA AGUILAR AVILA', 'CREDITO Y COBRANZA', '', 1),
(11, 'NOBREAK', 'E19K9466', 'PANBCC04', '', '', '', 'NBKS1000', 'PACHUCA', 'REYNA DOMINGUEZ HERNANDEZ', 'CREDITO Y COBRANZA', '', 1),
(12, 'NOBREAK', 'E19K9145', 'PANBCC05', '', '', '', 'NBKS1000', 'PACHUCA', 'CAROLINA RAMIREZ', 'CREDITO Y COBRANZA', '', 1),
(13, 'NOBREAK', 'E20G2637', 'PANBCC06', '', '', '', 'nbks1000', 'PACHUCA', 'ELIZABETH', 'CREDITO Y COBRANZA', '', 1),
(14, 'NOBREAK', '320527BT30001240', 'PANBCC07', '', '', '', 'UT750GU', 'PACHUCA', 'IRMA LECHUGA FRANCISCO', 'CREDITO Y COBRANZA', '', 1),
(15, 'NOBREAK', 'E18J22931', 'PANBCC08', '', '', '', 'NBKS1000', 'PACHUCA', 'MAYELY MEJIA', 'CREDITO Y COBRANZA', '', 1),
(16, 'NOBREAK', 'E18J22925', 'PANBCC09', '', '', '', 'nbks1000', 'PACHUCA', 'VERONICA HERNANDEZ', 'CREDITO Y COBRANZA', '', 1),
(17, 'NOBREAK', 'E18J22502', 'PANBCC10', '', '', '', 'NBKS1000', 'PACHUCA', 'DULCE HERNANDEZ', 'CREDITO Y COBRANZA', '', 1),
(18, 'NOBREAK', '320527BU30004080', 'PANBCC11', '', '', '', 'UT750GU', 'PACHUCA', 'KARLA ORTIZ', 'CREDITO Y COBRANZA', '', 1),
(19, 'NOBREAK', '320527BT30001238', 'PANBCC12', '', '', '', 'UT750GU', 'PACHUCA', 'MAGDALENA DIAZ PEREZ', 'CREDITO Y COBRANZA', '', 1),
(20, 'NOBREAK', 'E18K11850', 'PANBCC13', '', '', '', 'NBKS1000', 'PACHUCA', 'DANAHE VALENCIA', 'CREDITO Y COBRANZA', '', 1),
(21, 'NOBREAK', 'E22L01327', 'PANBPE01', '', '', '', 'NBKS1000', 'PACHUCA', 'silvia Edith Galvan guerrero', 'PRECIOS ESPECIALES', '', 1),
(22, 'NOBREAK', 'E19K9421', 'PANBRH01', '', '', '', 'nbks1000', 'PACHUCA', 'ESTEFANY VEGA JACOME', 'RECURSOS HUMANOS', '', 1),
(23, 'NOBREAK', 'E19L6717', 'PANBRE01', '', '', '', 'NBKS1000', 'PACHUCA', 'MARIA GUADALUPE', 'ADMIN REFAS', '', 1),
(24, 'NOBREAK', '1.70513E+11', 'PANBSM01', '', '', '', 'forza nt-511', 'PACHUCA', 'doctora Mara', 'SERVICIO MEDICO', '', 1),
(25, 'NOBREAK', 'E19L6614', 'PANBCO02', '', '', '', 'nbks1000', 'PACHUCA', 'berenice Perez hernandez', 'CONTABILIDA', '', 1),
(26, 'NOBREAK', 'E19L6613', 'PANBCO03', '', '', '', 'nbks1000', 'PACHUCA', 'erika salazar tolentino', 'CONTABILIDA', '', 1),
(27, 'NOBREAK', 'E21D3416', 'PANBCO04', '', '', '', 'nbks1000', 'PACHUCA', 'faustino Ivan Rangel Cortes', 'CONTABILIDA', '', 1),
(28, 'NOBREAK', 'E19L6726', 'PANBCO05', '', '', '', 'nbks1000', 'PACHUCA', 'irais Ramirez Garcia', 'CONTABILIDA', '', 1),
(29, 'NOBREAK', '', 'PANBAU01', '', '', '', 'no tiene', 'PACHUCA', 'FELIPE GARCIA QUIROZ', 'AUDITORIA', '', 1),
(30, 'NOBREAK', 'E22H01112', 'PANBTL02', '', '', '', 'NBKS1000', 'PACHUCA', 'SELENE DE LOS ANGELES MARTINEZ PEREZ', 'TELEMARKETING', '', 1),
(31, 'NOBREAK', 'E22H01105', 'PANBTL03', '', '', '', 'NBKS1000', 'PACHUCA', 'ESBEIDY MENDOZA FLORES', 'TELEMARKETING', '', 1),
(32, 'NOBREAK', 'E22H01117', 'PANBTL04', '', '', '', 'NBKS1000', 'PACHUCA', 'JOSUE FRANCISCO RODRIGUEZ PE?A', 'TELEMARKETING', '', 1),
(33, 'NOBREAK', 'E22H00003', 'PANBTL05', '', '', '', 'NBKS1000', 'PACHUCA', 'ADRIAN BARREIRO ALVAREZ', 'TELEMARKETING', '', 1),
(34, 'NOBREAK', 'E19G13868', 'PANBTL06', '', '', '', 'NBKS1000', 'PACHUCA', 'ALAN MEJIA DE JESUS ', 'TELEMARKETING', '', 1),
(35, 'NOBREAK', '320526BQ30006077', 'PANBTL07', '', '', '', 'UT750GU', 'PACHUCA', 'LAURA FERNANDEZ SANCHEZ CABRERA', 'TELEMARKETING', '', 1),
(36, 'NOBREAK', '1.70513E+11', 'PANBTL30', '', '', '', 'FORZA NT-511', 'PACHUCA', 'SIN USUARIO.', 'TELEMARKETING', '', 1),
(37, 'NOBREAK', 'E21K05157', 'PANBTL08', '', '', '', 'NBKS1000', 'PACHUCA', 'ENRIQUE CORTES CAMPERO', 'TELEMARKETING', '', 1),
(38, 'NOBREAK', '', 'PANBTL08', '', '', '', '', 'PACHUCA', '', 'TELEMARKETING', '', 1),
(39, 'NOBREAK', 'NO', 'PANBTL09', '', '', '', 'NO', 'PACHUCA', 'SIN USUARIO', 'TELEMARKETING', '', 1),
(40, 'NOBREAK', '', 'PANBTL11', '', '', '', '', 'PACHUCA', 'SIN USUARIO', 'TELEMARKETING', '', 1),
(41, 'NOBREAK', '320527BQ30005089', 'PANBTL10', '', '', '', 'UT750GU', 'PACHUCA', 'RIGOBERTO HERNANDEZ HIDALGO', 'TELEMARKETING', '', 1),
(42, 'NOBREAK', 'E21K03886', 'PANBTL12', '', '', '', 'NBKS1000', 'PACHUCA', 'HUGO CARPIO ROMERO', 'TELEMARKETING', '', 1),
(43, 'NOBREAK', '320527BT30000460', 'PANBTL31', '', '', '', 'UT750GU', 'PACHUCA', 'EDWIN ENRIQUE LOPEZ CRUZ', 'TELEMARKETING', '', 1),
(44, 'NOBREAK', 'E21K22187', 'PANBTL13', '', '', '', 'NBKS1000', 'PACHUCA', 'GUADALUPE SANCHEZ RUIZ', 'TELEMARKETING', '', 1),
(45, 'NOBREAK', '320527BT300004088', 'PANBTL14', '', '', '', 'UT750GU', 'PACHUCA', 'ALIS ARELY QUEZADA GOMEZ', 'TELEMARKETING', '', 1),
(46, 'NOBREAK', '2.21512E+11', 'PANBTL15', '', '', '', 'NB750', 'PACHUCA', 'SIN USUARIO', 'TELEMARKETING', '', 1),
(47, 'NOBREAK', 'E19I17511', 'PANBTL16', '', '', '', 'NBKS1000', 'PACHUCA', 'NAHOMY KAREL CAMACHO LOPEZ', 'TELEMARKETING', '', 1),
(48, 'NOBREAK', '320527BT3001239', 'PANBTL17', '', '', '', 'UT750GU', 'PACHUCA', 'CARLOS ROMERO TORRES', 'TELEMARKETING', '', 1),
(49, 'NOBREAK', 'E22A02829', 'PANBTL18', '', '', '', 'NBKS1000', 'PACHUCA', 'JUAN CARLOS ISLAS VEGA', 'TELEMARKETING', '', 1),
(50, 'NOBREAK', 'E19K9164', 'PANBTL19', '', '', '', 'NBKS1000', 'PACHUCA', 'SIN USUARIO', 'TELEMARKETING', '', 1),
(51, 'NOBREAK', '', '', '', '', '', '', 'PACHUCA', 'JOSUE FRANCISCO RODRIGUEZ PE?A', 'TELEMARKETING', '', 1),
(52, 'NOBREAK', 'E19G13001', 'PANBTL20', '', '', '', 'NBKS1000', 'PACHUCA', 'SIN USUARIO', 'TELEMARKETING', '', 1),
(53, 'NOBREAK', 'E22A01974', 'PANBTL21', '', '', '', 'NBKS1000', 'PACHUCA', 'SERGIO MElGOZA ANGELES', 'TELEMARKETING', '', 1),
(54, 'NOBREAK', 'E21K03867', 'PANBTL22', '', '', '', 'NBKS1000', 'PACHUCA', 'ANTHONY MORENO HURTADO', 'TELEMARKETING', '', 1),
(55, 'NOBREAK', 'E19K9137', 'PANBTL23', '', '', '', 'NBKS1000', 'PACHUCA', 'STHEPHANY ANARSABETH VAZQUEZ RODRIGUEZ', 'TELEMARKETING', '', 1),
(56, 'NOBREAK', '', 'PANBTL32', '', '', '', '', 'PACHUCA', '', 'TELEMARKETING', '', 1),
(57, 'NOBREAK', 'E19G14125', 'PANBTL24', '', '', '', 'NBKS1000', 'PACHUCA', 'ADRIAN ALEJANDRO SANCHEZ GARNICA', 'TELEMARKETING', '', 1),
(58, 'NOBREAK', 'E22A01986', 'PANBTL25', '', '', '', 'NBKS1000', 'PACHUCA', 'JESUS RAMIREZ GARCIA', 'TELEMARKETING', '', 1),
(59, 'NOBREAK', '320527BT30000896', 'PANBTL26', '', '', '', 'UT750GU', 'PACHUCA', 'LUIS ANTONIO MARTINEZ HERNANDEZ', 'TELEMARKETING', '', 1),
(60, 'NOBREAK', 'E21L00906', 'PANBTL27', '', '', '', 'NBKS1000', 'PACHUCA', 'EDUARDO ALEJO GONZALEZ', 'TELEMARKETING', '', 1),
(61, 'NOBREAK', '', '', '', '', '', '', 'PACHUCA', '', 'TELEMARKETING', '', 1),
(62, 'NOBREAK', '320527BU30003333', 'PANBTL28', '', '', '', 'UT750GU', 'PACHUCA', 'OSCAR ARAU CAMPOS', 'TELEMARKETING', '', 1),
(63, 'NOBREAK', '1.70513E+11', 'PANBTL29', '', '', '', 'NT511', 'PACHUCA', 'STHEPHANY VARGAS PINTO DE LE?N ', 'TELEMARKETING', '', 1),
(64, 'NOBREAK', '', 'OXNBVT01', '', '', '', '', 'PACHUCA', 'VENTAS 1', 'OAXACA', '', 1),
(65, 'NOBREAK', '', 'OXNBAL01', '', '', '', '', 'PACHUCA', 'JEFE DE MESAS', 'OAXACA', '', 1),
(66, 'NOBREAK', '320527BS30005597', 'PANBFI01', '', '', 'CYBERPOWER', 'CYBERPOWER', 'PACHUCA', 'NAYELI BAUTISTA', 'FINANZAS', '', 1),
(67, 'NOBREAK', 'E19F43392', 'PANBFI02', '', '', '', 'nbks1000', 'PACHUCA', 'GLORIA BARRERA', 'FINANZAS', '', 1),
(68, 'NOBREAK', 'E21K05175', 'PANBFI03', '', '', '', 'nbks1000 ', 'PACHUCA', 'MARIA DE JESUS SANTANDER', 'FINANZAS', '', 1),
(69, 'NOBREAK', 'E21K05168', 'PANBFI04', '', '', '', 'nbks1000', 'PACHUCA', 'Sandra martinez ramirez', 'FINANZAS', '', 1),
(70, 'NOBREAK', 'E19E18863', 'PANBFI05', '', '', '', 'nbks1000 ', 'PACHUCA', 'ADRIANA AGUIRRE', 'FINANZAS', '', 1),
(71, 'NOBREAK', '', '', '', '', '', 'no tiene', 'PACHUCA', 'Felipe Garcia quieroz ', 'AUDITORIA', '', 1),
(72, 'NOBREAK', '', 'PANBVT13', '', '', '', '', 'PACHUCA', 'PROMOTORES', 'VENTAS', '', 1),
(73, 'NOBREAK', '', 'PANBCD04', '', '', '', 'nbks1000', 'PACHUCA', 'ANDREA RAMOS', 'ADMINISTRACION CEDIS', '', 1),
(74, 'NOBREAK', '', 'PANBCD03', '', '', '', 'NO', 'PACHUCA', 'JESSICA MEJIA', 'ADMINISTRACION CEDIS', '', 1),
(75, 'NOBREAK', '', 'PANBCD02', '', '', '', 'NBKS1000', 'PACHUCA', 'ZULEIMA VALENCIANA', 'ADMINISTRACION CEDIS', '', 1),
(76, 'NOBREAK', '', 'PANBCD01', '', '', '', 'NO', 'PACHUCA', 'DARIANN TORRES', 'ADMINISTRACION CEDIS', '', 1),
(77, 'NOBREAK', 'Paul gutierrez', '', '', '', '', 'datashield', 'PACHUCA', 'aveces mo retiene la carga ', 'MERCADOTECNIA', '', 1),
(78, 'NOBREAK', '320527BS30005586', 'PANBME01', '', '', '', 'UT750GU\nETIQUETA: PANBME01', 'PACHUCA', 'MARISOL GAMERO', 'MERCADOTECNIA', '', 1),
(79, 'NOBREAK', '320526BT30009160', 'PANBME02', '', '', '', 'UT750GU', 'PACHUCA', 'YANETH MERCHAIN DE LA ROSA', 'MERCADOTECNIA', '', 1),
(80, 'NOBREAK', '', 'PANBVI01', '', '', '', '', 'PACHUCA', '', 'VIGILANCIA', '', 1),
(81, 'NOBREAK', 'Sergio iba?ez ', '', '', '', '', 'no tiene', 'PACHUCA', '', 'RECIBO DE MERCANCIAS', '', 1),
(82, 'NOBREAK', 'recepci?n Recibo', '', '', '', '', 'no', 'PACHUCA', '', 'RECIBO DE MERCANCIAS', '', 1),
(83, 'NOBREAK', 'Andrea Tellez', '', '', '', '', 'no tiene', 'PACHUCA', '', '', '', 1),
(84, 'NOBREAK', '320527BS30005585', 'PANBDE01', '', '', '', 'UT750GU', 'PACHUCA', 'Diana  olmedo Islas', 'DEVOLUCIONES', '', 1),
(85, 'NOBREAK', '320527BT30005659', 'PANBDE04', '', '', '', 'UT750GU', 'PACHUCA', 'lector de cb 3nstar sc310bt', 'DEVOLUCIONES', '', 1),
(86, 'NOBREAK', 'eriberto Caballero', 'PANBDE05', '', '', '', 'no', 'PACHUCA', '', 'DEVOLUCIONES', '', 1),
(87, 'NOBREAK', 'eriberto Caballero', 'PANBDE05', '', '', '', 'no', 'PACHUCA', '', 'DEVOLUCIONES', '', 1),
(88, 'NOBREAK', '320527BS30006745', 'PANBDE02', '', '', '', 'UT750GU', 'PACHUCA', 'Yuli', 'DEVOLUCIONES', '', 1),
(89, 'NOBREAK', '320527BQ30003810', 'PANBDE03', '', '', '', 'UT750GU', 'PACHUCA', 'nueva', 'DEVOLUCIONES', '', 1),
(90, 'NOBREAK', '1.22E+11', 'PANBEM01', '', '', '', 'SMARTBITT NB500', 'PACHUCA', 'MARIANA CRUZ HERNANDEZ', 'EMBARQUES', '', 1),
(91, 'NOBREAK', '320527BT30004306', 'PANBEM02', '', '', '', 'UT750GU', 'PACHUCA', 'MARIA MARITZA URIBE MORALES', 'EMBARQUES', '', 1),
(92, 'NOBREAK', 'NO', 'PANBEM03', '', '', '', 'NO', 'PACHUCA', 'AVILA TREJO TOMAS ALFREDO', 'EMBARQUES', '', 1),
(93, 'NOBREAK', '320527BT30001241', 'PANBEM04', '', '', '', 'UT750GU', 'PACHUCA', 'RUBI ESMERALDA RODRIGUEZ ANDRADE', 'EMBARQUES', '', 1),
(94, 'NOBREAK', '320527BS30007439', 'PANBEM05', '', '', '', 'UT750GU', 'PACHUCA', 'ALFREDO ORTIZ CONTRERAS', 'EMBARQUES', '', 1),
(95, 'NOBREAK', '320526BT30002168', 'PANBEM06', '', '', '', 'UT550GU', 'PACHUCA', 'MIGUEL ROBERTO HERNANDE CHAVEZ', 'EMBARQUES', '', 1),
(96, 'NOBREAK', '', '', '', '', '', 'isb, serie en foto', 'PACHUCA', 'GADDIEL', 'EMBARQUES', '', 1),
(97, 'NOBREAK', '', '', '', '', '', 'nbks1000', 'PACHUCA', 'rub? Esmeralda Rodriguez', 'EMBARQUES', '', 1),
(98, 'NOBREAK', 'E22H01612', 'PANBAL02', '', '', '', 'NBKS1000', 'PACHUCA', 'MESA 2', 'MESAS ALMACEN', '', 1),
(99, 'NOBREAK', '', 'PANBAL01', '', '', '', 'no', 'PACHUCA', 'MESA 1', 'MESAS ALMACEN', '', 1),
(100, 'NOBREAK', '', 'PANBAL03', '', '', '', 'nbks1000', 'PACHUCA', 'MESA 3', 'MESAS ALMACEN', '', 1),
(101, 'NOBREAK', 'E19K15988', 'PANBAL04', '', '', '', 'NBKS1000', 'PACHUCA', 'MESA 4', 'MESAS ALMACEN', '', 1),
(102, 'NOBREAK', '', 'PANBAL05', '', '', '', 'cyberpower', 'PACHUCA', 'MESA 5', 'MESAS ALMACEN', '', 1),
(103, 'NOBREAK', '', 'PANBAL06', '', '', '', 'NBKS1000', 'PACHUCA', 'MESA 6', 'MESAS ALMACEN', '', 1),
(104, 'NOBREAK', '', 'PANBAL07', '', '', '', 'NBKS1000', 'PACHUCA', 'MESA 7', 'MESAS ALMACEN', '', 1),
(105, 'NOBREAK', 'E22H01613', 'PANBAL08', '', '', '', 'nbks1000', 'PACHUCA', 'MESA 8', 'MESAS ALMACEN', '', 1),
(106, 'NOBREAK', 'NO TIENE', 'PANBAL09', '', '', '', 'no', 'PACHUCA', 'LAURA', 'PICKING', '', 1),
(107, 'NOBREAK', 'E22H01584', 'PANBSC01', '', '', '', 'nbks1000', 'PACHUCA', 'MESA1', 'SURTIDO CEDIS', '', 1),
(108, 'NOBREAK', '', 'PANBSC02', '', '', '', '', 'PACHUCA', 'MESA2', 'SURTIDO CEDIS', '', 1),
(109, 'NOBREAK', '', 'PANBSC03', '', '', '', 'NO', 'PACHUCA', 'MESA3', 'SURTIDO CEDIS', '', 1),
(110, 'NOBREAK', 'E18J22930', 'PANBSC04', '', '', '', 'NBKS1000', 'PACHUCA', 'MESA 4', 'SURTIDO CEDIS', '', 1),
(111, 'NOBREAK', '', 'PANBSC05', '', '', '', 'NO', 'PACHUCA', 'MESA 5', 'SURTIDO CEDIS', '', 1),
(112, 'NOBREAK', 'E22H01591', 'PANBSC06', '', '', '', 'NBKS1000', 'PACHUCA', 'MESA6', 'SURTIDO CEDIS', '', 1),
(113, 'NOBREAK', '', 'PANBSC07', '', '', '', 'NO', 'PACHUCA', 'VICTOR HERNANDEZ GONZALEZ', 'SURTIDO CEDIS', '', 1),
(114, 'NOBREAK', '*170512524010*', 'PANBSC08', '', '', '', 'NT-511', 'PACHUCA', 'NANCY KARINA REYES VALENCIA', 'SURTIDO CEDIS', '', 1),
(115, 'NOBREAK', '', '', '', '', '', 'nbks1000', 'PACHUCA', 'Arturo almac?n ', 'ALMACEN AL FONDO', '', 1),
(116, 'NOBREAK', '', 'NA', '', '', '', '', 'PACHUCA', 'MESA 6', 'EQUIPO EN PRESTAMO', '', 1),
(117, 'NOBREAK', '320527BT30003680', 'PANBMI01', '', '', '', 'CYBERPOWER UT750GU', 'MINERO', 'SERVIDOR MYB MINERO', 'REFA MINERO', '', 1),
(118, 'NOBREAK', '320527BT30003677', 'PANBMI02', '', '', '', 'CYBERPOWER UT750GU', 'MINERO', 'MOSTRADOR 1 MINERO', 'REFA MINERO', '', 1),
(119, 'NOBREAK', '320527BQ30006055', 'PANBMI03', '', '', '', 'CYBERPOWER UT750GU', 'MINERO', 'MOSTRADOR 2 MINERO', 'REFA MINERO', '', 1),
(120, 'NOBREAK', '', '', '', '', '', '', 'MINERO', 'FACTURACION', 'REFA MINERO', '', 1),
(121, 'NOBREAK', '320527BT30000637', 'PANBAC01', '', '', '', 'CYBERPOWER UT750GU', 'ACTOPAN', 'SERVIDOR MYB ACTOPAN', 'REFA ACTOPAN', '', 1),
(122, 'NOBREAK', '320527BQ30003812', 'PANBAC02', '', '', '', 'CYBERPOWER UT750GU', 'ACTOPAN', 'MOSTRADOR 1 ACTOPAN', 'REFA ACTOPAN', '', 1),
(123, 'NOBREAK', '320527BQ30002658', 'PANBAC03', '', '', '', 'CYBERPOWER UT750GU', 'ACTOPAN', 'MOSTRADOR 2 ACTOPAN', 'REFA ACTOPAN', '', 1),
(124, 'NOBREAK', '320527BQ30006056', 'PANBAC04', '', '', '', 'CYBERPOWER UT750GU', 'ACTOPAN', 'FACTURACION ACTOPAN', 'REFA ACTOPAN', '', 1),
(125, 'NOBREAK', '', '', '', '', '', '', 'ACTOPAN', '', 'REFA ACTOPAN', '', 1),
(126, 'NOBREAK', '', 'PANBTU01', '', '', '', 'CYBERPOWER', 'TULANCINGO', 'SERVIDOR MYB TULANCINGO', 'REFA TULANCINGO', '', 1),
(127, 'NOBREAK', '320527BQ30004942', 'PANBTU02', '', '', '', 'CYBERPOWER', 'TULANCINGO', 'MOSTRADOR 1 TULANCINGO', 'REFA TULANCINGO', '', 1),
(128, 'NOBREAK', '320527BQ30003777', 'PANBTU03', '', '', '', 'CYBERPOWER', 'TULANCINGO', 'MOSTRADOR 2 TULANCINGO', 'REFA TULANCINGO', '', 1),
(129, 'NOBREAK', '', 'PANBTU04', '', '', '', 'CYBERPOWER', 'TULANCINGO', 'FACTURACION TULANCINGO', 'REFA TULANCINGO', '', 1),
(130, 'NOBREAK', '', 'SL-NB00001', '', '', '', '', 'SAN LUIS POTOSI', '', 'SAN LUIS POTOSI', '', 1),
(131, 'NOBREAK', '', 'SL-NB00002', '', '', '', '', 'SAN LUIS POTOSI', '', 'SAN LUIS POTOSI', '', 1),
(132, 'NOBREAK', '', 'SL-NB00003', '', '', '', '', 'SAN LUIS POTOSI', '', 'SAN LUIS POTOSI', '', 1),
(133, 'NOBREAK', '', 'SL-NB00004', '', '', '', '', 'SAN LUIS POTOSI', '', 'SAN LUIS POTOSI', '', 1),
(134, 'NOBREAK', '', 'SL-NB00005', '', '', '', '', 'SAN LUIS POTOSI', '', 'SAN LUIS POTOSI', '', 1),
(135, 'NOBREAK', '', 'SL-NB00006', '', '', '', '', 'SAN LUIS POTOSI', '', 'SAN LUIS POTOSI', '', 1),
(136, 'NOBREAK', '', 'CHNBGT01', '', '', '', '', 'CHIHUAHUA', 'GERENTE CEDIS', 'CHIHUAHUA', '', 1),
(137, 'NOBREAK', '', 'CHNBCD02', '', '', '', '', 'CHIHUAHUA', 'PIBOTE', 'CHIHUAHUA', '', 1),
(138, 'NOBREAK', '', 'CHNBCD03', '', '', '', 'NO TIENE', 'CHIHUAHUA', 'ACTUAL FACTURACION, CARLOS URRUETA ALMEIDA', 'CHIHUAHUA', '', 1),
(139, 'NOBREAK', '', 'CHNBCD04', '', '', '', 'NO TIENE', 'CHIHUAHUA', 'ALMACEN, ENCARGADO ALEXANDER QUINTANA', 'CHIHUAHUA', '', 1),
(140, 'NOBREAK', '', '', '', '', '', 'NO TIENE', 'CHIHUAHUA', 'ALMACEN, MESA', 'CHIHUAHUA', '', 1),
(141, 'NOBREAK', '', 'ME-NB00001', '', '', '', '', '', '', '', '', 1),
(142, 'NOBREAK', '320527BS30006751', 'VHNBGC01', '', '', '', 'UT750GU', 'VILLAHERMOSA', 'GERENTE CEDIS', 'VILLAHERMOSA', '', 1),
(143, 'NOBREAK', '', 'MTNBCD01', '', '', '', '', 'MONTERREY', 'GERENTE CARLOS ALBERTO CABRERA PINEDA', 'MONTERREY', '', 1),
(144, 'NOBREAK', '', 'MTNBCD02', '', '', '', '', 'MONTERREY', 'LIDER DE ALMACEN - JESSICA BERENICE DORIA URBINA', 'MONTERREY', '', 1),
(145, 'NOBREAK', '', 'MTNBCD03', '', '', '', '', 'MONTERREY', 'FACTURACION-VANESA DURAN', 'MONTERREY', '', 1),
(146, 'NOBREAK', '', '', '', '', '', '', 'PUEBLA', '', 'PUEBLA', '', 1),
(147, 'NOBREAK', '', 'LENBTL01', '', '', '', 'NO TIENE', 'LEON', 'TELEMARKETING, CRISTIAN GIOVANY MOERNO', 'LEON', '', 1),
(148, 'NOBREAK', '', '', '', '', '', 'NO TIENE', 'LEON', 'TELEMARKETING, CRISTIAN ANTONIO NEGRETE', 'LEON', '', 1),
(149, 'NOBREAK', '', '', '', '', '', 'NO TIENE', 'LEON', 'JEFE MESA 1', 'LEON', '', 1),
(150, 'NOBREAK', '', '', '', '', '', 'NO TIENE', 'LEON', 'JEFE DE RECIBO', 'LEON', '', 1),
(151, 'NOBREAK', '', '', '', '', '', 'NO TIENE', 'LEON', 'JEFE DE PISO 2, GUILLERMO', 'LEON', '', 1),
(152, 'NOBREAK', '', '', '', '', '', 'NO TIENE', 'LEON', 'LIDER DE ALMACEN, HORACIO SALVADOR', 'LEON', '', 1),
(153, 'NOBREAK', '', '', '', '', '', 'NO TIENE', 'LEON', 'FACTURACION', 'LEON', '', 1),
(154, 'NOBREAK', '', '', '', '', '', 'SI, ISB NBKS1000', 'LEON', 'GERENTE', 'LEON', '', 1),
(155, 'NOBREAK', '', 'TGNBCD02', '', '', '', '', 'TUXTLA', 'FACTURACION', 'TUXTLA', '', 1),
(156, 'NOBREAK', '', 'QRNBCD01', '', '', '', '', 'QUERETARO', 'JEFE ALMACEN CARLOS', 'QUERETARO', '', 1),
(157, 'NOBREAK', '', 'HRNBCD01', '', '', '', '', 'HERMOSILLO', '', 'HERMOSILLO', '', 1),
(158, 'NOBREAK', '', 'CANBCD01', '', '', '', '', 'CANCUN', 'DANIEL DE JESUS  MARTINEZ PEREZ', 'CANCUN', '', 1),
(159, 'NOBREAK', '', 'CANBCD02', '', '', '', '', 'CANCUN', 'KIMBERLY GUADALUPE ZU?IGA MORALES', 'CANCUN', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_pantalla`
--

CREATE TABLE `form_pantalla` (
  `Id` int(100) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `numero_serie` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `cedis` varchar(200) NOT NULL,
  `comentarios_observaciones` varchar(200) NOT NULL,
  `status` int(100) NOT NULL COMMENT '0 baja\r\n1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_pc`
--

CREATE TABLE `form_pc` (
  `Id` int(100) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `numero_serie` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `proceso` varchar(100) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `responsiva` varchar(200) NOT NULL,
  `especificaciones` varchar(200) NOT NULL,
  `cedis` varchar(200) NOT NULL,
  `comentarios_observaciones` varchar(200) NOT NULL,
  `status` int(100) NOT NULL COMMENT '0 baja\r\n1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form_pc`
--

INSERT INTO `form_pc` (`Id`, `equipo`, `numero_serie`, `clave`, `estado`, `proceso`, `marca`, `modelo`, `usuario`, `area`, `responsiva`, `especificaciones`, `cedis`, `comentarios_observaciones`, `status`) VALUES
(1, 'PC ESCRITORIO', 'Mxl4100x8z', 'PAPCCM01', 'Buena', '', 'hp', '600 g1 sff', 'julio sicardo', 'COMPRAS', '', 'ci7-4770 8gb hdd 500gb win10 pro 21h2', 'Pachuca', '', 1),
(2, 'PC ESCRITORIO', 'CFZt0m2', '', 'Buena', '', 'dell', '3050', 'magdalena Paramo', 'COMPRAS', '', 'ci5-7500 12gb ssd 240gb w10pro 21h2', 'Pachuca', '', 1),
(3, 'PC ESCRITORIO', '6mm10t2', '', 'Buena', '', 'dell', '3050', 'Adriana Uribe', 'COMPRAS', '', 'ci3-8100 8gb hdd 1tb w10p 21h2', 'Pachuca', '', 1),
(4, 'PC ESCRITORIO', 'h97sgx1', '', 'Buena', '', 'dell', 'optiplex 7010', 'addiel Escudero', 'COMPRAS', '', 'ci7-3770 8gb hdd 1tb w10 p 21h2', 'Pachuca', '', 1),
(5, 'PC ESCRITORIO', '8CG92277NP', 'PAPCCM02', 'Buena', '', 'HP', '280 G3 SFF', 'LUIS HERNAN MENDOZA', 'COMPRAS', '', 'CI5-8500 4GB SSD 240GB WIN10 PRO 22H2', 'Pachuca', '', 1),
(6, 'PC ESCRITORIO', '8CG92277ML', 'PAPCCM03', 'Buena', '', 'HP', '280 G3', 'OMAR GONZALEZ', 'COMPRAS', '', 'ci5- 8500 8gb w10p 21h2 Hssd 240gb', 'Pachuca', '', 1),
(7, 'PC ESCRITORIO', '8cg92277fd', '', 'Buena', '', 'hp ', '280 g3', 'sin usuario', 'COMPRAS', '', 'ci5-8500 16gb w11 pro 21h2 hdd 500gb', 'Pachuca', '', 1),
(8, 'PC ESCRITORIO', '8CG00418SF', 'PAPCCC01', '', '', 'HP', 'PRO ONE 400', 'ver?nica Gallegos Lazcano', 'CREDITO Y COBRANZA', '', 'CI7-9700T 8GB WIN10 PRO 22H2 SSD SN520 512GB', 'Pachuca', '', 1),
(9, 'PC ESCRITORIO', 'HGFWBY1', 'PAPCCC02', '', '', 'DELL', 'OPTIPLEX 7010', 'MARTHA', 'CREDITO Y COBRANZA', '', 'CI7-3770 8GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(10, 'PC ESCRITORIO', 'HFXTBY1', 'PAPCCC03', '', '', 'DELL', 'OPTIPLEX 7010', 'ARIANA AGUILAR AVILA', 'CREDITO Y COBRANZA', '', 'CI7-3770 8GB WIN10 PRO SSD 22H2 240GB', 'Pachuca', '', 1),
(11, 'PC ESCRITORIO', '8BNP7Y1', 'PAPCCC04', '', '', 'DELL', 'OPTIPLEX 7010', 'REYNA DOMINGUEZ HERNANDEZ', 'CREDITO Y COBRANZA', '', 'CI7-3770 8GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(12, 'PC ESCRITORIO', '2.34E+12', 'PAPCCC05', '', '', 'ENSAMBLADO', 'TRUEBASIC', 'CAROLINA RAMIREZ', 'CREDITO Y COBRANZA', '', 'CI5-6400 12GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(13, 'PC ESCRITORIO', '9.4E+11', 'PAPCCC06', '', '', 'ENSAMBLADO', 'ACTIVE COOL', 'ELIZABETH', 'CREDITO Y COBRANZA', '', 'CI5-3330 8GB WIN10 PRO 22H2  SSD 120GB', 'Pachuca', '', 1),
(14, 'PC ESCRITORIO', 'C3DQ0M2', 'PAPCCC07', '', '', 'DELL', 'OPTIPLEX 3050', 'IRMA LECHUGA FRANCISCO', 'CREDITO Y COBRANZA', '', 'CI5-7500 8GB WIN10PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(15, 'PC ESCRITORIO', '8B6P7Y1', 'PAPCCC08', '', '', 'DELL', 'OPTIPLEX 7010', 'MAYELY MEJIA', 'CREDITO Y COBRANZA', '', 'CI7-3770 8GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(16, 'PC ESCRITORIO', '8CG9327T1S', 'PAPCCC09', '', '', 'HP', '280 G3 SFF', 'VERONICA HERNANDEZ', 'CREDITO Y COBRANZA', '', 'CI5-9500 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(17, 'PC ESCRITORIO', '8BWP7Y1', 'PAPCCC10', '', '', 'DELL', 'OPTIPLEX 7010', 'DULCE HERNANDEZ', 'CREDITO Y COBRANZA', '', 'CI7-3770 8GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(18, 'PC ESCRITORIO', '8BJR7Y1', 'PAPCCC11', '', '', 'DELL', 'OPTIPLEX 7010', 'KARLA ORTIZ', 'CREDITO Y COBRANZA', '', 'CI7-3770 12GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(19, 'PC ESCRITORIO', '8C6R7Y1', 'PAPCCC12', '', '', 'DELL', 'OPTIPLEX 7010', 'MAGDALENA DIAZ PEREZ', 'CREDITO Y COBRANZA', '', 'CI7-3770 16GB WIN10 PRO 22H2 SSD 480GB', 'Pachuca', '', 1),
(20, 'PC ESCRITORIO', '1.76E+12', 'PAPCCC13', '', '', 'ENSAMBLADO', 'NA', 'DANAHE VALENCIA', 'CREDITO Y COBRANZA', '', 'CI5-6400 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(21, 'PC ESCRITORIO', '9.4E+11', 'PAPCPE01', '', '', 'ENSAMBLADO', 'NA', 'silvia Edith Galvan guerrero', 'PRECIOS ESPECIALES', '', 'CI5-3330 8GB WIN10 PRO SSD 240GB', 'Pachuca', '', 1),
(22, 'PC ESCRITORIO', '2TLM9R3', 'PAPCRH01', '', '', 'DELL', '7010', 'ESTEFANY VEGA JACOME', 'RECURSOS HUMANOS', '', 'CI5-12400 8GB WIN10 PRO 21H2 SSD 512GB', 'Pachuca', '', 1),
(23, 'PC ESCRITORIO', '9.5E+11', 'PAPCRE01', '', '', 'ENSAMBLADO', 'ACTIVE COOL', 'MARIA GUADALUPE', 'ADMIN REFAS', '', 'CI5-3330 8GB WIN10 PRO 21H2 HDD 1TB', 'Pachuca', '', 1),
(24, 'PC ESCRITORIO', '9.4E+11', 'PAPCSM01', '', '', 'ENSAMBLADO', 'ACTIVE COOL', 'doctora Mara', 'SERVICIO MEDICO', '', 'AMD sempron 140 2gb win7 pro hdd 160gb', 'Pachuca', '', 1),
(25, 'PC ESCRITORIO', '9.41E+11', 'PAPCCO02', '', '', 'ENSAMBLADO', 'ACTIVE COOL', 'berenice Perez hernandez', 'CONTABILIDA', '', 'ci7-3770 8gb Win10 pro 21h2 hdd 1tb 2.5plg', 'Pachuca', '', 1),
(26, 'PC ESCRITORIO', '6NK00t2', 'PAPCCO03', '', '', 'dell', 'vostro', 'erika salazar tolentino', 'CONTABILIDA', '', 'ci3-8100 4gb win10 pro 21h2 ssd 240gb kgt', 'Pachuca', '', 1),
(27, 'PC ESCRITORIO', '6NRYZS2', 'PAPCCO04', '', '', 'dell', 'vostro 3470', 'faustino Ivan Rangel Cortes', 'CONTABILIDA', '', 'ci3-8100 8gb win10 pro 21h2 SSD 120GB', 'Pachuca', '', 1),
(28, 'PC ESCRITORIO', '6NF30T2', 'PAPCCO05', '', '', 'dell', 'vostro 3470', 'irais Ramirez Garcia', 'CONTABILIDA', '', 'ci3-8100 4gb win10 pro 21h2 ssd 240gb', 'Pachuca', '', 1),
(29, 'PC ESCRITORIO', 'MXL7211PY7', 'PAPCAU01', '', '', 'HP', 'ELITE ONE 800 G3', 'FELIPE GARCIA QUIROZ', 'AUDITORIA', '', 'CI7-6700 8GB WIN10 PRO 22H2 HDD 1TB', 'Pachuca', '', 1),
(30, 'PC ESCRITORIO', '5TLM9R3', 'PAPCTL02', '', '', 'DELL', 'vostro 3710', 'SELENE DE LOS ANGELES MARTINEZ PEREZ', 'TELEMARKETING', '', 'CI5-12400 8GB WIN10 PRO 21H2 SSD 512GB', 'Pachuca', '', 1),
(31, 'PC ESCRITORIO', 'FSLM9R3', 'PAPCTL03', '', '', 'DELL', 'vostro 3710', 'ESBEIDY MENDOZA FLORES', 'TELEMARKETING', '', 'CI5-12400 8GB WIN10 PRO 21H2 SSD 512GB', 'Pachuca', '', 1),
(32, 'PC ESCRITORIO', 'BTLM9R3', 'PAPCTL04', '', '', 'DELL', 'vostro 3710', 'JOSUE FRANCISCO RODRIGUEZ PE?A', 'TELEMARKETING', '', 'CI5-12400 8GB WIN10 PRO 21H2 SSD 512GB', 'Pachuca', '', 1),
(33, 'PC ESCRITORIO', '7TLM9R3', 'PAPCTL05', '', '', 'DELL', 'vostro 3710', 'ADRIAN BARREIRO ALVAREZ', 'TELEMARKETING', '', 'CI5-12400 8GB WIN10 PRO 21H2 SSD 512GB', 'Pachuca', '', 1),
(34, 'PC ESCRITORIO', '8CG9327T1X', 'PAPCTL06', '', '', 'HP', '280 G3 SFF', 'ALAN MEJIA DE JESUS ', 'TELEMARKETING', '', 'CI5-9500 4GB WIN10 PRO 21H2 SSD HP 120GB', 'Pachuca', '', 1),
(35, 'PC ESCRITORIO', '9.4E+11', 'PAPCTL07', '', '', 'ENSAMBLADO', 'NA', 'LAURA FERNANDEZ SANCHEZ CABRERA', 'TELEMARKETING', '', 'CI5-3330 8GB WIN10 PRO 21H2 SSD HP 120GB', 'Pachuca', '', 1),
(36, 'PC ESCRITORIO', '9.4E+11', 'PAPCTL30', '', '', 'ACTIVE COOL', 'NA', 'SIN USUARIO.', 'TELEMARKETING', '', 'CI5-3300 8GB WIN10 PRO 22H2 SSD HP 120 GB', 'Pachuca', '', 1),
(37, 'PC ESCRITORIO', '01268-7660701201', 'PAPCTL08', '', '', 'QUARONI', 'QCMT-05', 'ENRIQUE CORTES CAMPERO', 'TELEMARKETING', '', 'CI3-4150 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(38, 'PC ESCRITORIO', '9.4E+11', 'PAPCTL08', '', '', 'ACTIVE COOL SLIM', '', '', 'TELEMARKETING', '', 'alejandro Edwin', 'Pachuca', '', 1),
(39, 'PC ESCRITORIO', '9GYWGX1', 'PAPCTL09', '', '', 'DELL', 'OPTIPLEX 7010', 'SIN USUARIO', 'TELEMARKETING', '', 'CI5-3330 12GB WIN10 PRO 21H2 SSD AD 120GB', 'Pachuca', '', 1),
(40, 'PC ESCRITORIO', '9.41E+11', 'PAPCTL11', '', '', 'ACTIVE COOL', 'ENSAMBLADA', 'SIN USUARIO', 'TELEMARKETING', '', 'CI5-3330 8GB WIN10 PRO 21H2 SSD HP 120GB', 'Pachuca', '', 1),
(41, 'PC ESCRITORIO', 'YGS02419091103769', 'PAPCTL10', '', '', 'GETTECH', 'ENSAMBLADO', 'RIGOBERTO HERNANDEZ HIDALGO', 'TELEMARKETING', '', 'CI7-3770 12GB WIN10 PRO 21H2 SSD ADATA 120GB', 'Pachuca', '', 1),
(42, 'PC ESCRITORIO', '1S10FCA076LSMJ04PXAK', 'PAPCTL12', '', '', 'LENOVO', 'THINKCENTRE M900', 'HUGO CARPIO ROMERO', 'TELEMARKETING', '', 'CI7-6700 8GB WIN10 PRO 21H2 SSD 240GB', 'Pachuca', '', 1),
(43, 'PC ESCRITORIO', '1623LM3', 'PAPCTL31', '', '', 'DELL', 'VOSTRO 3681', 'EDWIN ENRIQUE LOPEZ CRUZ', 'TELEMARKETING', '', 'CI5-10400 8GB WIN10 HOME SL SSD 240GB ', 'Pachuca', '', 1),
(44, 'PC ESCRITORIO', '8CG92277M3', 'PAPCTL13', '', '', 'HP', '280 G3 SFF', 'GUADALUPE SANCHEZ RUIZ', 'TELEMARKETING', '', 'CI5-8500 4GB WIN10 HOME 21H2 SSD KGT 120GB', 'Pachuca', '', 1),
(45, 'PC ESCRITORIO', '1S10FCA02JLDMJ043CWD', 'PAPCTL14', '', '', 'LENOVO', 'THINK M900', 'ALIS ARELY QUEZADA GOMEZ', 'TELEMARKETING', '', 'CI7-6700 8GB WIN10 PRO 21H2 SSD 120GB', 'Pachuca', '', 1),
(46, 'PC ESCRITORIO', '9.4E+11', 'PAPCTL15', '', '', 'ACTIVE COOL', '', 'SIN USUARIO', 'TELEMARKETING', '', 'CI5-2310 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(47, 'PC ESCRITORIO', '8CG92277M4', 'PAPCTL16', '', '', 'HP', '280 G3 SFF', 'NAHOMY KAREL CAMACHO LOPEZ', 'TELEMARKETING', '', 'CI5-8500 4GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(48, 'PC ESCRITORIO', '9.4E+11', 'PAPCTL17', '', '', 'ACTIVE COOL', 'NA', 'CARLOS ROMERO TORRES', 'TELEMARKETING', '', 'CI5-3330 8GB WIN10 PRO 21H2 SSD 120GB', 'Pachuca', '', 1),
(49, 'PC ESCRITORIO', 'C31Q0M2', 'PAPCTL18', '', '', 'DELL', 'OPTIPLEX 3050', 'JUAN CARLOS ISLAS VEGA', 'TELEMARKETING', '', 'CI5-7500 8GB WIN10 PRO 21H2 SSD 120GB', 'Pachuca', '', 1),
(50, 'PC ESCRITORIO', '1S10FCA02JLDMJ042AKO', 'PAPCTL19', '', '', 'LENOVO', 'THINKCENTRE M900', 'SIN USUARIO', 'TELEMARKETING', '', 'CI7-6700 8GB WIN10 PRO 21H2 SSD 240GB', 'Pachuca', '', 1),
(51, 'PC ESCRITORIO', '9.4E+11', '', '', '', 'ACTIVE COOL', 'NA', 'JOSUE FRANCISCO RODRIGUEZ PE?A', 'TELEMARKETING', '', 'PENTIUM G2010 8GB WIN 7 HDD 500GB   (SE VA A DAR DE BAJA 20/02/23)', 'Pachuca', '', 1),
(52, 'PC ESCRITORIO', 'C27S0M2', 'PAPCTL20', '', '', 'DELL', 'OPTIPLEX 3050', 'SIN USUARIO', 'TELEMARKETING', '', 'CI5-7500 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(53, 'PC ESCRITORIO', 'C2PT0M2', 'PAPCTL21', '', '', 'DELL', 'OPTIPLEX 3050', 'SERGIO MElGOZA ANGELES', 'TELEMARKETING', '', 'CI5-7500 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(54, 'PC ESCRITORIO', '1S10FCA076LSMJ04PXE8', 'PAPCTL22', '', '', 'LENOVO', 'THINKCENTRE M900', 'ANTHONY MORENO HURTADO', 'TELEMARKETING', '', 'CI7-6700 8GB WIN10 PRO 22H2 SSD 120GB (HP)', 'Pachuca', '', 1),
(55, 'PC ESCRITORIO', 'CN-0T5C4N-70163-5B4-004T-A01', 'PAPCTL23', '', '', 'DELL', 'INSPIRON D09S', 'STHEPHANY ANARSABETH VAZQUEZ RODRIGUEZ', 'TELEMARKETING', '', 'CI5-3300 8GB WIN10 PRO 22H2 SSD HP 240 GB', 'Pachuca', '', 1),
(56, 'PC ESCRITORIO', '9.4E+11', 'PAPCTL32', '', '', 'ACTIVE COOL', 'NA', '', 'TELEMARKETING', '', 'CI5-3330 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(57, 'PC ESCRITORIO', '2.34E+12', 'PAPCTL24', '', '', 'ACTIVE COOL', 'NA', 'ADRIAN ALEJANDRO SANCHEZ GARNICA', 'TELEMARKETING', '', 'CI5-3340 8GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(58, 'PC ESCRITORIO', '9.4E+11', 'PAPCTL25', '', '', 'ENSAMBLADO', 'ACTIVE COOL', 'JESUS RAMIREZ GARCIA', 'TELEMARKETING', '', 'PENTIUM G2030 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(59, 'PC ESCRITORIO', '8CG9241YH6', 'PAPCTL26', '', '', 'HP', '280 G3 SFF', 'LUIS ANTONIO MARTINEZ HERNANDEZ', 'TELEMARKETING', '', 'CI5-9500 8GB WIN11 PRO 23H2 SSD 120GB', 'Pachuca', '', 1),
(60, 'PC ESCRITORIO', 'MJ04WUSV', 'PAPCTL27', '', '', 'LENOVO THINK', 'M900', 'EDUARDO ALEJO GONZALEZ', 'TELEMARKETING', '', 'CI7-6700 8GB WIN10 PRO 22H2 SSD 240gb', 'Pachuca', '', 1),
(61, 'PC ESCRITORIO', '9.4E+11', '', '', '', 'active cool ', '', '', 'TELEMARKETING', '', 'ssd 120gb', 'Pachuca', '', 1),
(62, 'PC ESCRITORIO', '1.01E+11', 'PAPCTL28', '', '', 'ENSAMBLADO', 'ACTIVE COOL', 'OSCAR ARAU CAMPOS', 'TELEMARKETING', '', 'CI5-3330 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(63, 'PC ESCRITORIO', '3RLM9R3', 'PAPCTL29', '', '', 'DELL', 'vostro 3710', 'STHEPHANY VARGAS PINTO DE LE?N ', 'TELEMARKETING', '', 'CI5-12400 8GB WIN10 PRO 22H2 SSD 512GB', 'Pachuca', '', 1),
(64, 'PC ESCRITORIO', '4CE043122R', 'OXPCVT01', '', '', 'HP', '280 G SFF', 'VENTAS 1', 'OAXACA', '', 'CI3 4GB* WIN10 PRO 21H2 SSD 120GB', 'Pachuca', '', 1),
(65, 'PC ESCRITORIO', '4CE04311W6', 'OXPCAL01', '', '', 'HP', '280 G3 SFF', 'JEFE DE MESAS', 'OAXACA', '', 'CI3-9100 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(66, 'PC ESCRITORIO', '8CG941F2KW', 'PAPCFI01', '', '', 'HP', '280 G3 SFF', 'NAYELI BAUTISTA', 'FINANZAS', '', 'CI5-9500 8GB WIN11 PRO 22H2 SSD 240GB (WD)', 'Pachuca', '', 1),
(67, 'PC ESCRITORIO', '8CG9240K0Z', 'PAPCFI02', '', '', 'HP', '280 G3 SFF', 'GLORIA BARRERA', 'FINANZAS', '', 'CI5-9500 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(68, 'PC ESCRITORIO', '9.41E+11', 'PAPCFI03', '', '', 'ENSAMBLADO', 'ACTIVE COOL', 'MARIA DE JESUS SANTANDER', 'FINANZAS', '', 'CI5-3330 12GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(69, 'PC ESCRITORIO', 'mxl4101zmk', 'PAPCFI04', '', '', 'HP', '600 g1 sff', 'Sandra martinez ramirez', 'FINANZAS', '', 'CI7-4770 12GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(70, 'PC ESCRITORIO', '8cg9241ygk', 'PAPCFI05', '', '', 'HP', '280 g3 sff', 'ADRIANA AGUIRRE', 'FINANZAS', '', 'CI5-9500 8GB WIN10 PRO 22H2 SSD 480GB', 'Pachuca', '', 1),
(71, 'PC ESCRITORIO', 'mxl7211py7', '', '', '', 'hp', '?lite one 800 g3 ', 'Felipe Garcia quieroz ', 'AUDITORIA', '', 'ci7-6700 8gb win10 pro 1909 hdd 1tb', 'Pachuca', '', 1),
(72, 'PC ESCRITORIO', '1.76E+12', 'PAPCVT13', '', '', 'ENSAMBLADA', 'TRUE BASIX', 'PROMOTORES', 'VENTAS', '', 'Ci3-3220 8GB WIN10 HOME 22H2 HDD 500GB', 'Pachuca', '', 1),
(73, 'PC ESCRITORIO', '2408202301', 'PAPCCD04', '', '', 'ENSAMBLADO', 'ACTECK', 'ANDREA RAMOS', 'ADMINISTRACION CEDIS', '', 'CI3-3220 8GB WIN10 PRO 22H2 HDD 1TB', 'Pachuca', '', 1),
(74, 'PC ESCRITORIO', 'FZDS0M2', 'PAPCCD03', '', '', 'DELL', 'OPTIPLEX 3050', 'JESSICA MEJIA', 'ADMINISTRACION CEDIS', '', 'CI5-7500 8GB  WIN10 PRO 22H2 SSD 256GB', 'Pachuca', '', 1),
(75, 'PC ESCRITORIO', '8CG9463622', 'PAPCCD02', '', '', 'HP', '280 G3', 'ZULEIMA VALENCIANA', 'ADMINISTRACION CEDIS', '', 'CI5-9500 8GB WIN 10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(76, 'PC ESCRITORIO', 'PAPCCD01', 'PAPCCD01', '', '', 'TRUEBASIX', 'SLIM', 'DARIANN TORRES', 'ADMINISTRACION CEDIS', '', 'CI5-3330 10GB WIN 10 PRO 22H2 HDD 1TB', 'Pachuca', '', 1),
(77, 'PC ESCRITORIO', 'foto', '', '', '', 'lenovo thank station', '', 'aveces mo retiene la carga ', 'MERCADOTECNIA', '', 'ci7-11700 16gb win 11 pro 21h2 ssd 512gb', 'Pachuca', '', 1),
(78, 'PC ESCRITORIO', 'MXL20520PG', 'PAPCME01', '', '', 'HP', 'Z1 ENTRY TOWER G6', 'MARISOL GAMERO', 'MERCADOTECNIA', '', 'CI7-10700 32GB WIN11 PRO 21H2 SSD 512GB  T.G. 4GB', 'Pachuca', '', 1),
(79, 'PC ESCRITORIO', 'MXL3282W56', 'PAPCME02', '', '', 'HP', 'Z1 ENTRY TOWER G9', 'YANETH MERCHAIN DE LA ROSA', 'MERCADOTECNIA', '', 'CI7-12700 32GB WIN11 PRO 22H2 SSD 512GB T.G. 4GB', 'Pachuca', '', 1),
(80, 'PC ESCRITORIO', '9.4E+11', 'PAPCVI01', '', '', 'ENSAMBLADO', 'NA', '', 'VIGILANCIA', '', 'CI3-3220 8GB WIN10 PRO HDD 1TB', 'Pachuca', '', 1),
(81, 'PC ESCRITORIO', '9.41E+11', '', '', '', 'emsamblado', 'na', '', 'RECIBO DE MERCANCIAS', '', 'ci5-3330 8gb win10 pro 21h2 hdd 1tb', 'Pachuca', '', 1),
(82, 'PC ESCRITORIO', '6.1E+11', '', '', '', 'enmblado gettech', '', '', 'RECIBO DE MERCANCIAS', '', 'ci7-3770 8gb win10 pro 21h2 hdd 1tb', 'Pachuca', '', 1),
(83, 'PC ESCRITORIO', '9.4E+11', '', '', '', 'ENSAMBLADO', 'na', '', '', '', 'ci3-3220 8gb win10 pro hdd 1TB', 'Pachuca', '', 1),
(84, 'PC ESCRITORIO', 'YGS02419091102564', 'PAPCDE01', '', '', 'ENSAMBLADO', 'na', 'Diana  olmedo Islas', 'DEVOLUCIONES', '', 'CI5-4460 8GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(85, 'PC ESCRITORIO', '8CG92277MC', 'PAPCDE04', '', '', 'HP', '280 G3', 'lector de cb 3nstar sc310bt', 'DEVOLUCIONES', '', 'ci5-8500 4gb win10 pro 21h2 ssd 480gb', 'Pachuca', '', 1),
(86, 'PC ESCRITORIO', '9.4E+11', 'PAPCDE05 ANT.', '', '', 'ENSABLADO', 'NA', '', 'DEVOLUCIONES', '', 'CI3-3220 8GB WIN10 PRO 22H2 HDD 1TB', 'Pachuca', '', 1),
(87, 'PC ESCRITORIO', '9.4E+11', 'PAPCDE05', '', '', 'ENSAMBLADO', 'NA', '', 'DEVOLUCIONES', '', 'PENTIUM G2010 8GB WIN10 PRO 22H2 HDD 1TB', 'Pachuca', '', 1),
(88, 'PC ESCRITORIO', 'MXL2244228', 'PAPCDE02', '', '', 'HP', '400 G7 SFF', 'Yuli', 'DEVOLUCIONES', '', 'CI3-10100 8GB SSD 256GB WIN10 PRO', 'Pachuca', '', 1),
(89, 'PC ESCRITORIO', 'MXL22444LB', 'PAPCDE03', '', '', 'HP', '400 G7 SFF', 'nueva', 'DEVOLUCIONES', '', 'CI3-10100 8GB SSD 256GB WIN10 PRO', 'Pachuca', '', 1),
(90, 'PC ESCRITORIO', 'MJ06Q7YV', 'PAPCEM01', '', '', 'LENOVO', 'THINKCENTRE M710S SFF', 'MARIANA CRUZ HERNANDEZ', 'EMBARQUES', '', 'PENTIUM G4560 4GB WIN10 PRO 22H2 SSD 240GB (WD)', 'Pachuca', '', 1),
(91, 'PC ESCRITORIO', '9.4E+11', 'PAPCEM02', '', '', 'ACTECK', 'NA', 'MARIA MARITZA URIBE MORALES', 'EMBARQUES', '', 'Ci5-4460 8GB WIN10 PRO 22H2 SDD 240GB', 'Pachuca', '', 1),
(92, 'PC ESCRITORIO', '9.4E+11', 'PAPCEM03', '', '', 'ACTIVE COOL ', 'NA', 'AVILA TREJO TOMAS ALFREDO', 'EMBARQUES', '', 'Ci3-3220 8GB WIN10 PRO  HDD 500GB', 'Pachuca', '', 1),
(93, 'PC ESCRITORIO', '6.1E+11', 'PAPCEM04', '', '', 'ACTIVE COOL', 'NA', 'RUBI ESMERALDA RODRIGUEZ ANDRADE', 'EMBARQUES', '', 'Ci7-3770 16GB WIN10  22H2 SDD 240GB ', 'Pachuca', '', 1),
(94, 'PC ESCRITORIO', '37979305849', 'PAPCEM05', '', '', 'DELL', 'OPTIPLEX 7010', 'ALFREDO ORTIZ CONTRERAS', 'EMBARQUES', '', 'Ci7-3770 8GB WIN10 PRO  22H2 260GB', 'Pachuca', '', 1),
(95, 'PC ESCRITORIO', 'YGS02419091103792', 'PAPCEM06', '', '', 'GETTECH', 'NA', 'MIGUEL ROBERTO HERNANDE CHAVEZ', 'EMBARQUES', '', 'Ci3-3220 8GB WIN10 PRO 22H2 240GB', 'Pachuca', '', 1),
(96, 'PC ESCRITORIO', 'MXL8260SBL', '', '', '', 'hp', 'no se ve', 'GADDIEL', 'EMBARQUES', '', 'pentium DC E2180 1gb win7 pro 32b hdd 160gb', 'Pachuca', '', 1),
(97, 'PC ESCRITORIO', '9.4E+11', '', '', '', 'active cool', 'na', 'rub? Esmeralda Rodriguez', 'EMBARQUES', '', 'ci5-3330 8gb wkn7 pro hdd 1tb', 'Pachuca', '', 1),
(98, 'PC ESCRITORIO', '9.4E+11', 'PAPCAL02', '', '', 'ENSAMBLADO', 'NA', 'MESA 2', 'MESAS ALMACEN', '', 'CI5-3330 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(99, 'PC ESCRITORIO', '1.76E+12', 'PAPCAL01', '', '', 'ENSAMBLADO', 'NA', 'MESA 1', 'MESAS ALMACEN', '', 'CI5-3330 8GB WIN10 PRO 22H2 HDD 500GB', 'Pachuca', '', 1),
(100, 'PC ESCRITORIO', '9.4E+11', 'PAPCAL03', '', '', 'ENSAMBLADO', 'NA', 'MESA 3', 'MESAS ALMACEN', '', 'CI3-3220 16GB WIN10 PRO 22H2 HDD 500GB', 'Pachuca', '', 1),
(101, 'PC ESCRITORIO', '1.76E+12', 'PAPCAL04', '', '', 'ENSAMBLADA', 'NA', 'MESA 4', 'MESAS ALMACEN', '', 'CI3-7100 8GB WIN10 PRO 22H2 HDD ', 'Pachuca', '', 1),
(102, 'PC ESCRITORIO', '9.41E+11', 'PAPCAL05', '', '', 'ENSAMBLADA', 'NA', 'MESA 5', 'MESAS ALMACEN', '', 'CI5-3330 8GB WIN10 PRO HDD 500GB', 'Pachuca', '', 1),
(103, 'PC ESCRITORIO', '2.5E+11', 'PAPCAL06', '', '', 'ENSAMBLADO', 'NA', 'MESA 6', 'MESAS ALMACEN', '', 'CI5-3330 10GB WIN10 PRO 21h2  HDD 1TB', 'Pachuca', '', 1),
(104, 'PC ESCRITORIO', '9.4E+11', 'PAPCAL07', '', '', 'ENSAMBLAO', 'NA', 'MESA 7', 'MESAS ALMACEN', '', 'CI5-3340 8gb WIN10 PRO 22H2 HDD 500GB', 'Pachuca', '', 1),
(105, 'PC ESCRITORIO', '9.41E+11', 'PAPCAL08', '', '', 'ENSAMBLADO', 'NA', 'MESA 8', 'MESAS ALMACEN', '', 'CI5-4460 8GB WIN10 PRO 22H2 HDD 1TB', 'Pachuca', '', 1),
(106, 'PC ESCRITORIO', 'CBKN0M2', 'PAPCAL09', '', '', 'DELL', 'OPTIPLEX 3050', 'LAURA', 'PICKING', '', 'CI5-7500 8GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(107, 'PC ESCRITORIO', '9.4E+11', 'PAPCSC01', '', '', 'ENSAMBLADA ', 'ACTIVE COOL', 'MESA1', 'SURTIDO CEDIS', '', 'ci3-4170 8gb WIN10 PRO SSD 120GB', 'Pachuca', '', 1),
(108, 'PC ESCRITORIO', '9.4E+11', 'PAPCSC02', '', '', 'ENSAMBLADA', 'ACTIVE COOL', 'MESA2', 'SURTIDO CEDIS', '', 'Ci3-3220 8GB WIN10 PRO 22h2 SSD 120GB', 'Pachuca', '', 1),
(109, 'PC ESCRITORIO', '9.5E+11', 'PAPCSC03', '', '', 'ENSAMBLADA ', 'ACTIVE COOL', 'MESA3', 'SURTIDO CEDIS', '', 'Ci5-3330 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(110, 'PC ESCRITORIO', 'YGS02419091101507', 'PAPCSC04', '', '', 'GETTECH', 'ENSAMBLADO', 'MESA 4', 'SURTIDO CEDIS', '', 'Ci5-3330 8GB WIN10 PRO 22H2 SSD 120GB', 'Pachuca', '', 1),
(111, 'PC ESCRITORIO', '9.4E+11', 'PAPCSC05', '', '', 'ENSAMBLADA', 'ACTIVE COOL', 'MESA 5', 'SURTIDO CEDIS', '', 'Ci3-3220 4GB WIN10 PRO 22H2 SSD 120 GB', 'Pachuca', '', 1),
(112, 'PC ESCRITORIO', 'G15216330800185', 'PAPCSC06', '', '', 'ENSAMBLADA', 'QUARONI', 'MESA6', 'SURTIDO CEDIS', '', 'Ci5-4460 8gb win10 pro 21h1 hdd 500gb', 'Pachuca', '', 1),
(113, 'PC ESCRITORIO', '8CG9243BP4', 'PAPCSC07', '', '', 'HP', '280 g3', 'VICTOR HERNANDEZ GONZALEZ', 'SURTIDO CEDIS', '', 'Ci5-9500 8gb WIN10 PRO 22H2 240 GB', 'Pachuca', '', 1),
(114, 'PC ESCRITORIO', '2.34E+12', 'PAPCSC08', '', '', 'ENSAMBLADO', 'NA', 'NANCY KARINA REYES VALENCIA', 'SURTIDO CEDIS', '', 'CI5-4460 8GB WIN10 PRO 22H2 SSD 240GB', 'Pachuca', '', 1),
(115, 'PC ESCRITORIO', '9.4E+11', '', '', '', 'ensamblada ', 'na', 'Arturo almac?n ', 'ALMACEN AL FONDO', '', 'ci5-3330 8gb win10 pro 21h2 hdd 1tb', 'Pachuca', '', 1),
(116, 'PC ESCRITORIO', 'MXL4101J52', 'NA', '', '', 'HP', '600 G3 SFF', 'MESA 6', 'EQUIPO EN PRESTAMO', '', 'CI7-4770 8GB WIN10 PRO 22H2 1TB', 'Pachuca', '', 1),
(117, 'PC ESCRITORIO', '4CE208CZ5V', 'PAPCMI01', '', '', 'HP', '280 G5 SFF', 'SERVIDOR MYB MINERO', 'REFA MINERO', '', 'CI5-10505 8GB 512GB WIN10 PRO 22H2', 'Pachuca', '', 1),
(118, 'PC ESCRITORIO', '4CE227CPT2', 'PAPCMI02', '', '', 'HP', '280 G5 SFF', 'MOSTRADOR 1 MINERO', 'REFA MINERO', '', 'CI3-10105 8GB 256GB WIN10 PRO 22H2', 'Pachuca', '', 1),
(119, 'PC ESCRITORIO', '4CE227CPRJ', 'PAPCMI03', '', '', 'HP', '280 G5 SFF', 'MOSTRADOR 2 MINERO', 'REFA MINERO', '', 'CI3-10105 8GB 256GB WIN10 PRO 22H2', 'Pachuca', '', 1),
(120, 'PC ESCRITORIO', '', '', '', '', 'DELL', '', 'FACTURACION', 'REFA MINERO', '', '', 'Pachuca', '', 1),
(121, 'PC ESCRITORIO', '4CE208CZ9N', 'PAPCAC01', '', '', 'HP', '280 G5 SFF', 'SERVIDOR MYB ACTOPAN', 'REFA ACTOPAN', '', 'CI5-10505 8GB 512GB WIN10 PRO 22H2', 'Actopan', '', 1),
(122, 'PC ESCRITORIO', 'BZPW9R3', 'PAPCAC02', '', '', 'DELL', 'VOSTRO 3681', 'MOSTRADOR 1 ACTOPAN', 'REFA ACTOPAN', '', 'CI3-10105 8GB 256GB WIN10 PRO 22H2', 'Actopan', '', 1),
(123, 'PC ESCRITORIO', 'HZPW9R3', 'PAPCAC03', '', '', 'DELL', 'VOSTRO 3681', 'MOSTRADOR 2 ACTOPAN', 'REFA ACTOPAN', '', 'CI3-10105 8GB 256GB WIN10 PRO 22H2', 'Actopan', '', 1),
(124, 'PC ESCRITORIO', 'MJ08C5T7', 'PAPCAC04', '', '', 'LENOVO', 'TINY M720Q', 'FACTURACION ACTOPAN', 'REFA ACTOPAN', '', 'CI3-8100T 8GB 128GB WIN10 PRO 22H2', 'Actopan', '', 1),
(125, 'PC ESCRITORIO', '1.71E+12', '', '', '', 'ENSAMBLADO', 'NA', '', 'REFA ACTOPAN', '', 'CI3-7100 8GB 240GB WIN10 PRO 22H2', 'Actopan', '', 1),
(126, 'PC ESCRITORIO', '4CE208CZ1J', 'PAPCTU01', '', '', 'HP', '280 G5 SFF', 'SERVIDOR MYB TULANCINGO', 'REFA TULANCINGO', '', 'CI5-10505 8GB 512GB WIN10 PRO 22H2', 'Tulancingo', '', 1),
(127, 'PC ESCRITORIO', '50QW9R3', 'PAPCTU02', '', '', 'DELL', 'VOSTRO 3681', 'MOSTRADOR 1 TULANCINGO', 'REFA TULANCINGO', '', 'CI3-10105 8GB 256GB WIN10 PRO 22H2', 'Tulancingo', '', 1),
(128, 'PC ESCRITORIO', 'HWLW9R3', 'PAPCTU03', '', '', 'DELL', 'VOSTRO 3681', 'MOSTRADOR 2 TULANCINGO', 'REFA TULANCINGO', '', 'CI3-10105 8GB 256GB WIN10 PRO 22H2', 'Tulancingo', '', 1),
(129, 'PC ESCRITORIO', '9.4E+11', 'PAPCTU04', '', '', 'ENSAMBLADA', 'N', 'FACTURACION TULANCINGO', 'REFA TULANCINGO', '', 'CI5 8GB WIN10 PRO 22H2 240GB', 'Tulancingo', '', 1),
(130, 'PC ESCRITORIO', 'MXL2263SXG', 'SL-PC00001', '', '', 'HP', '400 G7', '', 'SAN LUIS POTOSI', '', 'CI3-10100 8GB 256GB WIN10 PRO 22H2', 'San Luis Potosi', '', 1),
(131, 'PC ESCRITORIO', 'MXL2263SYY', 'SL-PC00002', '', '', 'HP', '401 G7', '', 'SAN LUIS POTOSI', '', 'CI3-10100 8GB 256GB WIN10 PRO 22H2', 'San Luis Potosi', '', 1),
(132, 'PC ESCRITORIO', 'MXL24049JD', 'SL-PC00003', '', '', 'HP', '402 G7', '', 'SAN LUIS POTOSI', '', 'CI3-10100 8GB 256GB WIN10 PRO 22H2', 'San Luis Potosi', '', 1),
(133, 'PC ESCRITORIO', 'MXL2263TNK', 'SL-PC00004', '', '', 'HP', '403 G7', '', 'SAN LUIS POTOSI', '', 'CI3-10100 8GB 256GB WIN10 PRO 22H2', 'San Luis Potosi', '', 1),
(134, 'PC ESCRITORIO', 'MXL2263SWB', 'SL-PC00005', '', '', 'HP', '404 G7', '', 'SAN LUIS POTOSI', '', 'CI3-10100 8GB 256GB WIN10 PRO 22H2', 'San Luis Potosi', '', 1),
(135, 'PC ESCRITORIO', 'MXL2263T0G', 'SL-PC00006', '', '', 'HP', '405 G7', '', 'SAN LUIS POTOSI', '', 'CI3-10100 8GB 256GB WIN10 PRO 22H2', 'San Luis Potosi', '', 1),
(136, 'PC ESCRITORIO', '9.4E+11', 'CHPCGT01', '', '', 'ENSAMBLADO', 'NA', 'GERENTE CEDIS', 'CHIHUAHUA', '', 'CI5-4460 8GB 240GB WIN10 PRO 22H2', 'Chihuahua', '', 1),
(137, 'PC ESCRITORIO', '9.4E+11', 'CHPCCD02', '', '', 'ENSAMBLADO', 'NA', 'PIBOTE', 'CHIHUAHUA', '', 'CI5-440 8GB 240GB WIN10 PRO 22H2', 'Chihuahua', '', 1),
(138, 'PC ESCRITORIO', '9.4E+11', 'CHPCCD03', '', '', 'ENSAMBLADO', 'NA', 'ACTUAL FACTURACION, CARLOS URRUETA ALMEIDA', 'CHIHUAHUA', '', 'CI5-4460 8GB WIN10 PRO SSD 120GB(HP)', 'Chihuahua', '', 1),
(139, 'PC ESCRITORIO', '9.4E+11', 'CHPCCD04', '', '', 'ENSAMBLADO', 'NA', 'ALMACEN, ENCARGADO ALEXANDER QUINTANA', 'CHIHUAHUA', '', 'CI5-4460 8GB WIN10 PRO 22H2 SSD 120GB (HP)', 'Chihuahua', '', 1),
(140, 'PC ESCRITORIO', '8CG9240K31', '', '', '', 'HP', '280 G3', 'ALMACEN, MESA', 'CHIHUAHUA', '', 'CI5-9500 4GB WIN 11 PRO HDD 1TB', 'Chihuahua', '', 1),
(141, 'PC ESCRITORIO', '4CE234B1NG', 'ME-PC00001', '', '', 'HP', '280 G5 SFF', '', '', '', 'CI3-10105 8GB WIN10 PRO 22H2 SSD 256GB', '', '', 1),
(142, 'PC ESCRITORIO', '4CE230BZK3', 'VHPCGC01', '', '', 'HP', '280 G5 SFF', 'GERENTE CEDIS', 'VILLAHERMOSA', '', 'CI3-10105 8GB WIN10 PRO 22H2 SSD 256GB', 'Villahermosa', '', 1),
(143, 'PC ESCRITORIO', 'MXL32841QL', 'MTPCCD01', '', '', 'HP', '400 G7 SFF', 'GERENTE CARLOS ALBERTO CABRERA PINEDA', 'MONTERREY', '', 'CI3-10100 8GB WIN11 PRO 22H2 SSD 256GB', 'Monterrey', '', 1),
(144, 'PC ESCRITORIO', 'MXL32841QF', 'MTPCCD02', '', '', 'HP', '400 G7 SFF', 'LIDER DE ALMACEN - JESSICA BERENICE DORIA URBINA', 'MONTERREY', '', 'CI3-10100 8GB WIN11 PRO 22H2 SSD 256GB', 'Monterrey', '', 1),
(145, 'PC ESCRITORIO', '8CG92215HK', 'MTPCCD03', '', '', 'HP', '280 G3', 'FACTURACION-VANESA DURAN', 'MONTERREY', '', 'CI3-810 12 GB WIN10 22H2 SSD 120GB', 'Monterrey', '', 1),
(146, 'PC ESCRITORIO', '01268-7660701159', '', '', '', 'QUARONI', 'QCMT-05', '', 'PUEBLA', '', 'PENTIUM G2010 8GB WIN10 PRO 22H2 SSD 120GB', 'Puebla', '', 1),
(147, 'PC ESCRITORIO', '8CG9240K08', 'LEPCTL01', '', '', 'HP', '280 G3 SFF', 'TELEMARKETING, CRISTIAN GIOVANY MOERNO', 'LEON', '', 'CI5-9500 4GB WIN 10 PRO 22H2 SDD 140 GB', 'Leon', '', 1),
(148, 'PC ESCRITORIO', '', '', '', '', 'DELL', 'VOSTRO 3681', 'TELEMARKETING, CRISTIAN ANTONIO NEGRETE', 'LEON', '', 'CI3-10100 4GB WIN 11 HOME 21H2 HDD 1TB', 'Leon', '', 1),
(149, 'PC ESCRITORIO', '8CG92215DW', '', '', '', 'HP ', '280 G3 SFF', 'JEFE MESA 1', 'LEON', '', 'CI3-8100 4GB WIN 11 PRO 22H2  HDD 1TB', 'Leon', '', 1),
(150, 'PC ESCRITORIO', '8CG92215FS', '', '', '', 'HP', '280 G3 SFF', 'JEFE DE RECIBO', 'LEON', '', 'CI3-8100 4GB WIN 10 PRO 21H1  HDD 1TB', 'Leon', '', 1),
(151, 'PC ESCRITORIO', '8CG92215C8', '', '', '', 'HP', '280 G3 SFF', 'JEFE DE PISO 2, GUILLERMO', 'LEON', '', 'CI3-8100 4GB WIN 11 PRO 22H2  SSD 120GB ADATA :(', 'Leon', '', 1),
(152, 'PC ESCRITORIO', '', '', '', '', 'ENSAMBLADO', 'NA', 'LIDER DE ALMACEN, HORACIO SALVADOR', 'LEON', '', 'PENTIUM G2010 8GB WIN 10 PRO MINIOS 21H2 HDD 500GB', 'Leon', '', 1),
(153, 'PC ESCRITORIO', '', '', '', '', 'ENSAMBLADA', 'NA', 'FACTURACION', 'LEON', '', 'CI3-4150 8GB WIN 10 PRO 22H2 HDD 1TB', 'Leon', '', 1),
(154, 'PC ESCRITORIO', '', '', '', '', 'ENSAMBLADO', 'NA', 'GERENTE', 'LEON', '', 'CI7-3770 8GB WINDOWS 7 HDD 1TB', 'Leon', '', 1),
(155, 'PC ESCRITORIO', '7ST6B12', 'TGPCCD02', '', '', 'DELL', 'OPTIPLEX 3020', 'FACTURACION', 'TUXTLA', '', 'CI5-4590 8GB WIN10 PRO 22H2 SSD 120GB', 'Tuxtla', '', 1),
(156, 'PC ESCRITORIO', '8CG9243BPT', 'QRPCCD01', '', '', 'HP', '280 G3 SFF', 'JEFE ALMACEN CARLOS', 'QUERETARO', '', 'CI5-9500 4GB WIN10 PRO 22H2 SSD 240GB (HP)', 'Queretaro', '', 1),
(157, 'PC ESCRITORIO', '9.4E+12', 'HRPCCD01', '', '', 'ENSMBLADO', 'NA', '', 'HERMOSILLO', '', 'CI3-3220 16GB WIN10 PRO 22H2 SSD 120GB (ADATA)', 'Hermosillo', '', 1),
(158, 'PC ESCRITORIO', '8CG94210WH', 'CAPCCD01', '', '', 'HP', '280 G3', 'DANIEL DE JESUS  MARTINEZ PEREZ', 'CANCUN', '', 'Ci3-9100 8GB WIN10 PRO 22H2 SSD 240 GB HP ', 'Cancun', '', 1),
(159, 'PC ESCRITORIO', '8CG946334R', 'CAPCCD02', '', '', 'HP', '280 G3', 'KIMBERLY GUADALUPE ZU?IGA MORALES', 'CANCUN', '', 'Ci3-9100 4GB WIN10 PRO 22H2 SSD 120 GB HP ', 'Cancun', '', 1),
(165, 'Equipo', 'Numero de Serie', 'Clave', 'Estado', 'Procedimiento', 'Marca', 'Modelo', 'Usuario', 'Area', 'Responsiva', 'Especificaciones', 'Cedis', 'Comentarios y Observaciones', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_switch_aps`
--

CREATE TABLE `form_switch_aps` (
  `Id` int(100) NOT NULL,
  `numero_serie` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `area` varchar(200) DEFAULT NULL,
  `cedis` varchar(200) NOT NULL,
  `comentarios_observaciones` varchar(200) NOT NULL,
  `status` int(100) NOT NULL COMMENT '0 baja\r\n1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form_switch_aps`
--

INSERT INTO `form_switch_aps` (`Id`, `numero_serie`, `clave`, `equipo`, `estado`, `proceso`, `marca`, `modelo`, `usuario`, `area`, `cedis`, `comentarios_observaciones`, `status`) VALUES
(1, '22271L1006316', 'SLAPSL01', 'ACCESS POINT', '', '', 'TP-LINK', 'EAP245', 'SAN LUIS POTOSI', 'SAN LUIS POTOSI', 'SAN LUIS POTOSI', '', 1),
(2, '22271L1006228', 'SLAPSL02', 'ACCESS POINT', '', '', 'TP-LINK', 'EAP245', 'SAN LUIS POTOSI', 'SAN LUIS POTOSI', 'SAN LUIS POTOSI', '', 1),
(3, '2199778001914', 'CAAPCA03', 'ACCESS POINT', 'NUEVO', '', 'TPLINK', 'EAP245', 'CANCUN', 'CANCUN', 'CANCUN', '', 1),
(4, '2198854000040', 'CAAPCA04', 'ACCESS POINT', 'NUEVO', '', 'TPLINK', 'EAP246', 'CANCUN', 'CANCUN', 'CANCUN', '', 1),
(5, '2201229001155', 'OXAPOX05', 'ACCESS POINT', 'NUEVO', '', 'TPLINK', 'EAP245', 'OAXACA', 'OAXACA', 'OAXACA', '', 1),
(6, '219CA07000856', 'OXAPOX06', 'ACCESS POINT', 'NUEVO', '', 'TPLINK', 'EAP245', 'OAXACA', 'OAXACA', 'OAXACA', '', 1),
(7, '22294A9001385', 'SLSWSL01', 'SWITCH', '', '', 'TP-LINK', 'TL-SG1024(UN)', 'SAN LUIS POTOSI', 'SAN LUIS POTOSI', 'SAN LUIS POTOSI', '', 1),
(8, '13100507962', 'PASWSL02', 'SWITCH', '', '', 'TPLINK', 'TL-SF1008D', 'INVENTARIOS', 'INVENTARIOS', 'PACHUCA', '', 1),
(9, '', 'MRSWME03', 'SWITCH', '', '', '', '', 'MERIDA', 'MERIDA', 'MERIDA', '', 1),
(10, '', 'TGSWTG04', 'SWITCH', '', '', 'INTELLINET', 'CAT.E5', 'TUXTLA', 'TUXTLA', 'TUXTLA', '', 1),
(11, '', 'TGSWTG05', 'SWITCH', '', '', 'TP-LINK', 'TL-SG1024D', 'TUXTLA', 'TUXTLA', 'TUXTLA', '', 1),
(12, '', 'PASWBO06', 'SWITCH', '', '', 'TPLINK', 'TL-SG10050', 'BODEGA3', 'BODEGA3', 'PACHUCA', '', 1),
(13, '', 'PASWBO07', 'SWITCH', '', '', 'TRENDNET', 'TFC-1000MFC', 'BODEGA3', 'BODEGA3', 'PACHUCA', '', 1),
(14, 'B-UPR505', 'PASWBO08', 'SWITCH', '', '', 'NETGEAR', 'COPSH110730-002355', 'BODEGA3', 'BODEGA3', 'PACHUCA', '', 1),
(15, 'q2cx\'8zd7\'juwd', 'PASWBO09', 'SWITCH', 'NUEVO', '', 'MERAKI', 'MS120-8FP', 'BODEGA3', 'BODEGA3', 'PACHUCA', '', 1),
(16, 'q2cx\'8y7f\'klh7', 'SLSWBO10', 'SWITCH', 'NUEVO', '', 'MERAKI', 'MS120-8FP', 'BODEGA4', 'BODEGA4', 'PACHUCA', '', 1),
(17, '1730502106', 'SLSWCA11', 'SWITCH', 'NUEVO', '', 'TP-LINK', 'TL-SG1024', 'CANCUN', 'CANCUN', 'CANCUN', '', 1),
(18, 'CN34BT30FQ', 'SLSWAL12', 'SWITCH', 'REGULAR', '', 'ANATEL', 'JD858A', 'MESAS CEDIS', 'ALMACEN', 'PACHUCA', '', 1),
(19, '22030f6000004', 'SLSWCV13', 'SWITCH', 'NUEVO', '', 'TP-LINK', 'TL-SG1024D', 'CUERNAVACA ', 'CUERVAVACA', 'CUERVAVACA', '', 1),
(20, '22072Y4000944', 'SLSWOX14', 'SWITCH', 'NUEVO', '', 'TP-LINK', 'TL-SG1024D', 'SITE', 'OAXACA', 'OAXACA', '', 1),
(21, 'CN19GVH19T', 'SLSWVH15', 'SWITCH', 'NUEVO', '', 'HP', 'JH017A', 'VILLAHERMOSA', 'VILLAHERMOSA', 'VILLAHERMOSA', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `password`) VALUES
(32, 'Jonathan', '$2y$10$Pz4xiZW.w4KQW/6O0C0ZKezeFiIYHb7t7ByvaQuSWSioUEX9GAPFC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `form_dde`
--
ALTER TABLE `form_dde`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `form_hh`
--
ALTER TABLE `form_hh`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `form_impresora`
--
ALTER TABLE `form_impresora`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `form_laptop`
--
ALTER TABLE `form_laptop`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `form_monitor`
--
ALTER TABLE `form_monitor`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `form_nobreak`
--
ALTER TABLE `form_nobreak`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `form_pantalla`
--
ALTER TABLE `form_pantalla`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `form_pc`
--
ALTER TABLE `form_pc`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `form_switch_aps`
--
ALTER TABLE `form_switch_aps`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `form_dde`
--
ALTER TABLE `form_dde`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `form_hh`
--
ALTER TABLE `form_hh`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `form_impresora`
--
ALTER TABLE `form_impresora`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `form_laptop`
--
ALTER TABLE `form_laptop`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `form_monitor`
--
ALTER TABLE `form_monitor`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de la tabla `form_nobreak`
--
ALTER TABLE `form_nobreak`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `form_pantalla`
--
ALTER TABLE `form_pantalla`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `form_pc`
--
ALTER TABLE `form_pc`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT de la tabla `form_switch_aps`
--
ALTER TABLE `form_switch_aps`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
