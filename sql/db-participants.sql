
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Participants`
--

-- --------------------------------------------------------

--
-- Table structure for table `Participants`
--

CREATE TABLE IF NOT EXISTS `Participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zeusCode` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `antenna` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `itineraryJson` text NOT NULL,
  `publishContact` tinyint(1) NOT NULL,
  `publishItinerary` tinyint(1) NOT NULL,
  `creationDateTime` varchar(25) NOT NULL,
  `updateDateTime` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
