
--
-- Database: `car_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(255) NOT NULL,
  PRIMARY KEY (`manu_id`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(255) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `manu_id` int(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `manufacturing_year` varchar(255) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `pic_1` varchar(255) NOT NULL,
  `pic_2` varchar(255) NOT NULL,
  PRIMARY KEY (`model_id`),
  FOREIGN KEY (`manu_id`) REFERENCES `manufacturer` (`manu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
