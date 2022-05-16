CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(4000) NOT NULL,
  pass varchar(4000) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE topics (
  id int(11) NOT NULL AUTO_INCREMENT,
  header varchar(4000) NOT NULL,
  content varchar(4000) NOT NULL,
  user varchar(4000) NOT NULL,
  time TIMESTAMP,
  PRIMARY KEY (id)
);