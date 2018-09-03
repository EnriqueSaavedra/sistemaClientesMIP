-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2018 a las 14:09:08
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `podologiamip_pacientes`
--
CREATE DATABASE IF NOT EXISTS `podologiamip_pacientes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `podologiamip_pacientes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `paciente_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `podologo` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(1, 1, 1, '', 25000, '2018-08-17 01:17:21', 2, NULL);
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(45, 9, 2, '', 10000, '2018-08-17 01:19:17', 2, NULL);
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(59, 9, 3, '', 10000, '2018-08-17 03:10:28', 2, NULL);
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(72, 9, 4, '', 10000, '2018-08-17 21:58:39', 2, NULL);
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(1, 1, 5, 'prueba', 25000, '2018-08-20 03:00:00', 2, '2018-08-20');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(81, 1, 6, '22-08-18 pte HTA/ DM presenta onicofrifosis', 10, '2018-08-22 19:06:13', 2, '2018-08-22');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(83, 1, 7, '22-08-18 pte con hiperqueratisis antero y retro plantar onicomicosis en todas sus uÃ±as tto acido', 20, '2018-08-22 23:41:45', 2, '2018-08-22');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(84, 1, 8, '23/08/18 se realiza limpieza de surcos, onicotomia, resecado en 1er ortejo de ambos pies.', 10, '2018-08-23 18:35:48', 2, '2018-08-23');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(95, 9, 9, '', 10000, '2018-08-24 00:28:11', 2, '2018-08-23');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(96, 9, 10, '', 10000, '2018-08-24 01:02:03', 2, '2018-08-23');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(99, 1, 11, '28/08/2018 pte atendido por verruga plantar...se quema con electrocauterizador', 50000, '2018-08-29 20:03:41', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(100, 1, 12, '01/08/2018...pte con molestias en los surcos( onicofosis)', 10, '2018-08-29 20:09:07', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(101, 1, 13, '29/08/2018 pte que presenta onicomicosis', 10, '2018-08-29 21:27:34', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(102, 1, 14, '29/08/2018 pte con onicocriptosis leve en 1 ortejo pie derecho se cita a curacion en 48 horas', 20, '2018-08-30 00:45:29', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(103, 1, 15, '28/08/2018 pte presenta lamina involuta heloma marginal en ambos ortejos heloma miliar en ambos pies en zona antero plantar \r\nse realiza atencion normal', 10000, '2018-08-30 00:52:37', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(104, 9, 16, '', 10000, '2018-08-30 01:04:42', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(104, 1, 17, '29/08/18 pte se realiza atencion normal', 10, '2018-08-30 01:49:46', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(105, 9, 18, '29/08/2019  atencion normal ', 10000, '2018-08-30 01:54:28', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(106, 9, 19, '28/08/2018 Pte con hiperqueratosis retro y antero plantar heloma marginal en ambos ortejos', 10000, '2018-08-30 02:03:10', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(107, 9, 20, '27/08/2018 pte con hiperqueratosis antero plantar y 1 ortejo heloma marginal  en 5 ortejo pie isquierdo', 10000, '2018-08-30 02:06:19', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(108, 9, 21, '27/08/2018 pte con queratosis antero plantar y onicofosis en 1 ortejo pie derecho', 10000, '2018-08-30 02:10:42', 2, '2018-08-29');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(121, 9, 22, '', 10000, '2018-08-30 20:37:16', 2, '2018-08-30');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(58, 9, 23, '', 10000, '2018-08-30 21:40:33', 2, '2018-08-30');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(122, 9, 24, '', 10000, '2018-08-30 21:45:24', 2, '2018-08-30');
INSERT INTO `atencion` (`paciente_id`, `servicio_id`, `numero`, `descripcion`, `precio`, `fecha`, `podologo`, `fecha_registro`) VALUES(114, 16, 25, '', 20, '2018-08-30 23:09:18', 2, '2018-08-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_usuario`
--

CREATE TABLE `grupo_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_usuario`
--

INSERT INTO `grupo_usuario` (`id`, `nombre`, `descripcion`) VALUES(1, 'Podologo', NULL);
INSERT INTO `grupo_usuario` (`id`, `nombre`, `descripcion`) VALUES(2, 'Administrador', NULL);
INSERT INTO `grupo_usuario` (`id`, `nombre`, `descripcion`) VALUES(3, 'Agente', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `rut` varchar(50) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `numero_calle` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(1, '71369218', 'Elisa Cifuentes Cifuentes', '1946-06-20', 983566815, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'RamÃ³n Barros Luco', 4010);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(2, '18247021k', 'Enrique Saavedra', '1992-10-13', 951048774, 'enrique.saavedra.perez@gmail.com', 'RegiÃ³n Metropolitana', 'San Bernardo', 'Baquedano', 939);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(3, '57848502', 'Sara Salazar Torres', '1950-12-18', 979661311, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Gran Avenida Jose Miguel Carrera', 4310);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(4, '60042993', 'Carlos Quiroz Jara', '1952-09-07', 971351902, NULL, 'RegiÃ³n Metropolitana', 'Pedro Aguirre Cerda', 'Paulina Verdugo', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(5, '80408900', 'Victoria Quiroz Mayorga', '1959-09-17', 992994420, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Bartolo Soto', 3610);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(6, '174639310', 'Nicole Plaza Arriagada', '1999-06-10', 953727027, NULL, 'RegiÃ³n Metropolitana', 'La Florida', 'Nueva MarÃ­a Angelica', 6437);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(7, '199485725', 'Carla VicuÃ±a', '2018-08-14', 987940376, NULL, 'RegiÃ³n Metropolitana', 'Las Condes', 'TomÃ¡s Moro', 569);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(8, '44627256', 'Teresa Hernandez', '1939-05-28', 225232795, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(9, '9613567k', 'Carmen Puentes Opazo ', '2018-08-14', 88472471, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'San NicolÃ¡s', 1451);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(10, '167448550', 'Camilo Cespedes OyarzÃºn', '1987-11-20', 993516670, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Fernando Lazcano', 1249);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(11, '113613548', 'Yasna DÃ­az Baeza', '1969-02-27', 224011405, NULL, 'RegiÃ³n Metropolitana', NULL, 'AnÃ­bal ZaÃ±artu', 8148);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(12, '60667497', 'Olga Araya GonzÃ¡les', '1952-04-09', 998785747, NULL, 'RegiÃ³n Metropolitana', 'Pedro Aguirre Cerda', 'Club HÃ­pico', 2852);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(13, '241832295', 'Emilia GonzÃ¡lez Araya', '2013-02-02', 957184108, NULL, 'RegiÃ³n Metropolitana', 'San JoaquÃ­n', 'Avenida Santa Rosa', 2668);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(14, '173706928', 'Macarena Araya Alvarez ', '1989-08-17', 957184108, NULL, 'RegiÃ³n Metropolitana', 'San JoaquÃ­n', 'Avenida Santa Rosa', 2668);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(15, '63805106', 'Violeta DurÃ¡n Valenzuela ', '1953-06-20', 227086880, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(16, '154197397', 'Jeanette Campos Barrios', '1982-02-13', 82309703, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Gaspar Banda', 3630);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(17, '246444633', 'CristiÃ¡n Godoy Santander', '2014-06-06', 225794533, NULL, 'RegiÃ³n Metropolitana', 'La Florida', 'Troncal San Francisco', 1073);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(18, '139426738', 'Norman Milanesi Sonn', '2018-08-14', 998124578, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Santa MarÃ­a', 8434);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(19, '13274808k', 'Alejandra Santander SanchÃ©z ', '1976-10-10', 225794533, NULL, 'RegiÃ³n Metropolitana', 'La Florida', 'Troncal San Francisco', 1073);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(20, '40453261', 'Aida Reyes Dominguez', '1934-08-01', NULL, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'RamÃ³n Barros Luco', 4010);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(21, '4817518k', 'Rolando Sanchez AcuÃ±a', '1942-04-25', NULL, NULL, 'RegiÃ³n Metropolitana', NULL, 'Paseo del CrepÃºsculo', 1225);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(22, '256692546', 'Yasmile Higueras', '2018-08-16', 979718755, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Pedro Aguirre Cerda', 256);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(23, '132649677', 'Carla Segobia', '2018-08-16', 940094402, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Arcadia', 1567);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(24, '155345241', 'Claudia Garcia', '2018-08-16', 944595161, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Bartolo Soto', 3700);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(25, '75423314', 'Beatriz Fernandez', '2018-08-16', 229963129, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Actor BÃ¡guena', 3575);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(26, '43354248', 'Danila Ghigliotto', '2018-08-16', 225224946, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Gran Avenida Jose Miguel Carrera', 5217);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(27, '65561212', 'Isabel Riquelme Arriagada', '2018-08-16', 993309065, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Dos Oriente', 8582);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(28, '120302701', 'Valentina Galves Barrasa', '2018-08-16', 982325061, NULL, 'RegiÃ³n Metropolitana', 'Pedro Aguirre Cerda', 'Paseo Grohnert', 5525);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(29, '50540472', 'Fernando Martinez Molina', '2018-08-16', 225559774, NULL, 'RegiÃ³n Metropolitana', 'Santiago', 'San Antonio', 855);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(30, '77932593', 'Sonia RÃ­os Guajardo', '2018-08-16', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(31, '102952219', 'Camila Gomez Lorca', '2018-08-16', 991241950, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'JosÃ© JoaquÃ­n Vallejos', 1294);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(32, '202416780', 'Catalina Matus Lastra', '2018-08-16', 954955686, NULL, 'RegiÃ³n Metropolitana', NULL, 'Lanzarote', 1651);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(33, '200433866', 'Diego Ahumada ', '2018-08-16', 990960047, NULL, 'RegiÃ³n Metropolitana', 'Puente Alto', 'Avenida Jorge Ross Ossa', 899);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(34, '9673848k', 'Ana MarÃ­a GonzÃ¡les ', '2018-08-16', 967323834, NULL, 'RegiÃ³n Metropolitana', NULL, 'Riquelme', 1140);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(35, '71594009', 'German Quezada DÃ­az', '2018-08-16', 994778177, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'LeÃ³n Prado', 510);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(36, '60509166', 'Carmen Pardo Pizarro', '2018-08-16', 993696226, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'San NicolÃ¡s', 1451);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(37, '74783872', 'Romi Silva Romo', '2018-08-16', 992518993, NULL, 'RegiÃ³n Metropolitana', 'Las Condes', 'Noruega', 6650);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(38, '130358780', 'Patricia Canales', '2018-08-16', 998649980, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Bartolo Soto', 3700);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(39, '5975193k', 'Hortencia Castro', '2018-08-16', 942526351, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Santa Ester', 778);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(40, '181003871', 'Masiel Quevedo Fernandez', '2018-08-16', 979754014, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Argentina', 9056);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(41, '3486778k', 'Gillermina Caballero', '2018-08-16', 950409322, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Avenida FernÃ¡ndez Albano', 7337);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(42, '162806238', 'NicolÃ¡s Vegas', '2018-08-16', 963396662, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(43, '15866626k', 'Sergio Ulloa ', '1984-11-07', 963085827, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'San NicolÃ¡s', 1320);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(44, '167090761', 'Nicole Letelier Zamora', '2018-08-16', 951098360, NULL, 'RegiÃ³n Metropolitana', 'Santiago', 'Blanco Encalada', 1797);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(45, '130471870', 'Alejandra Becerra Elvea', '1976-03-08', 968455450, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Ricardo Morales', 2994);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(46, '70627299', 'MarÃ­a Rubio', '2018-08-16', 996436250, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Ãngel BurgueÃ±o', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(47, '186683587', 'Javiera LeÃ³n Laguela', '2018-08-16', 940175494, NULL, 'RegiÃ³n Metropolitana', 'MaipÃº', 'Lonconao', 1421);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(48, '164536033', 'Paulina Verdugo Tobar', '2018-08-16', 963937769, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Brigadier de La Cruz', 980);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(49, '157633430', 'Karla Quiroz Olguin', '2018-08-16', 982588838, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Avenida FernÃ¡ndez Albano', 161);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(50, '86964988', 'Patricia Ulloa Berrios', '2018-08-16', 997790221, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(51, '137123746', 'Leyla Baeza Rivas', '2018-08-16', 991397647, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(52, '704089007', 'Alexis Riquelme Jimenez', '2018-08-16', 994030065, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'CuriÃ±anca', 989);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(53, '21351251k', 'David Villalobos ', '2018-08-16', 998758006, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Avenida Salesianos', 961);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(54, '40939881', 'Raquel  Briones Aguilar ', '2018-08-16', 228915794, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Rey Alberto', 3651);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(55, '58187887', 'Onesimo SepÃºlveda Soliz', '1948-09-19', 995322144, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Dos Oriente', 8582);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(56, '52765137', 'Maria Angelica Coloma Bustos', '2018-08-16', 985559758, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Rey Alberto', 3661);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(57, '41223154', 'MarÃ­a Otilia Poblete Flores ', '2018-08-16', 982343513, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Gaspar Banda', 3630);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(58, '68448778', 'Adriana del Pilar PÃ©rez Herrera', '2018-08-16', 962280974, NULL, 'RegiÃ³n Metropolitana', 'Pedro Aguirre Cerda', 'Enrique Matte', 1748);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(59, '65098334', 'MarÃ­a Teresa Caceres Albornoz', '1954-01-16', 94259505, NULL, 'RegiÃ³n Metropolitana', 'MaipÃº', 'El Viento', 3866);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(60, '176004630', 'Josefina Cabeza Villalobos', '1990-10-06', 933165152, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Gaspar Banda', 3630);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(61, '76842329', 'Lidia Vasquez Valenzuela', '2018-08-17', 987575262, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Llano Subercaseaux', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(62, '86692694', 'Oscar Gonzales Rojas', '2018-08-17', 998483423, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Cuarta Avenida', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(63, '53268978', 'Borika Rosales Orellana', '1945-06-13', 998049726, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(64, '96121458', 'Teresa de las Merceddes Laguela Soto', '2018-08-17', 974521187, NULL, 'RegiÃ³n Metropolitana', 'MaipÃº', 'Lonconao', 1421);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(65, '61377298', 'Rosa Oyarzun Fuentes', '2018-08-17', 992359374, NULL, 'RegiÃ³n Metropolitana', 'San Bernardo', 'Avenida OchagavÃ­a', 13134);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(66, '18532740k', 'Braulio Arqueros Rios ', '2018-08-17', 952177250, NULL, 'RegiÃ³n Metropolitana', 'Pedro Aguirre Cerda', 'Pasaje E', 5172);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(67, '182106615', 'Gabriela Ercilla Villafranca', '2018-08-17', 978698201, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'ChiloÃ©', 5071);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(68, '23085887', 'Jose Osvaldo Contretas Gomez', '2018-08-17', 987102447, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(69, '94843324', 'Gilda Soledad Vial Roriguez', '2018-08-17', 987312007, NULL, 'RegiÃ³n Metropolitana', 'Lo Espejo', 'PuchuncavÃ­', 6847);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(70, '26277533k', 'Daniel Perez Sanchez', '2018-08-17', 953069168, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Avenida Lo Ovalle', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(71, '53160972', 'Isabel Gonzalez Balbontin', '2018-08-17', 947059865, NULL, 'RegiÃ³n Metropolitana', 'San Bernardo', 'Camino Padre Hurtado', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(72, '99600020', 'Aneglica Uribe Ramos', '1965-02-04', 984299694, NULL, 'RegiÃ³n Metropolitana', 'Pedro Aguirre Cerda', 'UniÃ³n Ferroviaria', 3905);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(73, '218560261', 'Benjamin Echeverria Parada', '2005-05-24', 974146263, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'RamÃ³n Barros Luco', 4010);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(74, '100889846', 'Karen villafranca', '1965-06-10', 94922341, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'ChiloÃ©', 5071);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(75, '260333585', 'araceli fernandez vasquez', '1961-10-10', 940876498, NULL, 'RegiÃ³n Metropolitana', 'Santiago', 'Lord Cochrane', 184);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(76, '68404231', 'maria ines santander vallejos', '1947-12-16', 944562647, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Fernando Lazcano', 1240);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(77, '141730711', 'Rosa Parada Cifuentes', '1981-04-15', 983566815, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'RamÃ³n Barros Luco', 4010);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(78, '29771227', 'Elena Becerra Silva', '1934-12-01', 995403021, NULL, 'RegiÃ³n Metropolitana', 'Pedro Aguirre Cerda', 'Anacreonte', 4677);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(79, '162444662', 'Cristian GonzÃ¡lez PÃ©rez', '1985-09-11', 990783421, NULL, 'RegiÃ³n Metropolitana', 'Santiago', 'Avenida Portugal', 810);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(80, '51938887', 'Juan Delard de Rigoulieres', '1948-01-03', 998275460, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Llano Subercaseaux', 3747);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(81, '25984358', 'Sergio Rueda Atol', '1933-02-24', 995047377, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Ana Luisa', 1171);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(82, '58617873', 'Mimi Uribarri Garcia', '1951-05-14', 997337904, NULL, 'RegiÃ³n Metropolitana', 'Ã‘uÃ±oa', 'Presidente Madero', 390);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(83, '67541499', 'Margarita Vergara Bruna', '1956-02-28', 989063162, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Ãngel Guarello', 1541);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(84, '172712711', 'Fanny Rosales Villaroel', '1990-01-16', 962071660, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Alcalde Pedro AlarcÃ³n', 875);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(85, '56140883', 'Eduardo Gregorio Huerta Pasten', '1946-01-05', 997691355, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Brigadier de La Cruz', 1076);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(86, '91626713', 'Nancy Victoria Grossling Leal', '2018-08-23', 957087385, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Rey Alberto', 4077);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(87, '123547373', 'Eduardo Alejandro Aguilera Cancino', '2018-08-23', 965088662, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Gran Avenida Jose Miguel Carrera', 245);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(88, '166530741', 'Claudia de los Ãngeles Vasquez Rojas', '2018-08-23', 985917712, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Avenida Salesianos', 1166);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(89, '71360075', 'Rosario Alicia Barros Moreno', '2018-08-23', 984094687, NULL, 'RegiÃ³n Metropolitana', 'Lo Espejo', 'Veracruz', 5286);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(90, '203393415', 'Elizabeth Trinidad AlarcÃ³n Puentes', '2018-08-23', 993950540, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'El Cairo', 762);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(91, '93867475', 'Teresa del Carmen Riveros Vargas', '2018-08-23', 994030065, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'CuriÃ±anca', 989);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(92, '192154499', 'Fernando Esteban LigueÃ±o Avalos', '2018-08-23', 97520065, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'El Cairo', 762);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(93, '87736946', 'Mario Segundo Laines Ibarra', '2018-08-23', 991655481, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'BerlÃ­n', 1034);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(94, '93677862', 'Salvador Enrique Jalilie Baeza', '2018-08-23', 998855089, NULL, 'RegiÃ³n Metropolitana', 'Penaflor', 'Arturo Alessandri', 95);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(95, '101729931', 'Laura Garrido Jeria ', '1966-09-30', 2147483647, NULL, 'RegiÃ³n Metropolitana', 'San Bernardo', 'Gran Avenida Jose Miguel Carrera', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(96, '260819496', 'Carol Rosales Leal', '1996-08-22', 967412550, NULL, 'RegiÃ³n Metropolitana', 'Santiago', 'Carmen', 368);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(97, '161248274', 'Karina Acevedo AlarcÃ³n', '1987-08-10', 986693584, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Locarno', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(98, '68763401', 'Virginia Campos Montecinos', '1951-12-14', 990793049, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'JosÃ© JoaquÃ­n Vallejos', 1294);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(99, '188302556', 'Javier Rosales Parreaguez', '1993-04-14', 991568261, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Avenida Salesianos', 1290);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(100, '87144623', 'Carla Ruiz Oyarce', '2018-08-29', 992932247, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Calle San Ignacio de Loyola', 3756);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(101, '37489476', 'Rosa Salazar Herrera', '1934-08-02', NULL, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'ChiloÃ©', 3879);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(102, '173132662', 'Manuel Sepulveda Gallardo', '1989-06-19', 2147483647, NULL, 'RegiÃ³n Metropolitana', 'San JoaquÃ­n', 'Pasaje Benozzo Gozzoli', 4856);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(103, '105019025', 'Patricia Cartagena Garrido', '1965-10-27', 95166589, NULL, 'RegiÃ³n Metropolitana', NULL, 'Paseo de La Alborada', 1971);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(104, '34660336', 'Aida Axtell Mackenzie', '1940-06-14', 994514688, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Teresa Vial', 1238);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(105, '56109099', 'Judith Medina Duran', '1947-10-26', 997104364, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'ChiloÃ©', 3950);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(106, '130828477', 'Veronica Narvaez Riveros', '1976-06-03', NULL, NULL, 'RegiÃ³n Metropolitana', 'Penaflor', 'Felipe Becerra Fuentes', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(107, '101257983', 'Cecilia Morales Oliva', '1963-06-20', 99189982, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Florencia', 1144);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(108, '11860234k', 'Eduardo Villagra Pozo', '1971-11-14', 95450570, NULL, 'RegiÃ³n Metropolitana', 'Renca', 'Pasionarias', 3929);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(109, '59245562', 'Francisco Masferrer Feliu ', '1947-09-11', 224593423, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Llano Subercaseaux', 3747);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(110, '79320447', 'Patricia Orelllana Oteiza ', '1958-03-04', 95026763, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Bartolo Soto', 4026);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(111, '65501678', 'JosÃ© GonzÃ¡les Puentes', '1953-11-28', 935294681, NULL, 'RegiÃ³n Metropolitana', 'San JoaquÃ­n', 'Cabildo', 3547);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(112, '42687731', 'Eugenia Melendez Vidal', '1926-11-23', 949623955, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'San Lorenzo', 771);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(113, '91440733', 'Gloria Arenas Menendez ', '1962-12-21', 949623955, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'San Lorenzo', 771);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(114, '74783864', 'Nancy Silva Romo', '2018-08-30', 984394798, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Pedro Mira', 927);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(115, '201478952', 'Felipe Alvarez Vargas', '1999-10-09', 966528036, NULL, 'RegiÃ³n Metropolitana', 'San JoaquÃ­n', 'Manuel Plaza', 192);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(116, '187637732', 'Nancy Spanos Campos', '2018-08-30', 985488488, NULL, 'RegiÃ³n Metropolitana', 'Pedro Aguirre Cerda', 'Aurelio', 5532);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(117, '47537010', 'MarÃ­a Gabriela Uribarri Garcia', '1944-04-28', 99411079, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Bartolo Soto', 3721);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(118, '85343343', 'Maritza Elisa Cuevas MuÃ±oz ', '2018-08-30', 981546554, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'La Marina', 1150);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(119, '41207728', 'Ana del Carmen DÃ­az PÃ©rez', '2018-08-30', NULL, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Ginebra', 442);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(120, '56204490', 'Octavio Oltra SanmartÃ­n ', '2018-08-30', 99812943, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'JosÃ© JoaquÃ­n Vallejos', 1457);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(121, '153953422', 'Susana Ramirez Henriquez ', '1982-02-01', 62237033, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Gran Avenida Jose Miguel Carrera', 5620);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(122, '22706952k', 'Marliene Medrado Olarte', '1965-08-23', 97820955, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'Florencia', 1200);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(123, '74389120', 'Lilia Obaid Babadilla', '1955-06-25', 987227384, NULL, 'RegiÃ³n Metropolitana', 'San Miguel', 'CuriÃ±anca', 774);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(124, '114092819', 'Gloria Gacitua Saavedra', '1969-10-18', 82269779, NULL, 'RegiÃ³n Metropolitana', 'Ã‘uÃ±oa', 'Manuel de Salas', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(125, '89088151', 'Laura Albornoz MuÃ±oz', '1958-11-08', 89826755, NULL, 'RegiÃ³n Metropolitana', 'La Cisterna', 'Santa Anselma', NULL);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(126, '102750837', 'Veronica Farias Cortes ', '1965-10-30', 77871717, NULL, 'RegiÃ³n Metropolitana', 'San JoaquÃ­n', 'Cabildo', 3547);
INSERT INTO `paciente` (`id`, `rut`, `nombre`, `fecha_nacimiento`, `telefono`, `email`, `region`, `ciudad`, `calle`, `numero_calle`) VALUES(127, '98651756', 'Maria Seguel Valenzuela', '1964-07-29', 969155558, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_patologia`
--

CREATE TABLE `paciente_patologia` (
  `paciente_id` int(11) NOT NULL,
  `patologia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologia`
--

CREATE TABLE `patologia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `detalle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `patologia`
--

INSERT INTO `patologia` (`id`, `nombre`, `detalle`) VALUES(1, 'onicomicosis', 'tratamiento con acido');
INSERT INTO `patologia` (`id`, `nombre`, `detalle`) VALUES(2, 'lamina involuta', 'tratamiento con braket');
INSERT INTO `patologia` (`id`, `nombre`, `detalle`) VALUES(3, 'helotomia', 'tratamiento con desnucleadora');
INSERT INTO `patologia` (`id`, `nombre`, `detalle`) VALUES(4, 'Verruga Plantar', 'Papiloma presente en la zona plantar del pie ');
INSERT INTO `patologia` (`id`, `nombre`, `detalle`) VALUES(5, 'Atencion Normal', 'corte de uÃ±as pulir y sacar duresas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `detalle` text,
  `precio` int(50) DEFAULT NULL,
  `tiempo_estimado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(1, 'onicocriptosis leve', 'tratamiento concervador de la uÃ±a', 25000, '30');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(2, 'onicocriptosis moderada', 'tratamiento concervador de la uÃ±a', 25000, '45');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(3, 'onicocriptosis grave', 'tratamiento concervador de las uÃ±as', 35000, '45');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(4, 'onicocriptosis bi lateral', 'tratamiento concervador de la uÃ±a ', 50000, '60');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(5, 'onicocriptosis ambos pies ', 'tratamiento conservador de la uÃ±a.', 65000, '80');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(6, 'UÃ±a involuta', 'Tratamiento que consiste en aliviar el bienestar de los pies.', 20000, '30');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(7, 'Onicogrifosis', 'Debastar, cortar y aliviar las molestias', 20000, '20');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(8, 'Brackets ', 'Poner brackets en las uÃ±as para corregir mal formaciÃ³n.', 25000, '40');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(9, 'AtenciÃ³n Normal', 'Corte, sacar durezas, sacar callos, pulir piel, uÃ±as e hidratar ', 10000, '30');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(10, 'AtenciÃ³n domicialiaria ', 'AtenciÃ³n normal en el domicilio ', 18000, '30');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(11, 'ReflexologÃ­a', 'Masaje de relajaciÃ³n podal', 10000, '30');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(12, 'Spa Podal', 'Masaje con crema exfoliante y aplicaciÃ³n del calor.', 5000, '10');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(13, 'Curaciones', 'Curar herida', 5000, '10');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(14, 'Tratamiento Hongos', 'AtenciÃ³n normal mÃ¡s aplicar Ã¡cido al 68%', 20000, '30');
INSERT INTO `servicio` (`id`, `nombre`, `detalle`, `precio`, `tiempo_estimado`) VALUES(16, 'Atencion normal + reflexologia', 'atencion normal mas reflexologia\r\n', 20, '60');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `pass`, `grupo`) VALUES(2, 'Maria Ignacia', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 1);
INSERT INTO `usuario` (`id`, `nombre`, `email`, `pass`, `grupo`) VALUES(3, 'CentroPodologia', 'centrodepodologiaclinica@gmail.com', '3d80f11f79da7493ac7281dc45329c28', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`numero`,`paciente_id`,`servicio_id`),
  ADD KEY `fk_atencion_paciente` (`paciente_id`),
  ADD KEY `fk_atencion_servicio` (`servicio_id`);

--
-- Indices de la tabla `grupo_usuario`
--
ALTER TABLE `grupo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paciente_comuna` (`ciudad`);

--
-- Indices de la tabla `paciente_patologia`
--
ALTER TABLE `paciente_patologia`
  ADD PRIMARY KEY (`paciente_id`,`patologia_id`),
  ADD KEY `fk_paciente_patologia_patologia` (`patologia_id`);

--
-- Indices de la tabla `patologia`
--
ALTER TABLE `patologia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `grupo_usuario`
--
ALTER TABLE `grupo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `patologia`
--
ALTER TABLE `patologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD CONSTRAINT `fk_atencion_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `fk_atencion_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`id`);

--
-- Filtros para la tabla `paciente_patologia`
--
ALTER TABLE `paciente_patologia`
  ADD CONSTRAINT `fk_paciente_patologia_paienta` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `fk_paciente_patologia_patologia` FOREIGN KEY (`patologia_id`) REFERENCES `patologia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
