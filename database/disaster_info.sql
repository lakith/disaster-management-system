-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 09:13 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disaster_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `disaster_info`
--

CREATE TABLE `disaster_info` (
  `id` int(11) NOT NULL,
  `disaster_type` varchar(100) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `disaster_category` int(11) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `discription` longtext NOT NULL,
  `short_discription` longtext NOT NULL,
  `disaster_management` longtext NOT NULL,
  `special_note` longtext NOT NULL,
  `warning_note` longtext NOT NULL,
  `no_of_injuries` int(11) NOT NULL,
  `no_of_deaths` int(11) NOT NULL,
  `Damage_ammount` double NOT NULL,
  `person_informed` int(11) NOT NULL,
  `conformation` bit(1) NOT NULL,
  `disaster_name` varchar(100) NOT NULL,
  `disaster_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disaster_info`
--

INSERT INTO `disaster_info` (`id`, `disaster_type`, `place_name`, `lat`, `lng`, `disaster_category`, `heading`, `date`, `discription`, `short_discription`, `disaster_management`, `special_note`, `warning_note`, `no_of_injuries`, `no_of_deaths`, `Damage_ammount`, `person_informed`, `conformation`, `disaster_name`, `disaster_id`) VALUES
(1, 'Natural', 'Horana', 12.4, 432.2, 4, 'NBRO extends landslide warning', '2017-12-02', 'The National Building Research Organization says that since the rainfall within the past 24 hours has exceeded 75 mm, if the rains continue, there is a possibility of landslides, slope failures, rock falls, cut failures and ground subsidence. The people in Badulla (Haldummulla and Passara divisional secretariat divisions and surrounding areas.), Ratnapura (Kolonna, Ayagama, Balangoda, Kahawaththa, Kuruwita, Imbulpe, Eheliyagoda and Weligepola divisional secretariat divisions and surrounding areas.), Galle (Baddegama, Elpitiya, Yakkalamulla &amp; Nagoda DS division and surrounding areas), Matara (Pasgoda , Pitabeddara and Kotapala DS divisions and surrounding areas.), Hambantota (Katuwana &amp; Okewela DS division and surrounding areas), Kalutara District (Paalindanuwara, Bulathsinhala, Ingiriya &amp; Agalawatta DS division and surrounding areas) are urged to be watchful.', 'The National Building Research Organization says that since the rainfall within the past 24 hours has exceeded 75 mm, if the rains continue, there is a possibility of landslides, slope failures, rock falls, cut failures and ground subsidence.', 'Some spectacular events of tragedies are reported as Varnavat landslide, Uttarkashi District, Malpha landslide Pithoragarh district, Okhimath landslide in Chamoli district, UK and Paglajhora in Darjeeling district as well as Sikkim, Aizawl sports complex, Mizoram.These are some of the more recent examples of landslides. The problem therefore needs to be tackled for mitigation and management for which hazard zones have to be identified and specific slides to be stabilized and managed in addition to monitoring and early warning systems to be placed at selected sites. The Photograph of Okhimath landslide which formed a lake in Madhyamaheshwerganga, Rudraprayag district.', 'Earthflows\r\n\r\nA rock slide in Guerrero, Mexico\r\nEarthflows are downslope, viscous flows of saturated, fine-grained materials, which move at any speed from slow to fast. Typically, they can move at speeds from 0.17 to 20 km/h (0.1 to 12.4 mph). Though these are a lot like mudflows, overall they are more slow moving and are covered with solid material carried along by flow from within. They are different from fluid flows which are more rapid. Clay, fine sand and silt, and fine-grained, pyroclastic material are all susceptible to earthflows. The velocity of the earthflow is all dependent on how much water content is in the flow itself: the higher the water content in the flow, the higher the velocity will be.', 'Springs, seeps, or saturated ground in areas that have not typically been wet before. New cracks or unusual bulges in the ground, street pavements or sidewalks. Ancillary structures such as decks and patios tilting and/or moving relative to the main house.', 10, 2, 2000000, 1, b'1111111111111111111111111111111', 'Land Slide', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disaster_info`
--
ALTER TABLE `disaster_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disaster_info`
--
ALTER TABLE `disaster_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
