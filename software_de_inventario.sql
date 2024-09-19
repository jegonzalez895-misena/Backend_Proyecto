-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2024 a las 05:45:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `software de inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `codigo`, `nombre`) VALUES
(1, '00001', 'Vinos'),
(2, '00002', 'Cerveza Importada'),
(3, '00003', 'Cerveza Nacional'),
(4, '00004', 'Ron'),
(5, '00005', 'Tequila'),
(6, '00006', 'Vodka'),
(7, '00007', 'Whisky'),
(8, '00008', 'Whiskey'),
(9, '00009', 'Cognac'),
(10, '00010', 'Brandy'),
(11, '00011', 'Champagne'),
(12, '00012', 'Ginebra'),
(13, '00013', 'Snacks'),
(14, '00014', 'Chocolates'),
(15, '00015', 'Gaseosas'),
(16, '00016', 'Bebidas Energizantes'),
(17, '00017', 'Jugos'),
(18, '00018', 'Cigarrillos'),
(19, '00019', 'Otros Productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fo_dpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`, `fo_dpto`) VALUES
(1, 'Leticia', 1),
(2, 'Medellín', 2),
(3, 'Arauca', 3),
(4, 'Barranquilla', 4),
(5, 'Cartagena', 5),
(6, 'Tunja', 6),
(7, 'Manizales', 7),
(8, 'Florencia', 8),
(9, 'Yopal', 9),
(10, 'Popayán', 10),
(11, 'Valledupar', 11),
(12, 'Quibdó', 12),
(13, 'Montería', 13),
(14, 'Bogotá', 14),
(15, 'Puerto Inírida', 15),
(16, 'San José del Guaviare', 16),
(17, 'Neiva', 17),
(18, 'Riohacha', 18),
(19, 'Santa Martha', 19),
(20, 'Villavicencio', 20),
(21, 'Pasto', 21),
(22, 'Cúcuta', 22),
(23, 'Mocoa', 23),
(24, 'Armenia', 24),
(25, 'Pereira', 25),
(26, 'San Andrés', 26),
(27, 'Bucaramanga', 27),
(28, 'Sincelejo', 28),
(29, 'Ibagué', 29),
(30, 'Cali', 30),
(31, 'Mitú', 31),
(32, 'Puerto Carreño', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `identificacion` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `celular` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fo_ciudad` int(11) NOT NULL,
  `fo_dpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `codigo`, `identificacion`, `nombre`, `direccion`, `celular`, `email`, `fo_ciudad`, `fo_dpto`) VALUES
(1, '00001', '79963598', 'José Eduardo González Torres', 'Diagonal 48 U Bis # 2-70', '3175503880', 'edogonza@hotmail.com', 3, 3),
(2, '00002', '1023921187', 'Kely Johanna Vargas Coca', 'Calle 48 U Bis # 2-70', '3143361522', 'johana.vargas09@hotmail.com', 6, 6),
(10, '00003', '1028666796', 'Laura Valentina Jara Vargas', 'calle 40 sur 3-20', '3152058410', 'laura.vj.vargas@gmail.com', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `fo_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `fo_proveedor` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `iva` double NOT NULL,
  `total` double NOT NULL,
  `fo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `fo_producto`, `cantidad`, `fo_proveedor`, `subtotal`, `iva`, `total`, `fo_usuario`) VALUES
(1, 1, 60, 1, 21000, 840, 21840, 1),
(2, 2, 100, 2, 660000, 26400, 686400, 1),
(8, 5, 5, 1, 1000, 1000, 1500, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpto`
--

CREATE TABLE `dpto` (
  `id_dpto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dpto`
--

INSERT INTO `dpto` (`id_dpto`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Antioquia'),
(3, 'Arauca'),
(4, 'Atlántico'),
(5, 'Bolívar'),
(6, 'Boyacá'),
(7, 'Caldas'),
(8, 'Caquetá'),
(9, 'Casanare'),
(10, 'Cauca'),
(11, 'Cesar'),
(12, 'Chocó'),
(13, 'Córdoba'),
(14, 'Cundinamarca'),
(15, 'Guainía'),
(16, 'Guaviare'),
(17, 'Huila'),
(18, 'La Guajira'),
(19, 'Magdalena'),
(20, 'Meta'),
(21, 'Nariño'),
(22, 'Norte de Santander'),
(23, 'Putumayo'),
(24, 'Quindío'),
(25, 'Risaralda'),
(26, 'San Andrés y Providencia'),
(27, 'Santander'),
(28, 'Sucre'),
(29, 'Tolima'),
(30, 'Valle del Cauca'),
(31, 'Vaupés'),
(32, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fo_categoria` int(11) NOT NULL,
  `inventario` double NOT NULL,
  `valor_compra` double NOT NULL,
  `valor_venta` double NOT NULL,
  `fo_proveedor` int(11) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `presentacion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `nombre`, `fo_categoria`, `inventario`, `valor_compra`, `valor_venta`, `fo_proveedor`, `marca`, `presentacion`) VALUES
(1, '00001', 'Uva Postobon', 15, 1, 3000, 3500, 1, 'Postobon', 'Botella 2000 ml'),
(2, '00002', 'Royal Salute 21', 7, 2, 935000, 1100000, 2, 'Royal Salute', ' Botella 700 ml'),
(3, '00003', 'Piña Postobon', 15, 50, 40000, 4500, 1, 'Postobon', 'Botella 2000 ml'),
(4, '00004', 'Coca-Cola', 15, 100, 3000, 3500, 1, 'Coca-Cola', 'Botella 2000 ml'),
(11, '00005', 'Jugo Hit Mora', 17, 30, 12000, 15000, 1, 'Hit ', 'Pack 12 Unidades 200ml'),
(15, '00008', 'Jugo del valle', 17, 50, 4000, 4500, 1, 'Del Valle', 'Botella 2500 ml');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nit` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `fo_ciudad` int(11) NOT NULL,
  `fo_dpto` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contacto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `codigo`, `nit`, `nombre`, `direccion`, `celular`, `fo_ciudad`, `fo_dpto`, `email`, `contacto`) VALUES
(1, '00001', '890.903.939-5', 'Gaseosas Posada Tobón S.A.. \"Postobon\"', 'Calle 52 # 47-42 Piso 5', '3006547890', 2, 2, 'martha.ibañez@postabon.com.co', 'Martha Ibañez'),
(2, '00002', '901.388.764-2', 'Importadora de Licores\"', 'Carrera 46 # 123 - 61', '3146985274', 15, 15, 'importadora@licores.com.co', 'Catalina Gomez'),
(3, '00003', '980.765.432-9', 'Bebidas Artesanal', 'Calle 5 # 33-20', '3201234567', 5, 5, 'bebidas@artesanal.com.co', 'Pedro Perez'),
(13, '00004', '890.399.012-0', 'Industria De Licores Del Valle', 'Km 2 Via Rozo, Palmira ', '3016086325', 30, 30, 'modurango@ivalle.com.co', 'Monica Durango'),
(14, '00005', '901.436.775-1', 'Fabrica De Licores De Antioquia', 'Carrera 50 # 12 Sur-141- Itagüí', '5742819585', 2, 2, 'mercuriofla@fla.com.co', 'Fernando Ramirez'),
(15, '00006', '901.607.981-5', 'Deposito De Licores Y Cervezas YR Sas', 'Calle 85 B Sur # 80I-19', '3138499521', 14, 14, 'deposito@licores.com.co', 'Maritza Robledo'),
(16, '00007', '860.005.224-6', 'Bavaria S.A', 'Carrera 53 A # 127-35', '5712755505', 14, 14, 'protecciondedatos@co.ab.inbev.com', 'Leonor Lineros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `identificacion` varchar(250) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `rol` varchar(250) NOT NULL,
  `clave` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `codigo`, `identificacion`, `nombre`, `direccion`, `celular`, `email`, `rol`, `clave`) VALUES
(1, '00001', '79963598', 'José Eduardo González Torres', 'Carrera 5 # 48Z-52', '3175503880', 'edogonza@hotmail.com', 'Administrador', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(2, '00002', '1028666796', 'Laura Valentina Jara Vargas', 'Calle 50 # 3-50', '3115872156', 'laura.vj.vargas@gmail.com', 'Vendedor', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(4, '00003', 'Caja', 'Caja', 'Establecimiento', '**', 'caja@gmail.com', 'Vendedor', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `productos` varchar(5000) NOT NULL,
  `fo_cliente` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `total` double NOT NULL,
  `fo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `fecha`, `productos`, `fo_cliente`, `subtotal`, `total`, `fo_usuario`) VALUES
(1, '2024-06-11', '1', 1, 35000, 36400, 4),
(7, '2024-01-16', '5', 2, 10000, 11400, 1),
(8, '2024-01-16', '5', 2, 10000, 11400, 4),
(13, '2024-09-11', 'a:2:{i:0;a:5:{i:0;s:5:\"00008\";i:1;s:9:\"ChocoCono\";i:2;i:1500;i:3;i:2;i:4;i:3000;}i:1;a:5:{i:0;s:5:\"00003\";i:1;s:14:\"Piña Postpbon\";i:2;i:4500;i:3;i:10;i:4;i:45000;}}', 2, 145000, 145000, 1),
(14, '2024-09-13', 'a:2:{i:0;a:5:{i:0;s:5:\"00003\";i:1;s:14:\"Piña Postobon\";i:2;i:4500;i:3;i:10;i:4;i:45000;}i:1;a:5:{i:0;s:5:\"00005\";i:1;s:13:\"Jugo Hit Mora\";i:2;i:15000;i:3;i:10;i:4;i:150000;}}', 1, 195000, 195000, 1),
(15, '2024-09-13', 'a:1:{i:0;a:5:{i:0;s:5:\"00002\";i:1;s:15:\"Royal Salute 21\";i:2;i:1100000;i:3;i:1;i:4;i:1100000;}}', 1, 1100000, 1100000, 1),
(16, '2024-09-13', 'a:3:{i:0;a:5:{i:0;s:5:\"00005\";i:1;s:13:\"Jugo Hit Mora\";i:2;i:15000;i:3;i:10;i:4;i:150000;}i:1;a:5:{i:0;s:5:\"00002\";i:1;s:15:\"Royal Salute 21\";i:2;i:1100000;i:3;i:1;i:4;i:1100000;}i:2;a:5:{i:0;s:5:\"00008\";i:1;s:14:\"Jugo del valle\";i:2;i:4500;i:3;i:10;i:4;i:45000;}}', 2, 1295000, 1295000, 1),
(22, '2024-09-13', 'a:3:{i:0;a:5:{i:0;s:5:\"00003\";i:1;s:14:\"Piña Postobon\";i:2;i:4500;i:3;i:10;i:4;i:45000;}i:1;a:5:{i:0;s:5:\"00004\";i:1;s:9:\"Coca-Cola\";i:2;i:3500;i:3;i:10;i:4;i:35000;}i:2;a:5:{i:0;s:5:\"00005\";i:1;s:13:\"Jugo Hit Mora\";i:2;i:15000;i:3;i:10;i:4;i:150000;}}', 1, 230000, 230000, 1),
(23, '2024-09-13', 'a:2:{i:0;a:5:{i:0;s:5:\"00003\";i:1;s:14:\"Piña Postobon\";i:2;i:4500;i:3;i:10;i:4;i:45000;}i:1;a:5:{i:0;s:5:\"00002\";i:1;s:15:\"Royal Salute 21\";i:2;i:1100000;i:3;i:1;i:4;i:1100000;}}', 1, 1145000, 1145000, 4),
(24, '2024-09-13', 'a:1:{i:0;a:5:{i:0;s:5:\"00003\";i:1;s:14:\"Piña Postobon\";i:2;i:4500;i:3;i:10;i:4;i:45000;}}', 2, 45000, 45000, 1),
(25, '2024-09-15', 'a:2:{i:0;a:5:{i:0;s:5:\"00002\";i:1;s:15:\"Royal Salute 21\";i:2;i:1100000;i:3;i:2;i:4;i:2200000;}i:1;a:5:{i:0;s:5:\"00005\";i:1;s:13:\"Jugo Hit Mora\";i:2;i:15000;i:3;i:20;i:4;i:300000;}}', 1, 2500000, 2500000, 1),
(26, '2024-09-15', 'a:6:{i:0;a:5:{i:0;s:5:\"00004\";i:1;s:9:\"Coca-Cola\";i:2;i:3500;i:3;i:50;i:4;i:175000;}i:1;a:5:{i:0;s:5:\"00001\";i:1;s:12:\"Uva Postobon\";i:2;i:3500;i:3;i:10;i:4;i:35000;}i:2;a:5:{i:0;s:5:\"00003\";i:1;s:14:\"Piña Postobon\";i:2;i:4500;i:3;i:10;i:4;i:45000;}i:3;a:5:{i:0;s:5:\"00008\";i:1;s:14:\"Jugo del valle\";i:2;i:4500;i:3;i:10;i:4;i:45000;}i:4;a:5:{i:0;s:5:\"00005\";i:1;s:13:\"Jugo Hit Mora\";i:2;i:15000;i:3;i:5;i:4;i:75000;}i:5;a:5:{i:0;s:5:\"00002\";i:1;s:15:\"Royal Salute 21\";i:2;i:1100000;i:3;i:2;i:4;i:2200000;}}', 2, 2575000, 2575000, 1),
(33, '2024-09-17', 'a:3:{i:0;a:5:{i:0;s:5:\"00004\";i:1;s:9:\"Coca-Cola\";i:2;i:3500;i:3;i:5;i:4;i:17500;}i:1;a:5:{i:0;s:5:\"00005\";i:1;s:13:\"Jugo Hit Mora\";i:2;i:15000;i:3;i:5;i:4;i:75000;}i:2;a:5:{i:0;s:5:\"00008\";i:1;s:14:\"Jugo del valle\";i:2;i:4500;i:3;i:8;i:4;i:36000;}}', 2, 128500, 128500, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `fo_dpto` (`fo_dpto`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fo_ciudad` (`fo_ciudad`),
  ADD KEY `fo_dpto` (`fo_dpto`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`),
  ADD KEY `fo_producto` (`fo_producto`),
  ADD KEY `fo_proveedor` (`fo_proveedor`),
  ADD KEY `fo_usuario` (`fo_usuario`);

--
-- Indices de la tabla `dpto`
--
ALTER TABLE `dpto`
  ADD PRIMARY KEY (`id_dpto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fo_categoria` (`fo_categoria`),
  ADD KEY `fo_proveedor` (`fo_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `fo_ciudad` (`fo_ciudad`),
  ADD KEY `fo_dpto` (`fo_dpto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `fo_cliente` (`fo_cliente`),
  ADD KEY `fo_usuario` (`fo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `dpto`
--
ALTER TABLE `dpto`
  MODIFY `id_dpto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`fo_dpto`) REFERENCES `dpto` (`id_dpto`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`fo_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`fo_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
