
--
-- Database: `cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cc_math`
--

CREATE TABLE IF NOT EXISTS `cc_math` (
  `pk` bigint(20) NOT NULL AUTO_INCREMENT,
  `id` text NOT NULL,
  `subject` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `statement` text NOT NULL,
  `listIdentifier` int(11) NOT NULL,
  `gradeLevels` text NOT NULL,
  `jurisdiction` text NOT NULL,
  `jurisdictionAbbreviation` varchar(15) NOT NULL,
  `gradeLevel` varchar(10) NOT NULL,
  `code` varchar(25) NOT NULL,
  `shortCode` varchar(15) NOT NULL,
  `ASN` text NOT NULL,
  `CCSS` text NOT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;