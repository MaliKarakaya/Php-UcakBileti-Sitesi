-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 May 2019, 01:54:08
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `airlinereservation`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`UserName`, `Password`) VALUES
('admin1@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `airport`
--

CREATE TABLE `airport` (
  `AirportId` varchar(50) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `airport`
--

INSERT INTO `airport` (`AirportId`, `CityName`, `State`) VALUES
('1', 'Istanbul', 'Ankara'),
('2', 'Ankara', 'Ankara'),
('3', 'Mersin', 'Mersin'),
('4', 'Antalya', 'Antalya'),
('5', 'Samsun', 'Samsun'),
('6', 'Erzurum', 'Erzurum');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `available_seats`
--

CREATE TABLE `available_seats` (
  `CategoryId` varchar(10) NOT NULL DEFAULT '',
  `InstanceId` varchar(10) NOT NULL DEFAULT '',
  `Availability` varchar(10) DEFAULT NULL,
  `Total_Seats` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `available_seats`
--

INSERT INTO `available_seats` (`CategoryId`, `InstanceId`, `Availability`, `Total_Seats`) VALUES
('1', '1177', '19', '20'),
('1', '1212', '19', '20'),
('Business E', '777', '9', '10'),
('Economy', '114555', '19', '20'),
('Economy', '2025', '19', '20'),
('Economy', '2211112', '19', '20'),
('Economy', '2229', '19', '20'),
('Economy', '2360', '19', '20'),
('Economy', '2666', '19', '20'),
('Economy', '2679', '19', '20'),
('Economy', '2902', '19', '20'),
('Economy', '334', '19', '20'),
('Economy', '954', '19', '20'),
('Ekonomi', '2147483647', '19', '20'),
('Ekonomi', '87', '19', '20'),
('First Clas', '2185', '19', '20'),
('First Clas', '2431', '19', '20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `flight`
--

CREATE TABLE `flight` (
  `flight_no` varchar(10) NOT NULL DEFAULT '',
  `SheduledDeparture` time DEFAULT NULL,
  `ScheduledArrival` time DEFAULT NULL,
  `From_Airport_id` varchar(10) DEFAULT NULL,
  `To_Airport_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `flight`
--

INSERT INTO `flight` (`flight_no`, `SheduledDeparture`, `ScheduledArrival`, `From_Airport_id`, `To_Airport_id`) VALUES
('11', '12:00:00', '14:00:00', '1', '2'),
('11111', '01:01:00', '00:00:00', '2', '1'),
('111414', '20:02:00', '21:20:00', '2', '3'),
('1114145', '20:02:00', '21:20:00', '2', '3'),
('1114148', '03:20:00', '20:20:00', '2', '4'),
('11141485', '03:20:00', '20:20:00', '2', '4'),
('112', '01:01:00', '00:00:00', '2', '1'),
('1177', '20:20:00', '21:20:00', '2', '1'),
('11975', '20:20:00', '20:20:00', '1', '3'),
('121212', '20:20:00', '21:20:00', '2', '1'),
('12134', '20:20:00', '20:40:00', '2', '4'),
('22', '16:00:00', '18:00:00', '2', '1'),
('223', '01:00:00', '00:00:00', '2', '1'),
('2524211', '20:20:00', '20:20:00', '5', '3'),
('33', '09:00:00', '12:00:00', '3', '1'),
('334', '01:00:00', '00:00:00', '2', '1'),
('44', '13:00:00', '16:00:00', '3', '4'),
('55', '01:00:00', '07:00:00', '1', '4'),
('66', '12:00:00', '16:00:00', '3', '4'),
('7677', '20:20:00', '20:20:00', '3', '4'),
('77', '15:00:00', '21:00:00', '4', '3'),
('78', '23:03:00', '23:02:00', '6', '3'),
('78687', '20:20:00', '20:20:00', '3', '2'),
('88', '13:00:00', '17:00:00', '3', '1'),
('954', '00:00:00', '00:00:00', '2', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `flight_instance`
--

CREATE TABLE `flight_instance` (
  `InstanceId` varchar(10) NOT NULL DEFAULT '',
  `ArriveTime` time DEFAULT NULL,
  `DepartTime` time DEFAULT NULL,
  `ArrivalDate` date DEFAULT NULL,
  `DepartureDate` date DEFAULT NULL,
  `Flight_no` varchar(10) DEFAULT NULL,
  `Status` int(5) NOT NULL DEFAULT '1',
  `Fare` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `flight_instance`
--

INSERT INTO `flight_instance` (`InstanceId`, `ArriveTime`, `DepartTime`, `ArrivalDate`, `DepartureDate`, `Flight_no`, `Status`, `Fare`) VALUES
('111', '14:00:00', '12:00:00', '2019-03-08', '2019-03-13', '11', 0, NULL),
('114', '00:00:00', '10:10:00', '2019-04-17', '2019-04-18', '11', 0, 350),
('1145', '00:00:00', '01:01:00', '2019-04-20', '2019-04-26', '11111', 0, 508),
('114555', '21:20:00', '20:02:00', '2019-05-24', '2019-05-25', '1114145', 1, 1555),
('1177', '21:20:00', '20:20:00', '2019-04-19', '2019-04-20', '1177', 1, 777),
('1212', '21:20:00', '20:20:00', '2019-04-18', '2019-04-19', '121212', 1, 645),
('2025', '20:20:00', '20:20:00', '1994-02-12', '1994-03-12', '78687', 1, 15),
('2147483647', '20:40:00', '20:20:00', '2019-05-09', '2019-05-08', '111414', 1, 250),
('2185', '20:20:00', '20:20:00', '2019-05-03', '2019-05-03', '7677', 1, 250),
('2211112', '00:00:00', '00:00:00', '2019-05-07', '2019-05-08', '954', 1, 1500),
('222', '18:00:00', '16:00:00', '2016-11-20', '2016-11-20', '22', 0, NULL),
('2229', '00:12:00', '01:00:00', '2019-05-24', '2019-05-23', '111414', 1, 1500),
('223', '21:00:00', '23:00:00', '2016-11-21', '2016-11-21', '22', 0, NULL),
('224', '06:00:00', '01:00:00', '2016-11-30', '2016-11-30', '22', 0, NULL),
('2360', '00:12:00', '01:00:00', '2019-05-24', '2019-05-23', '111414', 1, 1500),
('2431', '20:20:00', '20:20:00', '2019-05-03', '2019-05-03', '7677', 1, 250),
('2666', '20:20:00', '20:20:00', '2019-07-07', '2019-08-10', '2524211', 1, 2500),
('2679', '20:20:00', '20:20:00', '1994-02-12', '1994-03-12', '78687', 1, 15),
('2902', '20:20:00', '20:20:00', '2019-05-08', '2019-05-09', '11975', 1, 1500),
('334', '00:00:00', '01:00:00', '2019-04-05', '2019-05-03', '334', 1, 500),
('666', '16:00:00', '12:00:00', '2019-03-08', '2019-03-15', '66', 0, 300),
('777', '21:00:00', '15:00:00', '2016-11-24', '2016-11-24', '77', 1, 400),
('87', '23:02:00', '23:03:00', '2019-04-19', '2019-04-20', '78', 1, 55),
('888', '17:00:00', '13:00:00', '2016-11-30', '2016-11-30', '88', 0, 700),
('954', '00:00:00', '00:00:00', '2019-05-07', '2019-05-08', '954', 1, 1500);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `passenger`
--

CREATE TABLE `passenger` (
  `PassengerId` varchar(10) NOT NULL DEFAULT '',
  `Passenger_Name` varchar(20) DEFAULT NULL,
  `Passenger_Age` int(3) DEFAULT NULL,
  `Meal_Preference` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `passenger`
--

INSERT INTO `passenger` (`PassengerId`, `Passenger_Name`, `Passenger_Age`, `Meal_Preference`) VALUES
('4e810', 'abc', 23, 'Vegetarian'),
('59678', 'Pass1', 12, 'Vegetarian'),
('5ed32', 'pass', 2, 'Vegetarian'),
('74d2f', 'Abc', 2, 'Vegetarian'),
('760e8', 'Hij', 3, 'NonVegetar'),
('a8497', 'A', 1, 'Vegetarian'),
('ab8df', 'Passenger', 10, 'Vegetarian'),
('e8c5f', 'Passenger', 10, 'Vegetarian'),
('f720c', 'Passenger', 20, 'Vegetarian'),
('fc4f1', 'p1', 2, 'Vegetarian'),
('fd27d', 'Passenger', 10, 'Vegetarian'),
('ff980', 'Pass2', 14, 'Vegetarian');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `passenger_reservation`
--

CREATE TABLE `passenger_reservation` (
  `PassengerId` varchar(20) NOT NULL DEFAULT '',
  `ReservationId` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `passenger_reservation`
--

INSERT INTO `passenger_reservation` (`PassengerId`, `ReservationId`) VALUES
('4e810', '0fd73'),
('59678', 'c8fc6'),
('5ed32', '7d51c'),
('74d2f', '51415'),
('760e8', '51415'),
('a8497', '7efef'),
('ab8df', '869eb'),
('e8c5f', 'e4156'),
('f720c', '6832a'),
('fc4f1', '86931'),
('fd27d', 'afb94'),
('ff980', 'c8fc6');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payment`
--

CREATE TABLE `payment` (
  `PaymentId` varchar(10) NOT NULL,
  `Card_no` varchar(10) NOT NULL,
  `Amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `payment`
--

INSERT INTO `payment` (`PaymentId`, `Card_no`, `Amount`) VALUES
('1', 'xyz123', '200');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reservation`
--

CREATE TABLE `reservation` (
  `ReservationId` varchar(10) NOT NULL DEFAULT '',
  `Amount` varchar(10) DEFAULT NULL,
  `UserName` varchar(30) DEFAULT NULL,
  `InstanceId` varchar(10) DEFAULT NULL,
  `ReturnInstanceId` int(11) DEFAULT NULL,
  `PaymentId` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `reservation`
--

INSERT INTO `reservation` (`ReservationId`, `Amount`, `UserName`, `InstanceId`, `ReturnInstanceId`, `PaymentId`) VALUES
('0248f', NULL, 'sasa@gmail.com', '777', 666, NULL),
('0fd73', NULL, 'emma.watson@gmail.com', '777', 666, NULL),
('362f2', NULL, 'shakti.shivaputra@utdallas.edu', '777', 666, NULL),
('3f2cc', NULL, 'sasa@gmail.com', '777', 666, NULL),
('51415', NULL, 'shakti.shivaputra@utdallas.edu', '111', 224, NULL),
('5c98e', NULL, 'sasa@gmail.com', '334', 0, NULL),
('5fc39', NULL, 'sasa@gmail.com', '334', 0, NULL),
('6832a', NULL, 'shakti.shivaputra@utdallas.edu', '222', 111, NULL),
('7d51c', NULL, 'shakti.shivaputra@utdallas.edu', '222', 0, NULL),
('7efef', NULL, 'shakti.shivaputra@utdallas.edu', '222', 0, NULL),
('86931', NULL, 'shakti.shivaputra@utdallas.edu', '222', 111, NULL),
('869eb', NULL, 'shakti.shivaputra@utdallas.edu', '222', 111, NULL),
('a85fb', NULL, 'sasa@gmail.com', NULL, NULL, NULL),
('afb94', NULL, 'shakti.shivaputra@utdallas.edu', '222', 111, NULL),
('b5394', NULL, 'sasa@gmail.com', '334', 0, NULL),
('c5fac', NULL, 'shakti.shivaputra@utdallas.edu', '777', 666, NULL),
('c8fc6', NULL, 'shakti.shivaputra@utdallas.edu', '111', 0, NULL),
('e4156', NULL, 'shakti.shivaputra@utdallas.edu', '222', 111, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seats`
--

CREATE TABLE `seats` (
  `Seat_no` varchar(10) NOT NULL,
  `Seat_Category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `seats`
--

INSERT INTO `seats` (`Seat_no`, `Seat_Category`) VALUES
('01e19', 'Economy'),
('0c50a', 'Economy'),
('10a41', 'Economy'),
('11644', 'Economy'),
('13c2f', 'Economy'),
('1409f', 'Economy'),
('20f35', 'Economy'),
('23f2f', 'Economy'),
('2401e', 'Economy'),
('24d97', 'Economy'),
('25fa0', 'Economy'),
('27b2b', 'Economy'),
('2df88', 'Economy'),
('2f308', 'Economy'),
('30cf8', 'Economy'),
('3456e', 'Economy'),
('3753f', 'Economy'),
('3df4c', 'Economy'),
('41e6d', 'Economy'),
('42f1a', 'Economy'),
('45872', 'Economy'),
('4b0cf', 'Economy'),
('4f74c', 'Economy'),
('4f7fd', 'Economy'),
('50a76', 'Economy'),
('55748', 'Economy'),
('59ddb', 'Economy'),
('5a35c', 'Economy'),
('65602', 'Economy'),
('6690a', 'Economy'),
('66a8d', 'Economy'),
('68c3b', 'Economy'),
('69f97', 'Economy'),
('6a2f2', 'Economy'),
('6b434', 'Economy'),
('796f9', 'Economy'),
('7afb3', 'Economy'),
('7c835', 'Economy'),
('80f74', 'Economy'),
('83bad', 'Economy'),
('84fa3', 'Economy'),
('86c9d', 'Economy'),
('8d67e', 'Economy'),
('948fe', 'Economy'),
('97ea4', 'Economy'),
('98aa6', 'Economy'),
('a0b37', 'Economy'),
('a3a84', 'Economy'),
('a49b0', 'Economy'),
('a5558', 'Economy'),
('a879b', 'Economy'),
('aabfe', 'Economy'),
('ad9dc', 'Economy'),
('b1b2a', 'Economy'),
('b3b41', 'Economy'),
('b47df', 'Economy'),
('b5908', 'Economy'),
('b6899', 'Economy'),
('b8f8f', 'Economy'),
('ba0fa', 'Economy'),
('bef93', 'Economy'),
('c4665', 'Economy'),
('ca09e', 'Economy'),
('cb047', 'Economy'),
('cf3ca', 'Economy'),
('cf567', 'Economy'),
('d3164', 'Economy'),
('d3c83', 'Economy'),
('d76ad', 'Economy'),
('d90b5', 'Economy'),
('da16b', 'Economy'),
('db284', 'Economy'),
('de5c3', 'Economy'),
('e33d8', 'Economy'),
('e5016', 'Economy'),
('e687e', 'Economy'),
('ebce0', 'Economy'),
('ef68c', 'Economy'),
('f2c3d', 'Economy'),
('f3eca', 'Economy'),
('f449d', 'Economy'),
('f7387', 'Economy'),
('f75b4', 'Economy'),
('faedd', 'Economy');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seats_reservation`
--

CREATE TABLE `seats_reservation` (
  `Seat_no` varchar(10) NOT NULL DEFAULT '',
  `ReservationId` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `seats_reservation`
--

INSERT INTO `seats_reservation` (`Seat_no`, `ReservationId`) VALUES
('13c2f', '869eb'),
('23f2f', 'c8fc6'),
('25fa0', '362f2'),
('30cf8', 'c8fc6'),
('42f1a', 'e4156'),
('4f7fd', '86931'),
('66a8d', 'afb94'),
('6a2f2', '51415'),
('7afb3', '0fd73'),
('7c835', '51415'),
('80f74', '6832a'),
('83bad', 'c5fac'),
('84fa3', '51415'),
('948fe', '7efef'),
('97ea4', 'c5fac'),
('a879b', '51415'),
('b1b2a', '7efef'),
('b47df', '362f2'),
('b5908', '0fd73'),
('ba0fa', '51415'),
('ca09e', '6832a'),
('cb047', '7d51c'),
('cf3ca', 'e4156'),
('d3164', '869eb'),
('d76ad', '86931'),
('d90b5', '7d51c'),
('da16b', 'c8fc6'),
('e5016', '0fd73'),
('ef68c', '0fd73'),
('f2c3d', 'afb94'),
('f7387', '51415');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `UserName` varchar(50) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Street_no` varchar(10) NOT NULL,
  `City` varchar(10) NOT NULL,
  `State` varchar(20) NOT NULL,
  `ZipCode` int(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`UserName`, `FirstName`, `LastName`, `Street_no`, `City`, `State`, `ZipCode`, `Password`, `Dob`) VALUES
('asdan1@gmail.com', 'ahmet', 'sfsfs', '', '', '', 0, '1234567fb', '2019-04-26'),
('deneeeeeme@gmail.com', 'deneme', 'deneme123', '', '', '', 0, '123', '2019-04-21'),
('deneme123@gmail.com', 'deneme', 'deneme123', '', '', '', 0, '1234567fb', '1994-01-10'),
('emma.watson@gmail.com', 'Emma', 'Watson', '', '', '', 0, 'user1', '2016-11-04'),
('kral_meric_23@hotmail.com', 'MeriÃ§', 'Erdem', '', '', '', 0, '1234567fb', '1994-02-12'),
('mddata.ramazan@gmail.com', 'ramazan', 'akbuz', '', '', '', 0, '1234567fb', '1994-02-12'),
('ramazan@gmail.com', 'ahmet', 'hamditanpi', '', '', '', 0, '1234567fb', '1994-02-12'),
('sasa@gmail.com', 'sa', 'sa', '', '', '', 0, 'sa', '1994-02-12'),
('shakti.shivaputra@utdallas.edu', 'Shakti', 'Shivaputra', '', '', '', 0, 'abc123', '0000-00-00'),
('tesla@gmail.com', 'Tesla', 'P', '', '', '', 0, 'bce123', '0000-00-00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserName`);

--
-- Tablo için indeksler `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`AirportId`);

--
-- Tablo için indeksler `available_seats`
--
ALTER TABLE `available_seats`
  ADD PRIMARY KEY (`CategoryId`,`InstanceId`),
  ADD KEY `InstanceId` (`InstanceId`);

--
-- Tablo için indeksler `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_no`),
  ADD KEY `From_Airport_id` (`From_Airport_id`),
  ADD KEY `To_Airport_id` (`To_Airport_id`);

--
-- Tablo için indeksler `flight_instance`
--
ALTER TABLE `flight_instance`
  ADD PRIMARY KEY (`InstanceId`),
  ADD KEY `Flight_no` (`Flight_no`);

--
-- Tablo için indeksler `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`PassengerId`);

--
-- Tablo için indeksler `passenger_reservation`
--
ALTER TABLE `passenger_reservation`
  ADD PRIMARY KEY (`PassengerId`,`ReservationId`),
  ADD KEY `ReservationId` (`ReservationId`);

--
-- Tablo için indeksler `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentId`);

--
-- Tablo için indeksler `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationId`),
  ADD KEY `UserName` (`UserName`),
  ADD KEY `InstanceId` (`InstanceId`),
  ADD KEY `PaymentId` (`PaymentId`);

--
-- Tablo için indeksler `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`Seat_no`);

--
-- Tablo için indeksler `seats_reservation`
--
ALTER TABLE `seats_reservation`
  ADD PRIMARY KEY (`Seat_no`,`ReservationId`),
  ADD KEY `ReservationId` (`ReservationId`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `available_seats`
--
ALTER TABLE `available_seats`
  ADD CONSTRAINT `available_seats_ibfk_1` FOREIGN KEY (`InstanceId`) REFERENCES `flight_instance` (`InstanceId`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`From_Airport_id`) REFERENCES `airport` (`AirportId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`To_Airport_id`) REFERENCES `airport` (`AirportId`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `flight_instance`
--
ALTER TABLE `flight_instance`
  ADD CONSTRAINT `flight_instance_ibfk_1` FOREIGN KEY (`Flight_no`) REFERENCES `flight` (`flight_no`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `passenger_reservation`
--
ALTER TABLE `passenger_reservation`
  ADD CONSTRAINT `passenger_reservation_ibfk_1` FOREIGN KEY (`PassengerId`) REFERENCES `passenger` (`PassengerId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `passenger_reservation_ibfk_2` FOREIGN KEY (`ReservationId`) REFERENCES `reservation` (`ReservationId`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `user` (`UserName`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`InstanceId`) REFERENCES `flight_instance` (`InstanceId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`PaymentId`) REFERENCES `payment` (`PaymentId`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `seats_reservation`
--
ALTER TABLE `seats_reservation`
  ADD CONSTRAINT `seats_reservation_ibfk_1` FOREIGN KEY (`ReservationId`) REFERENCES `reservation` (`ReservationId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
