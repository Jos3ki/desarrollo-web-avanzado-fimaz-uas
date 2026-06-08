-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2026 at 08:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitacora_admin`
--

CREATE TABLE `bitacora_admin` (
  `id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `accion` varchar(50) NOT NULL,
  `entidad` varchar(50) DEFAULT NULL,
  `entidad_id` int DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `resultado` varchar(20) NOT NULL DEFAULT 'exito',
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bitacora_admin`
--

INSERT INTO `bitacora_admin` (`id`, `admin_id`, `username`, `accion`, `entidad`, `entidad_id`, `descripcion`, `resultado`, `ip`, `user_agent`, `creado_en`) VALUES
(1, NULL, 'admin', 'login', 'usuario', NULL, 'Intento de inicio de sesión fallido.', 'fallido', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-04 03:02:01'),
(2, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-04 03:02:07'),
(3, 1, 'admin', 'eliminar', 'producto', 35, 'Producto eliminado. SKU: SKU028 | Nombre: Esponja para Trastes', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-04 03:02:11'),
(4, 1, 'admin', 'crear', 'producto', NULL, 'Producto creado. SKU: 123123412423 | Nombre: as,jdvba', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-04 03:02:29'),
(5, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-04 03:02:32'),
(6, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 19:40:31'),
(7, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 19:40:59'),
(8, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 20:58:50'),
(9, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 20:59:59'),
(10, NULL, 'admin', 'login', 'usuario', NULL, 'Intento de inicio de sesión fallido.', 'fallido', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:00:04'),
(11, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:00:09'),
(12, 1, 'admin', 'eliminar', 'producto', 3, 'Producto eliminado. SKU: 12341 | Nombre: joseoja', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:00:26'),
(13, 1, 'admin', 'eliminar', 'producto', 1, 'Producto eliminado. SKU: 142312 | Nombre: Jose', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:00:30'),
(14, 1, 'admin', 'eliminar', 'producto', 2, 'Producto eliminado. SKU: 1231 | Nombre: Jabon', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:00:33'),
(15, 1, 'admin', 'eliminar', 'producto', 38, 'Producto eliminado. SKU: 123123412423 | Nombre: as,jdvba', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:00:36'),
(16, 1, 'admin', 'actualizar', 'producto', 37, 'Producto actualizado. SKU: SKU030 | Nombre: Cloro Líquido 1L', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:06:18'),
(17, 1, 'admin', 'actualizar', 'producto', 36, 'Producto actualizado. SKU: SKU029 | Nombre: Limpiador Multiusos 1L', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:06:39'),
(18, 1, 'admin', 'actualizar', 'producto', 34, 'Producto actualizado. SKU: SKU027 | Nombre: Servilletas 100 pzas', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:06:54'),
(19, 1, 'admin', 'actualizar', 'producto', 33, 'Producto actualizado. SKU: SKU026 | Nombre: Té Verde 20 sobres', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:07:14'),
(20, 1, 'admin', 'actualizar', 'producto', 32, 'Producto actualizado. SKU: SKU025 | Nombre: Chocolate en Polvo 400g', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:07:30'),
(21, 1, 'admin', 'actualizar', 'producto', 31, 'Producto actualizado. SKU: SKU024 | Nombre: Puré de Papa 125g', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:07:46'),
(22, 1, 'admin', 'actualizar', 'producto', 30, 'Producto actualizado. SKU: SKU023 | Nombre: Pan de Caja Integral', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:08:08'),
(23, 1, 'admin', 'actualizar', 'producto', 29, 'Producto actualizado. SKU: SKU022 | Nombre: Mermelada de Fresa 350g', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:08:24'),
(24, 1, 'admin', 'actualizar', 'producto', 28, 'Producto actualizado. SKU: SKU021 | Nombre: Mostaza 200g', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:08:51'),
(25, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:08:52'),
(26, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:34:42'),
(27, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:34:44'),
(28, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:36:28'),
(29, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 21:36:45'),
(30, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1 Edg/148.0.0.0', '2026-06-07 22:05:56'),
(31, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1 Edg/148.0.0.0', '2026-06-07 22:05:59'),
(32, NULL, 'admin', 'login', 'usuario', NULL, 'Intento de inicio de sesión fallido.', 'fallido', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 22:10:10'),
(33, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 22:10:15'),
(34, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 22:10:17'),
(35, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 22:15:41'),
(36, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 22:16:47'),
(37, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 22:16:54'),
(38, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-07 22:19:29'),
(39, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:01:29'),
(40, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:01:49'),
(41, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:02:02'),
(42, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:37:41'),
(43, 1, 'admin', 'actualizar', 'producto', 27, 'Producto actualizado. SKU: SKU020 | Nombre: Mayonesa 390g', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:39:37'),
(44, 1, 'admin', 'actualizar', 'producto', 26, 'Producto actualizado. SKU: SKU019 | Nombre: Salsa de Tomate 400g', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:39:59'),
(45, 1, 'admin', 'actualizar', 'producto', 25, 'Producto actualizado. SKU: SKU018 | Nombre: Sopa de Pasta 200g', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:40:18'),
(46, 1, 'admin', 'actualizar', 'producto', 24, 'Producto actualizado. SKU: SKU017 | Nombre: Lentejas 500g', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:40:32'),
(47, 1, 'admin', 'actualizar', 'producto', 23, 'Producto actualizado. SKU: SKU016 | Nombre: Frijol Negro 1kg', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:40:49'),
(48, 1, 'admin', 'actualizar', 'producto', 22, 'Producto actualizado. SKU: SKU015 | Nombre: Sal de Mesa 1kg', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:41:10'),
(49, 1, 'admin', 'actualizar', 'producto', 21, 'Producto actualizado. SKU: SKU014 | Nombre: Azúcar Estándar 1kg', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:41:26'),
(50, 1, 'admin', 'actualizar', 'producto', 20, 'Producto actualizado. SKU: SKU013 | Nombre: Cereal de Maíz 500g', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:41:50'),
(51, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 00:41:51'),
(52, 1, 'admin', 'login', 'usuario', 1, 'Inicio de sesión exitoso.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 07:27:24'),
(53, 1, 'admin', 'logout', 'usuario', 1, 'Cierre de sesión.', 'exito', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-08 07:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `sku` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `existencia` int NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `sku`, `nombre`, `descripcion`, `precio_compra`, `precio_venta`, `existencia`, `imagen`, `created_at`, `updated_at`) VALUES
(8, 'SKU001', 'Arroz Integral 1kg', 'Arroz integral de grano largo', 25.00, 35.00, 150, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(9, 'SKU002', 'Aceite de Oliva 500ml', 'Aceite de oliva virgen extra', 80.00, 110.00, 60, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(10, 'SKU003', 'Leche Entera 1L', 'Leche de vaca pasteurizada', 18.00, 24.00, 200, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(11, 'SKU004', 'Café en Grano 250g', 'Café tostado artesanal', 65.00, 95.00, 45, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(12, 'SKU005', 'Detergente Líquido 2L', 'Detergente para ropa delicada', 75.00, 105.00, 40, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(13, 'SKU006', 'Jabón de Tocador', 'Jabón neutro con glicerina', 10.00, 15.00, 300, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(14, 'SKU007', 'Champú Anticaspa 400ml', 'Fórmula con extractos naturales', 45.00, 65.00, 85, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(15, 'SKU008', 'Pasta de Dientes 100g', 'Protección total con flúor', 22.00, 32.00, 120, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(16, 'SKU009', 'Papel Higiénico 4 rollos', 'Papel doble hoja extra suave', 30.00, 42.00, 90, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(17, 'SKU010', 'Atún en Agua 140g', 'Lomo de atún enlatado', 15.00, 22.00, 250, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(18, 'SKU011', 'Galletas de Avena 200g', 'Galletas horneadas sin azúcar', 20.00, 30.00, 110, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(19, 'SKU012', 'Jugo de Naranja 1L', 'Jugo 100% natural sin conservadores', 28.00, 38.00, 75, NULL, '2026-06-04 02:38:07', '2026-06-04 02:38:07'),
(20, 'SKU013', 'Cereal de Maíz 500g', 'Hojuelas de maíz tostadas', 35.00, 48.00, 65, 'prod_6a260fce2f582.webp', '2026-06-04 02:38:07', '2026-06-08 00:41:50'),
(21, 'SKU014', 'Azúcar Estándar 1kg', 'Azúcar de caña pura', 22.00, 29.00, 180, 'prod_6a260fb6e3205.webp', '2026-06-04 02:38:07', '2026-06-08 00:41:26'),
(22, 'SKU015', 'Sal de Mesa 1kg', 'Sal yodada y fluorada', 12.00, 18.00, 140, 'prod_6a260fa6a3eb2.webp', '2026-06-04 02:38:07', '2026-06-08 00:41:10'),
(23, 'SKU016', 'Frijol Negro 1kg', 'Frijol negro seleccionado', 26.00, 36.00, 160, 'prod_6a260f913775b.webp', '2026-06-04 02:38:07', '2026-06-08 00:40:49'),
(24, 'SKU017', 'Lentejas 500g', 'Lentejas de rápida cocción', 16.00, 24.00, 100, 'prod_6a260f8010f7b.webp', '2026-06-04 02:38:07', '2026-06-08 00:40:32'),
(25, 'SKU018', 'Sopa de Pasta 200g', 'Pasta de sémola de trigo', 8.00, 13.00, 400, 'prod_6a260f729a4af.webp', '2026-06-04 02:38:07', '2026-06-08 00:40:18'),
(26, 'SKU019', 'Salsa de Tomate 400g', 'Salsa sazonada para cocinar', 14.00, 21.00, 130, 'prod_6a260f5fd88f0.webp', '2026-06-04 02:38:07', '2026-06-08 00:39:59'),
(27, 'SKU020', 'Mayonesa 390g', 'Mayonesa clásica con limón', 32.00, 45.00, 70, 'prod_6a260f48f3463.webp', '2026-06-04 02:38:07', '2026-06-08 00:39:36'),
(28, 'SKU021', 'Mostaza 200g', 'Mostaza amarilla preparada', 15.00, 23.00, 85, 'prod_6a25dde30a401.webp', '2026-06-04 02:38:07', '2026-06-07 21:08:51'),
(29, 'SKU022', 'Mermelada de Fresa 350g', 'Hecha con fruta natural', 28.00, 40.00, 55, 'prod_6a25ddc891f5c.webp', '2026-06-04 02:38:07', '2026-06-07 21:08:24'),
(30, 'SKU023', 'Pan de Caja Integral', 'Pan de molde con linaza', 34.00, 46.00, 50, 'prod_6a25ddb816a3f.webp', '2026-06-04 02:38:07', '2026-06-07 21:08:08'),
(31, 'SKU024', 'Puré de Papa 125g', 'Puré instantáneo en hojuelas', 18.00, 26.00, 95, 'prod_6a25dda29a54c.webp', '2026-06-04 02:38:07', '2026-06-07 21:07:46'),
(32, 'SKU025', 'Chocolate en Polvo 400g', 'Para disolver en leche', 40.00, 58.00, 60, 'prod_6a25dd92833a8.webp', '2026-06-04 02:38:07', '2026-06-07 21:07:30'),
(33, 'SKU026', 'Té Verde 20 sobres', 'Té verde orgánico', 25.00, 37.00, 80, 'prod_6a25dd82b55ee.webp', '2026-06-04 02:38:07', '2026-06-07 21:07:14'),
(34, 'SKU027', 'Servilletas 100 pzas', 'Servilletas de papel absorbente', 16.00, 24.00, 115, 'prod_6a25dd6e3822a.webp', '2026-06-04 02:38:07', '2026-06-07 21:06:54'),
(36, 'SKU029', 'Limpiador Multiusos 1L', 'Aroma lavanda de larga duración', 24.00, 35.00, 90, 'prod_6a25dd5f47769.webp', '2026-06-04 02:38:07', '2026-06-07 21:06:39'),
(37, 'SKU030', 'Cloro Líquido 1L', 'Desinfectante y blanqueador', 15.00, 22.00, 130, 'prod_6a25dd4a280a9.webp', '2026-06-04 02:38:07', '2026-06-07 21:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nombre_completo`) VALUES
(1, 'admin', '$2y$10$YOt2bTiAe3jK1/5SFmenlO1D0lkvzkUTLKOASnfCBRpcqQrwLbEvi', 'Administrador General');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitacora_admin`
--
ALTER TABLE `bitacora_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitacora_admin`
--
ALTER TABLE `bitacora_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
