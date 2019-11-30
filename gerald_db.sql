create database gerald_db;

CREATE TABLE `regtbl` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `tbl_class` (
  `id` int(11)  NOT NULL,
  `classcode` varchar(100) NOT NULL,
  `studentid` int(100) NOT NULL,
  `subjectcode` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `times`time NOT NULL,
  `teacher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `tbl_student` (
  `studentid` int(255)  NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

