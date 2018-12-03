-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 06:57 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiendaprueba`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_cliente`
--

CREATE TABLE `t_cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `apellidoPaterno` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `apellidoMaterno` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `telContacto` varchar(20) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `telMovil` varchar(15) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `contrasenia` varchar(15) CHARACTER SET utf16 COLLATE utf16_spanish2_ci DEFAULT NULL,
  `formaPago` int(2) NOT NULL,
  `usuario` varchar(15) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `email` varchar(20) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `rfc` varchar(15) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `t_cliente`
--

INSERT INTO `t_cliente` (`idCliente`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telContacto`, `telMovil`, `contrasenia`, `formaPago`, `usuario`, `email`, `rfc`) VALUES
(99, 'Jonathan', 'Barcenas', 'Arreola', '88802180', '8114188829', '123abc', 2, 'barcenas', 'barcenas@gmail.com', 'BAAJ1234789092'),
(100, 'denise', 'torres', 'rojas', '83142106', '8117899885', '2510', 2, 'torres', 'adtr2510@gmail.com', 'tora251096hnlr'),
(101, 'Daniel', 'Arreola', 'Rodriguez', '88802181', '8114188821', '1234abc', 2, 'daniel', 'daniel@gmail.com', 'jaas21122324'),
(102, 'denise', 'torres', 'r', '81298121', '1212092121', '1234abc', 2, 'dt11', 'ddd@gmail.com', 'BAAJ1234789091'),
(103, 'adsac', 'dafa', 'sdfdsf', '32432465', '8114188821', '12213', 2, 'sdfsfd', 'dssfsags@gmail.com', 'adfsdsfgfdsdsht'),
(104, 'sdfgdhthb', 'dnhttehre', 'wqdewtwt', '88802182', '8114188823', 'fsagrehteh', 2, 'adfgrrvc', 'dwqgf@gmail.com', 'sqfrrewyrejye'),
(105, 'Emmanuel', 'Capistran', 'Martinez', '82986589', '8124257432', '123456789', 2, 'Capi', 'emmanuel_12x@hotmail', 'sdfsfdsfsdfdaff');

-- --------------------------------------------------------

--
-- Table structure for table `t_pedido`
--

CREATE TABLE `t_pedido` (
  `idPedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_pedido`
--

INSERT INTO `t_pedido` (`idPedido`, `fecha`, `idCliente`, `total`) VALUES
(3, '2018-05-25', 99, 276),
(4, '2018-05-25', 99, 259),
(5, '2018-05-26', 99, 535),
(6, '2018-05-26', 99, 284),
(7, '2018-05-26', 100, 284),
(8, '2018-05-26', 101, 269.66),
(9, '2018-05-26', 99, 259),
(10, '2018-05-26', 99, 259),
(11, '2018-05-28', 99, 259),
(12, '2018-05-28', 99, 276),
(13, '2018-05-28', 99, 276),
(14, '2018-05-28', 99, 268),
(15, '2018-05-28', 99, 284),
(16, '2018-05-28', 99, 284),
(17, '2018-05-28', 99, 284),
(18, '2018-05-28', 99, 269.66),
(19, '2018-05-28', 99, 284),
(20, '2018-05-28', 0, 0),
(21, '2018-05-28', 0, 0),
(22, '2018-05-28', 0, 0),
(23, '2018-05-28', 99, 269.66),
(24, '2018-05-28', 99, 269.66),
(25, '2018-05-28', 99, 284),
(26, '2018-05-28', 99, 284),
(27, '2018-05-28', 99, 269.66),
(28, '2018-05-28', 99, 269.66),
(29, '2018-05-29', 99, 276),
(30, '2018-05-29', 99, 284),
(31, '2018-05-29', 99, 269.66),
(32, '2018-05-29', 99, 284),
(33, '2018-05-29', 99, 284),
(34, '2018-05-29', 99, 259),
(35, '2018-05-29', 99, 467),
(36, '2018-05-29', 99, 200),
(37, '2018-05-29', 99, 199),
(38, '2018-05-29', 99, 284),
(39, '2018-05-29', 99, 276),
(40, '2018-05-29', 99, 284),
(41, '2018-05-29', 99, 284),
(42, '2018-05-29', 99, 284),
(43, '2018-05-29', 99, 284),
(44, '2018-05-29', 99, 284),
(45, '2018-05-29', 99, 284),
(46, '2018-05-29', 99, 284),
(47, '2018-05-29', 99, 284),
(48, '2018-05-30', 99, 276),
(49, '2018-05-30', 99, 284),
(50, '2018-05-30', 99, 284),
(51, '2018-05-30', 99, 284),
(52, '2018-05-30', 99, 284),
(53, '2018-05-30', 99, 284),
(54, '2018-05-30', 99, 0),
(55, '2018-05-30', 99, 0),
(56, '2018-05-30', 99, 0),
(57, '2018-05-30', 99, 0),
(58, '2018-05-30', 99, 0),
(59, '2018-05-30', 99, 0),
(60, '2018-05-30', 99, 0),
(61, '2018-05-30', 99, 0),
(62, '2018-05-30', 99, 0),
(63, '2018-05-30', 99, 284),
(64, '2018-05-30', 99, 0),
(65, '2018-05-30', 99, 0),
(66, '2018-05-30', 99, 0),
(67, '2018-05-30', 99, 0),
(68, '2018-05-30', 99, 0),
(69, '2018-05-30', 99, 0),
(70, '2018-05-30', 99, 0),
(71, '2018-05-30', 99, 0),
(72, '2018-05-30', 99, 0),
(73, '2018-05-30', 99, 284),
(74, '2018-05-30', 99, 0),
(75, '2018-05-30', 99, 0),
(76, '2018-05-30', 99, 0),
(77, '2018-05-30', 99, 0),
(78, '2018-05-30', 99, 0),
(79, '2018-05-30', 99, 0),
(80, '2018-05-30', 99, 0),
(81, '2018-05-30', 99, 0),
(82, '2018-05-30', 99, 0),
(83, '2018-05-30', 99, 284),
(84, '2018-05-30', 99, 0),
(85, '2018-05-30', 99, 276),
(86, '2018-05-30', 99, 0),
(87, '2018-05-30', 99, 0),
(88, '2018-05-30', 99, 0),
(89, '2018-05-30', 99, 0),
(90, '2018-05-30', 99, 0),
(91, '2018-05-30', 99, 0),
(92, '2018-05-30', 99, 0),
(93, '2018-05-30', 99, 0),
(94, '2018-05-30', 99, 0),
(95, '2018-05-30', 99, 284),
(96, '2018-05-30', 99, 284),
(97, '2018-05-30', 99, 934),
(98, '2018-05-30', 99, 276),
(99, '2018-05-30', 99, 819),
(100, '2018-05-30', 99, 284),
(101, '2018-05-30', 99, 284),
(102, '2018-05-30', 99, 276),
(103, '2018-05-30', 99, 276),
(104, '2018-05-30', 99, 284),
(105, '2018-05-30', 99, 284),
(106, '2018-05-30', 99, 259);

-- --------------------------------------------------------

--
-- Table structure for table `t_pedido_detalle`
--

CREATE TABLE `t_pedido_detalle` (
  `idPedidoDetalle` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `producto` varchar(50) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `idPedido` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_pedido_detalle`
--

INSERT INTO `t_pedido_detalle` (`idPedidoDetalle`, `cantidad`, `producto`, `precio`, `idPedido`, `idProducto`, `idCliente`, `fecha`) VALUES
(2, 1, '18 Jumanji en la selva', 276, 3, 49, 99, '2018-05-25'),
(3, 1, '20 Extraordinario', 259, 4, 50, 99, '2018-05-25'),
(4, 1, '20 Extraordinario', 259, 5, 50, 99, '2018-05-26'),
(5, 1, '18 Jumanji en la selva', 276, 5, 49, 99, '2018-05-26'),
(6, 1, '14 Thor Ragnarok', 284, 6, 47, 99, '2018-05-26'),
(7, 1, '14 Thor Ragnarok', 284, 7, 47, 100, '2018-05-26'),
(8, 1, '13 COCO', 269.66, 8, 46, 101, '2018-05-26'),
(9, 1, '20 Extraordinario', 259, 9, 50, 99, '2018-05-26'),
(10, 1, '20 Extraordinario', 259, 10, 50, 99, '2018-05-26'),
(11, 1, '20 Extraordinario', 259, 11, 50, 99, '2018-05-28'),
(12, 1, '18 Jumanji en la selva', 276, 12, 49, 99, '2018-05-28'),
(13, 1, '18 Jumanji en la selva', 276, 13, 49, 99, '2018-05-28'),
(14, 1, '12 El Gran Showman', 268, 14, 45, 99, '2018-05-28'),
(15, 1, '15 Star Wars Los ultimos jedi', 284, 15, 48, 99, '2018-05-28'),
(16, 1, '15 Star Wars Los ultimos jedi', 284, 16, 48, 99, '2018-05-28'),
(17, 1, '14 Thor Ragnarok', 284, 17, 47, 99, '2018-05-28'),
(18, 1, '13 COCO', 269.66, 18, 46, 99, '2018-05-28'),
(19, 1, '15 Star Wars Los ultimos jedi', 284, 19, 48, 99, '2018-05-28'),
(20, 1, '13 COCO', 269.66, 23, 46, 99, '2018-05-28'),
(21, 1, '13 COCO', 269.66, 24, 46, 99, '2018-05-28'),
(22, 1, '15 Star Wars Los ultimos jedi', 284, 25, 48, 99, '2018-05-28'),
(23, 1, '14 Thor Ragnarok', 284, 26, 47, 99, '2018-05-28'),
(24, 1, '13 COCO', 269.66, 27, 46, 99, '2018-05-28'),
(25, 1, '13 COCO', 269.66, 28, 46, 99, '2018-05-28'),
(26, 1, '18 Jumanji en la selva', 276, 29, 49, 99, '2018-05-29'),
(27, 1, '15 Star Wars Los ultimos jedi', 284, 30, 48, 99, '2018-05-29'),
(28, 1, '13 COCO', 269.66, 31, 46, 99, '2018-05-29'),
(29, 1, '15 Star Wars Los ultimos jedi', 284, 32, 48, 99, '2018-05-29'),
(30, 1, '14 Thor Ragnarok', 284, 33, 47, 99, '2018-05-29'),
(31, 1, '20 Extraordinario', 259, 34, 50, 99, '2018-05-29'),
(32, 1, '12 El Gran Showman', 268, 35, 45, 99, '2018-05-29'),
(33, 1, '10 La liga de la justicia', 199, 35, 44, 99, '2018-05-29'),
(34, 1, '11 Ant Man', 200, 36, 43, 99, '2018-05-29'),
(35, 1, '10 La liga de la justicia', 199, 37, 44, 99, '2018-05-29'),
(36, 1, '14 Thor Ragnarok', 284, 38, 47, 99, '2018-05-29'),
(37, 1, '18 Jumanji en la selva', 276, 39, 49, 99, '2018-05-29'),
(38, 1, '15 Star Wars Los ultimos jedi', 284, 40, 48, 99, '2018-05-29'),
(39, 1, '15 Star Wars Los ultimos jedi', 284, 41, 48, 99, '2018-05-29'),
(40, 1, '14 Thor Ragnarok', 284, 42, 47, 99, '2018-05-29'),
(41, 1, '14 Thor Ragnarok', 284, 43, 47, 99, '2018-05-29'),
(42, 1, '15 Star Wars Los ultimos jedi', 284, 44, 48, 99, '2018-05-29'),
(43, 1, '15 Star Wars Los ultimos jedi', 284, 45, 48, 99, '2018-05-29'),
(44, 1, '15 Star Wars Los ultimos jedi', 284, 46, 48, 99, '2018-05-29'),
(45, 1, '15 Star Wars Los ultimos jedi', 284, 47, 48, 99, '2018-05-29'),
(46, 1, '18 Jumanji en la selva', 276, 48, 49, 99, '2018-05-30'),
(47, 1, '14 Thor Ragnarok', 284, 49, 47, 99, '2018-05-30'),
(48, 1, '15 Star Wars Los ultimos jedi', 284, 50, 48, 99, '2018-05-30'),
(49, 1, '15 Star Wars Los ultimos jedi', 284, 51, 48, 99, '2018-05-30'),
(50, 1, '15 Star Wars Los ultimos jedi', 284, 52, 48, 99, '2018-05-30'),
(51, 1, '15 Star Wars Los ultimos jedi', 284, 53, 48, 99, '2018-05-30'),
(52, 1, '15 Star Wars Los ultimos jedi', 284, 63, 48, 99, '2018-05-30'),
(53, 1, '14 Thor Ragnarok', 284, 73, 47, 99, '2018-05-30'),
(54, 1, '15 Star Wars Los ultimos jedi', 284, 83, 48, 99, '2018-05-30'),
(55, 1, '18 Jumanji en la selva', 276, 85, 49, 99, '2018-05-30'),
(56, 1, '15 Star Wars Los ultimos jedi', 284, 95, 48, 99, '2018-05-30'),
(57, 1, '14 Thor Ragnarok', 284, 96, 47, 99, '2018-05-30'),
(58, 1, '18 Jumanji en la selva', 276, 97, 49, 99, '2018-05-30'),
(59, 1, '20 Extraordinario', 259, 97, 50, 99, '2018-05-30'),
(60, 1, '11 Ant Man', 200, 97, 43, 99, '2018-05-30'),
(61, 1, '10 La liga de la justicia', 199, 97, 44, 99, '2018-05-30'),
(62, 1, '18 Jumanji en la selva', 276, 98, 49, 99, '2018-05-30'),
(63, 1, '18 Jumanji en la selva', 276, 99, 49, 99, '2018-05-30'),
(64, 1, '20 Extraordinario', 259, 99, 50, 99, '2018-05-30'),
(65, 1, '15 Star Wars Los ultimos jedi', 284, 99, 48, 99, '2018-05-30'),
(66, 1, '15 Star Wars Los ultimos jedi', 284, 100, 48, 99, '2018-05-30'),
(67, 1, '15 Star Wars Los ultimos jedi', 284, 101, 48, 99, '2018-05-30'),
(68, 1, '18 Jumanji en la selva', 276, 102, 49, 99, '2018-05-30'),
(69, 1, '18 Jumanji en la selva', 276, 103, 49, 99, '2018-05-30'),
(70, 1, '15 Star Wars Los ultimos jedi', 284, 104, 48, 99, '2018-05-30'),
(71, 1, '14 Thor Ragnarok', 284, 105, 47, 99, '2018-05-30'),
(72, 1, '20 Extraordinario', 259, 106, 50, 99, '2018-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `t_producto`
--

CREATE TABLE `t_producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `codigoBarras` varchar(50) DEFAULT NULL,
  `puntoReorden` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `categoria` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `anio` int(4) NOT NULL,
  `inventario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_producto`
--

INSERT INTO `t_producto` (`idProducto`, `nombre`, `codigo`, `descripcion`, `codigoBarras`, `puntoReorden`, `precio`, `imagen`, `categoria`, `anio`, `inventario`) VALUES
(43, 'Ant Man', '11', 'Superheroe', '123456789123456', 112, 200, 'imagenes/Ant Man.jpg', 'ficcion', 2016, 340),
(44, 'La liga de la justicia', '10', 'No puedes salvar al mundo solo', '1029384756774830', 222, 199, 'imagenes/La liga de la justicia.jpg', 'ficcion', 2018, 152),
(45, 'El Gran Showman', '12', 'Musica, Freaks y amor a uno mismo', '1092838747129314', 156, 268, 'imagenes/El Gran Showman.jpg', 'aventura', 2018, 298),
(46, 'COCO', '13', 'Miguel nos orilla a un mundo de aventuras en la cultura mexicana', '098765432109876', 9, 269.66, 'imagenes/COCO.jpg', 'infantil', 2018, 196),
(47, 'Thor Ragnarok', '14', 'Thor dios hijo de Odin', '123456789009876', 8, 284, 'imagenes/Thor Ragnarok.jpg', 'ficcion', 2018, 144),
(48, 'Star Wars Los ultimos jedi', '15', 'Los ultimos jedi', '144510191817171', 10, 284, 'imagenes/Star Wars Los ultimos jedi.jpg', 'aventura', 2018, 314),
(49, 'Jumanji en la selva', '18', 'Perdidos en un juego de video', '151578998711234', 11, 276, 'imagenes/Jumanji en la selva.jpg', 'aventura', 2018, 186),
(50, 'Extraordinario', '20', 'Una aventura extraordinaria basada en el Bestseller de The new york times', '654378901264839', 234, 259, 'imagenes/Extraordinario.jpg', 'aventura', 2018, 240);

-- --------------------------------------------------------

--
-- Table structure for table `t_usuario`
--

CREATE TABLE `t_usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasenia` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `t_usuario`
--

INSERT INTO `t_usuario` (`idUsuario`, `usuario`, `contrasenia`, `tipo`) VALUES
(2, 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_cliente`
--
ALTER TABLE `t_cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `rfc` (`rfc`);

--
-- Indexes for table `t_pedido`
--
ALTER TABLE `t_pedido`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indexes for table `t_pedido_detalle`
--
ALTER TABLE `t_pedido_detalle`
  ADD PRIMARY KEY (`idPedidoDetalle`);

--
-- Indexes for table `t_producto`
--
ALTER TABLE `t_producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD UNIQUE KEY `codigoBarras` (`codigoBarras`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_cliente`
--
ALTER TABLE `t_cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `t_pedido`
--
ALTER TABLE `t_pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `t_pedido_detalle`
--
ALTER TABLE `t_pedido_detalle`
  MODIFY `idPedidoDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `t_producto`
--
ALTER TABLE `t_producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
