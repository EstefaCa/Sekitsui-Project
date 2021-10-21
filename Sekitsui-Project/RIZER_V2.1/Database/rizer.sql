-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2021 a las 13:51:12
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rizer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

CREATE TABLE `details` (
  `Details_Id` int(11) NOT NULL,
  `Details_Weight` int(10) NOT NULL,
  `Details_Size` int(10) NOT NULL,
  `Details_Gender` enum('Mujer','Hombre') NOT NULL,
  `Details_Date_of_birth` date DEFAULT current_timestamp(),
  `Details_Age` int(11) DEFAULT NULL,
  `Details_Physical_activity` int(45) DEFAULT NULL,
  `Details_Active` tinyint(4) NOT NULL DEFAULT 1,
  `Details_IMC` int(11) DEFAULT NULL,
  `Details_MCM` int(11) DEFAULT NULL,
  `Details_Ideal_weight` int(11) DEFAULT NULL,
  `Details_ASC` int(11) DEFAULT NULL,
  `Details_ACT` int(11) DEFAULT NULL,
  `Details_Recommended_calories` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `details`
--

INSERT INTO `details` (`Details_Id`, `Details_Weight`, `Details_Size`, `Details_Gender`, `Details_Date_of_birth`, `Details_Age`, `Details_Physical_activity`, `Details_Active`, `Details_IMC`, `Details_MCM`, `Details_Ideal_weight`, `Details_ASC`, `Details_ACT`, `Details_Recommended_calories`) VALUES
(59, 70, 175, 'Hombre', '0004-06-14', 2017, 4, 1, 23, 57, 69, 2, 227, -8286),
(61, 85, 175, 'Hombre', '2004-05-17', 17, 7, 1, 28, 63, 69, 2, 49, 1864),
(62, 85, 175, 'Hombre', '2004-05-01', 17, 7, 1, 28, 63, 69, 2, 49, 1864);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gadgets`
--

CREATE TABLE `gadgets` (
  `Gadgets_Id` int(11) NOT NULL,
  `Gadgets_Model` varchar(45) NOT NULL,
  `Gadgets_Capacity` tinyint(10) NOT NULL,
  `Gadgets_Max_Temperature` tinyint(10) NOT NULL,
  `Gadgets_Max_Weight` tinyint(10) NOT NULL,
  `Gadgets_Voltage` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredients`
--

CREATE TABLE `ingredients` (
  `Ingredients_Id` int(11) NOT NULL,
  `Ingredients_Quantity` tinyint(4) NOT NULL,
  `Recipes_Recipes_Id` int(11) NOT NULL,
  `Time_Time_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipes`
--

CREATE TABLE `recipes` (
  `Recipes_Id` int(11) NOT NULL,
  `Gadgets_Gadgets_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Roles_Id` int(11) NOT NULL,
  `Roles_Name` varchar(30) NOT NULL,
  `Roles_Active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Roles_Id`, `Roles_Name`, `Roles_Active`) VALUES
(1, 'Usuario', 1),
(2, 'Admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time`
--

CREATE TABLE `time` (
  `Time_Id` int(11) NOT NULL,
  `Time_Cooking` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Users_Id` int(11) NOT NULL,
  `Users_Nickname` varchar(20) NOT NULL,
  `Users_User` varchar(30) NOT NULL,
  `Users_Name` varchar(45) NOT NULL,
  `Users_LastName` varchar(45) NOT NULL,
  `Users_Email` varchar(115) NOT NULL,
  `Users_Password` varchar(200) DEFAULT NULL,
  `Users_Active` tinyint(4) DEFAULT 0,
  `Users_date_of_registration` datetime DEFAULT current_timestamp(),
  `Users_Telephone` bigint(20) DEFAULT NULL,
  `Details_Details_Id` int(11) DEFAULT NULL,
  `Roles_Roles_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Users_Id`, `Users_Nickname`, `Users_User`, `Users_Name`, `Users_LastName`, `Users_Email`, `Users_Password`, `Users_Active`, `Users_date_of_registration`, `Users_Telephone`, `Details_Details_Id`, `Roles_Roles_Id`) VALUES
(60, 'Tefa', '', 'Estefanía', '', 'estefaniaalarcon2011@gmail.com', '0c5678714364cde833bee262411be860', 0, '2021-10-15 21:32:14', NULL, NULL, 1),
(61, 'Dani', '@estefa', 'Daniel', '', 'danielpuerta5789@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2021-10-15 21:35:21', 0, 61, 1),
(62, 'Rendón', '@Jhony', 'Jonatan', '', 'jonatanrendon77@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 1, '2021-10-19 07:49:58', 3104567876, 62, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_has_gadget`
--

CREATE TABLE `users_has_gadget` (
  `Users_Users_Id` int(11) NOT NULL,
  `Gadgets_Gadgets_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`Details_Id`);

--
-- Indices de la tabla `gadgets`
--
ALTER TABLE `gadgets`
  ADD PRIMARY KEY (`Gadgets_Id`);

--
-- Indices de la tabla `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`Ingredients_Id`),
  ADD KEY `fk_Ingredients_Recipes1_idx` (`Recipes_Recipes_Id`),
  ADD KEY `fk_Ingredients_Time1_idx` (`Time_Time_Id`);

--
-- Indices de la tabla `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`Recipes_Id`),
  ADD KEY `fk_Recipes_Gadgets1_idx` (`Gadgets_Gadgets_Id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Roles_Id`);

--
-- Indices de la tabla `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`Time_Id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Users_Id`),
  ADD UNIQUE KEY `Users_Nickname_UNIQUE` (`Users_Nickname`),
  ADD KEY `fk_Users_Details1_idx` (`Details_Details_Id`),
  ADD KEY `fk_Users_Roles1_idx` (`Roles_Roles_Id`);

--
-- Indices de la tabla `users_has_gadget`
--
ALTER TABLE `users_has_gadget`
  ADD PRIMARY KEY (`Users_Users_Id`),
  ADD KEY `fk_Users_has_Gadget_Users1_idx` (`Users_Users_Id`),
  ADD KEY `fk_Users_has_Gadget_Gadgets1_idx` (`Gadgets_Gadgets_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gadgets`
--
ALTER TABLE `gadgets`
  MODIFY `Gadgets_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `Ingredients_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recipes`
--
ALTER TABLE `recipes`
  MODIFY `Recipes_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Roles_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `time`
--
ALTER TABLE `time`
  MODIFY `Time_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `Users_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `fk_Ingredients_Recipes1` FOREIGN KEY (`Recipes_Recipes_Id`) REFERENCES `recipes` (`Recipes_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ingredients_Time1` FOREIGN KEY (`Time_Time_Id`) REFERENCES `time` (`Time_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `fk_Recipes_Gadgets1` FOREIGN KEY (`Gadgets_Gadgets_Id`) REFERENCES `gadgets` (`Gadgets_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_Users_Details1` FOREIGN KEY (`Details_Details_Id`) REFERENCES `details` (`Details_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_Roles1` FOREIGN KEY (`Roles_Roles_Id`) REFERENCES `roles` (`Roles_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_has_gadget`
--
ALTER TABLE `users_has_gadget`
  ADD CONSTRAINT `fk_Users_has_Gadget_Gadgets1` FOREIGN KEY (`Gadgets_Gadgets_Id`) REFERENCES `gadgets` (`Gadgets_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_has_Gadget_Users1` FOREIGN KEY (`Users_Users_Id`) REFERENCES `users` (`Users_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
