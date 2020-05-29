

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE contacts (
  id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  dob date NOT NULL,
  contact varchar(255) NOT NULL,
  email varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE contacts
  ADD PRIMARY KEY (id);

ALTER TABLE contacts
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;