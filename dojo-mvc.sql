DROP TABLE IF EXISTS player;
DROP TABLE IF EXISTS position;
DROP TABLE IF EXISTS team;

CREATE TABLE team (
  id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  name varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO team (id, name) VALUES
(1, 'Nantes'),
(2, 'Paris'),
(3, 'Marseille'),
(4, 'Lyon'),
(5, 'Lille');

CREATE TABLE position (
  id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  name VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO position (id, name) VALUES
(1, 'Leader'),
(2, 'Launcher'),
(3, 'Runner'),
(4, 'Jumper'),
(5, 'Sleeper');

CREATE TABLE player (
  id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  name varchar(255) NOT NULL,
  team_id INT(11) NOT NULL,
  position_id INT(11) NOT NULL,
  FOREIGN KEY (team_id) REFERENCES team(id),
  FOREIGN KEY (position_id) REFERENCES `position`(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO player (id, name, team_id, position_id) VALUES
(1, 'Jean Pierre', 1, 1),
(2, 'Paris', 1, 2),
(3, 'Marseille', 1, 3),
(4, 'Lyon', 1, 4),
(5, 'Lille', 1, 5),
(6, 'Noah', 2, 1),
(7, 'Gideon', 2, 2),
(8, 'Brooks', 2, 3),
(9, 'Reyes', 2, 4),
(10, 'Lucy', 2, 5),
(11, 'Begum', 3, 1),
(12, 'Eren', 3, 2),
(13, 'Murray', 3, 3),
(14, 'Austin', 3, 4),
(15, 'Kaiser', 3, 5),
(17, 'Ruby-Rose', 4, 1),
(18, 'Vega', 4, 2),
(19, 'Rubi', 4, 3),
(20, 'Kearney', 4, 4),
(21, 'Lorelei', 4, 5),
(22, 'Redman', 5, 1),
(23, 'Caprice', 5, 2),
(24, 'Mathis', 5, 3),
(25, 'Marcel', 5, 4),
(26, 'Albert', 5, 5);