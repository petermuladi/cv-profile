-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 10:15 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

CREATE DATABASE `sajat_profil`;

USE `sajat_profil`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `sajat_profil`
--

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `teljes_nev` varchar(255) NOT NULL,
  `szuletesi_hely` varchar(255) NOT NULL,
  `szuletesi_datum` date NOT NULL,
  `allampolgarsag` varchar(255) NOT NULL,
  `bemutatkozas` text DEFAULT NULL,
  `hobbik` text DEFAULT NULL,
  `telefonszamok` text DEFAULT NULL
);

--
-- Dumping data for table `felhasznalo`
--

INSERT INTO `felhasznalo` (`id`, `email`, `jelszo`, `teljes_nev`, `szuletesi_hely`, `szuletesi_datum`, `allampolgarsag`, `bemutatkozas`, `hobbik`, `telefonszamok`) VALUES
(64, 'jozsi1@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5 ', 'Kovács József', 'Győr', '1990-01-01', 'magyar', 'Szeretek sportolni és utazni!', 'futás, úszás, kirándulás', '+36301234567'),
(65, 'tibi1@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Nagy Tibor', 'Debrecen', '1993-05-12', 'magyar', 'Szeretek zenét hallgatni és programozni!', 'zongora, számítógépezés', '+36304567890'),
(67, 'anna1@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Kovács Anna', 'Budapest', '1992-07-05', 'magyar', 'Szeretem a kutyáimat és a kirándulást!', 'kutyasétáltatás, tánc, olvasás', '+36701234567'),
(70, 'kati1@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Kiss Katalin', 'Debrecen', '1990-07-18', 'magyar', 'Szia, Kati vagyok, örülök, hogy megtaláltál!', 'tánc, sport, utazás', '+36700123456'),
(73, 'szabo.zsuzsa@example.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Szabó Zsuzsa', 'Szeged', '1995-02-17', 'magyar', 'Üdvözöllek az oldalamon!', 'Sütés, festés, zongorázás', '+36203456789'),
(74, 'horvath.attila@example.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Horváth Attila', 'Miskolc', '1992-12-03', 'magyar', 'Üdvözlöm az oldalamon!', 'Futás, kosárlabda, utazás', '+36304567890'),
(75, 'toth.krisztian@example.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Tóth Krisztián', 'Székesfehérvár', '1991-07-25', 'magyar', 'Szeretek zenét hallgatni!', 'Zenehallgatás, biciklizés, főzés', '+36705678901'),
(76, 'kovacs.kitti@example.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Kovács Kitti', 'Eger', '1994-03-14', 'magyar', 'Szeretek utazni és új helyeket felfedezni!', 'Utazás, olvasás, rajzolás', '+36206789012'),
(77, 'kiss.adam@example.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Kiss Ádám', 'Debrecen', '1990-05-10', 'magyar', 'Üdvözlöm az oldalamon!', 'Jóga, úszás, olvasás', '+36201234567'),
(110, 'test1@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5 ', 'Teszt-név', 'Budapest', '2023-03-16', 'Magyar', 'teszt-bemutatkozás....', 'nincs', '123-4567');

-- --------------------------------------------------------

--
-- Table structure for table `iskola`
--

CREATE TABLE `iskola` (
  `id` int(11) NOT NULL,
  `felhasznalo_id` int(11) NOT NULL,
  `intezmeny_neve` varchar(255) NOT NULL,
  `kezdes_datuma` date NOT NULL,
  `befejezes_datuma` date DEFAULT NULL,
  `szak` varchar(255) NOT NULL
);

--
-- Dumping data for table `iskola`
--

INSERT INTO `iskola` (`id`, `felhasznalo_id`, `intezmeny_neve`, `kezdes_datuma`, `befejezes_datuma`, `szak`) VALUES
(25, 64, 'Eötvös Loránd Tudományegyetem', '2008-09-01', '2012-06-30', 'Informatika BSc'),
(26, 64, 'Budapesti Műszaki és Gazdaságtudományi Egyetem', '2012-09-01', '2014-06-30', 'Közgadaság'),
(27, 64, 'Pázmány Péter Katolikus Egyetem', '2014-09-01', '2017-06-30', 'Informatika PhD'),
(28, 65, 'Debreceni Egyetem', '2011-09-01', '2015-06-30', 'Informatika BSc'),
(29, 65, 'Eötvös Loránd Tudományegyetem', '2015-09-01', '2017-06-30', 'Informatika MSc'),
(30, 65, 'Budapesti Műszaki és Gazdaságtudományi Egyetem', '2017-09-01', '2019-06-30', 'Informatika'),
(31, 67, 'Eötvös Loránd Tudományegyetem', '2010-09-01', '2014-06-30', 'Biológia BSc'),
(32, 67, 'Semmelweis Egyetem', '2014-09-01', '2016-06-30', 'Orvosi laboratóriumi diagnosztika'),
(33, 67, 'Debreceni Egyetem', '2016-09-01', '2019-06-30', 'Biológia'),
(34, 70, 'Debreceni Egyetem', '2008-09-01', '2012-06-15', 'Közgazdasági elemző és gazdasági informatikus BSc'),
(35, 70, 'Budapesti Corvinus Egyetem', '2012-09-01', '2014-06-30', 'Közgazdász MSc'),
(36, 70, 'Eötvös Loránd Tudományegyetem', '2014-09-01', '2017-06-30', 'Pénzügyi doktori program'),
(37, 73, 'Szegedi Tudományegyetem', '2014-09-01', '2020-06-30', 'Biológus'),
(38, 73, 'Herman Ottó Gimnázium', '2006-09-01', '2010-06-30', 'Természettudományos'),
(39, 73, 'Szegedi Móra Ferenc Általános Iskola', '1999-09-01', '2006-06-30', 'Közgazdaság'),
(40, 74, 'Budapesti Műszaki és Gazdaságtudományi Egyetem', '2009-09-01', '2014-06-30', 'Gépészmérnöki kar'),
(41, 74, 'Budapesti Corvinus Egyetem', '2015-09-01', '2017-06-30', 'MBA menedzsment'),
(42, 74, 'Budapesti Gazdasági Egyetem', '2017-09-01', '2021-03-15', 'Marketing szakirány'),
(43, 75, 'Debreceni Egyetem', '2011-09-01', '2014-06-30', 'Informatikus'),
(44, 75, 'Budapesti Műszaki és Gazdaságtudományi Egyetem', '2014-09-01', '2017-06-30', 'Villamosmérnöki kar'),
(45, 75, 'ELTE TTK', '2017-09-01', '2021-09-15', 'Programtervező informatikus'),
(46, 76, 'Budapesti Corvinus Egyetem', '2010-09-01', '2014-06-30', 'Közgazdaságtan'),
(47, 76, 'Budapesti Corvinus Egyetem', '2014-09-01', '2017-06-30', 'Vezetéstudomány'),
(48, 76, 'Veres Pálné Gimnázium', '2006-09-01', '2010-06-30', 'Történelem'),
(49, 77, 'Szegedi Tudományegyetem', '2008-09-01', '2014-06-30', 'Marketing'),
(50, 77, 'Szegedi Tudományegyetem', '2014-09-01', '2016-06-30', 'Agrármérnök'),
(51, 77, 'Benedek Elek Gimnázium', '2002-09-01', '2008-06-30', 'Angol nyelv és irodalom'),
(58, 110, 'Teszt-iskola', '2023-03-10', '2023-03-02', 'teszt-szak');

-- --------------------------------------------------------

--
-- Table structure for table `kepek`
--

CREATE TABLE `kepek` (
  `id` int(11) NOT NULL,
  `felhasznalo_id` int(11) NOT NULL,
  `eleresi_ut` varchar(255) DEFAULT NULL,
  `cim` varchar(255) DEFAULT NULL,
  `fokep` tinyint(1) DEFAULT NULL
);

--
-- Dumping data for table `kepek`
--

INSERT INTO `kepek` (`id`, `felhasznalo_id`, `eleresi_ut`, `cim`, `fokep`) VALUES
(715, 74, './images/3834961346408496f850480.01809349.png', '3834961346408496f850480.01809349.png', 1),
(716, 75, './images/2070266409640849af40ea62.94164403.png', '2070266409640849af40ea62.94164403.png', 1),
(729, 70, './images/838025136640b2e16d45eb4.34855341.png', '838025136640b2e16d45eb4.34855341.png', 1),
(739, 76, './images/1610020321640b4268798cf2.37737130.png', '1610020321640b4268798cf2.37737130.png', 1),
(744, 65, './images/1125763582640b43de221c20.16587481.png', '1125763582640b43de221c20.16587481.png', 1),
(789, 67, './images/896886351640ccc7a030326.19800808.png', '896886351640ccc7a030326.19800808.png', 1),
(843, 64, './images/1957241783640f2cd67af186.64408671.png', '1957241783640f2cd67af186.64408671.png', 1),
(851, 73, './images/55634993640f2da5712e08.17573226.png', '55634993640f2da5712e08.17573226.png', 1),
(859, 77, './images/796599255640f2e3c577344.32334456.png', '796599255640f2e3c577344.32334456.png', 1),
(875, 64, './images/secondary/396970333641032867c8437.44083316.jpg', '396970333641032867c8437.44083316.jpg', 0),
(876, 64, './images/secondary/803209576410328680b474.08905089.jpg', '803209576410328680b474.08905089.jpg', 0),
(877, 65, './images/secondary/1879940429641032cd51d982.00265320.jpg', '1879940429641032cd51d982.00265320.jpg', 0),
(878, 67, './images/secondary/1662514860641032fc1d07d3.83122799.jpg', '1662514860641032fc1d07d3.83122799.jpg', 0),
(879, 67, './images/secondary/1388894939641032fc211654.41766244.jpg', '1388894939641032fc211654.41766244.jpg', 0),
(880, 67, './images/secondary/2013035868641032fc24a7f6.91593691.jpg', '2013035868641032fc24a7f6.91593691.jpg', 0),
(881, 73, './images/secondary/1442273895641033367ae057.33516769.jpg', '1442273895641033367ae057.33516769.jpg', 0),
(882, 73, './images/secondary/1752200804641033367f5330.40903666.jpg', '1752200804641033367f5330.40903666.jpg', 0),
(883, 75, './images/secondary/4493963836410336a60d2e6.46861525.jpg', '4493963836410336a60d2e6.46861525.jpg', 0),
(884, 75, './images/secondary/5689988056410336a64a991.26358935.jpg', '5689988056410336a64a991.26358935.jpg', 0),
(885, 75, './images/secondary/258095166410336a6827c3.14672513.jpg', '258095166410336a6827c3.14672513.jpg', 0),
(886, 70, './images/secondary/220331066641033b83dddd4.70642081.jpg', '220331066641033b83dddd4.70642081.jpg', 0),
(887, 70, './images/secondary/1599221102641033b841bf62.63126887.jpg', '1599221102641033b841bf62.63126887.jpg', 0),
(888, 70, './images/secondary/2087201403641033b84515d1.16342451.jpg', '2087201403641033b84515d1.16342451.jpg', 0),
(889, 77, './images/secondary/788754722641033e760f7c2.76058467.jpg', '788754722641033e760f7c2.76058467.jpg', 0),
(890, 77, './images/secondary/1616469287641033e76564c4.23306776.jpg', '1616469287641033e76564c4.23306776.jpg', 0),
(891, 77, './images/secondary/1125804104641033e7694498.25335301.jpg', '1125804104641033e7694498.25335301.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `munkahely`
--

CREATE TABLE `munkahely` (
  `id` int(11) NOT NULL,
  `felhasznalo_id` int(11) NOT NULL,
  `cegnev` varchar(255) NOT NULL,
  `kezdes_datuma` date NOT NULL,
  `befejezes_datuma` date DEFAULT NULL,
  `munkakor` varchar(255) NOT NULL
);

--
-- Dumping data for table `munkahely`
--

INSERT INTO `munkahely` (`id`, `felhasznalo_id`, `cegnev`, `kezdes_datuma`, `befejezes_datuma`, `munkakor`) VALUES
(39, 64, 'ABC Kft.', '2010-06-01', '2012-12-26', 'Front Office'),
(40, 64, 'DEF Zrt.', '2013-01-01', '2018-05-31', 'Szállítmányozási ügyintéző'),
(41, 64, 'GHI Kft.', '2018-06-01', '2021-06-30', 'Kapcsolati referens'),
(42, 65, 'JKL Kft.', '2013-09-01', '2016-05-31', 'IT támogató'),
(43, 65, 'MNO Zrt.', '2016-06-01', '2018-08-31', 'IT rendszergazda'),
(44, 65, 'PQR Bt.', '2018-09-01', '2020-12-31', 'IT projektmenedzser'),
(45, 67, 'STU Kft.', '2013-05-01', '2015-12-31', 'Pénzügyi asszisztens'),
(46, 67, 'VWX Zrt.', '2016-01-01', '2019-04-30', 'Pénzügyi elemző'),
(47, 67, 'YZA Bt.', '2019-05-01', '2022-03-08', 'Pénzügyi vezető'),
(48, 70, 'BCD Kft.', '2011-11-01', '2013-05-31', 'HR asszisztens'),
(49, 70, 'EFG Zrt.', '2013-06-01', '2017-04-30', 'HR generalista'),
(50, 70, 'HIJ Bt.', '2017-05-01', '2020-12-31', 'HR vezető'),
(51, 73, 'KLM Kft.', '2017-01-01', '2019-06-30', 'Ügyfélszolgálati munkatárs'),
(52, 73, 'NOP Zrt.', '2019-07-01', '2022-01-31', 'Ügyfélszolgálati vezető'),
(53, 73, 'QRS Bt.', '2022-02-01', '2023-02-28', 'Ügyfélszolgálati tréner'),
(54, 74, 'TUV Kft.', '2013-09-01', '2016-06-30', 'Sales asszisztens'),
(55, 74, 'WXY Zrt.', '2016-07-01', '2019-12-31', 'Sales executive'),
(56, 74, 'ZAB Bt.', '2020-01-01', '2022-08-31', 'Sales vezető'),
(57, 75, 'ABC Kft.', '2014-09-01', '2016-08-31', 'Számítógép-szerelő'),
(58, 75, 'DEF Zrt.', '2016-09-01', '2018-08-31', 'Rendszergazda'),
(59, 75, 'GHI Kft.', '2018-09-01', '2021-10-26', 'Informatikus'),
(60, 76, 'JKL Zrt.', '2016-01-01', '2017-12-31', 'Marketing asszisztens'),
(61, 76, 'MNO Kft.', '2018-01-01', '2020-12-31', 'Marketing menedzser'),
(62, 76, 'PQR Zrt.', '2021-01-01', '2023-01-15', 'Marketing igazgató'),
(63, 77, 'ABC Kft.', '2010-06-01', '2012-12-31', 'Raktáros'),
(64, 77, 'DEF Zrt.', '2013-01-01', '2018-05-31', 'Szállítmányozási ügyintéző'),
(65, 77, 'GHI Bt.', '2018-06-01', '2021-06-30', 'Logisztikai vezető'),
(80, 110, 'Új Munkahely', '2023-03-22', '2023-03-23', 'teszt-munkakör');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `iskola`
--
ALTER TABLE `iskola`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_id` (`felhasznalo_id`);

--
-- Indexes for table `kepek`
--
ALTER TABLE `kepek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_id` (`felhasznalo_id`);

--
-- Indexes for table `munkahely`
--
ALTER TABLE `munkahely`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_id` (`felhasznalo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `felhasznalo`
--
ALTER TABLE `felhasznalo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `iskola`
--
ALTER TABLE `iskola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kepek`
--
ALTER TABLE `kepek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=897;

--
-- AUTO_INCREMENT for table `munkahely`
--
ALTER TABLE `munkahely`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iskola`
--
ALTER TABLE `iskola`
  ADD CONSTRAINT `iskola_ibfk_1` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalo` (`id`);

--
-- Constraints for table `kepek`
--
ALTER TABLE `kepek`
  ADD CONSTRAINT `kepek_ibfk_1` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalo` (`id`);

--
-- Constraints for table `munkahely`
--
ALTER TABLE `munkahely`
  ADD CONSTRAINT `munkahely_ibfk_1` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalo` (`id`);
COMMIT;

