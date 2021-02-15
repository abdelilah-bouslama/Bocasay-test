CREATE TABLE `group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `group` VALUES (1,'Groupe 1'),(2,'Groupe 2'),(3,'Groupe 3');


CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `user` VALUES (1,'test',MD5('test'),'2011-09-28 12:00:00');


CREATE TABLE `user_group` (
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_group` VALUES (1,2);

DELIMITER //
--
-- Procédures
--
CREATE PROCEDURE `find_user`(IN `userName` varchar(255),IN `userPassword` varchar(255), IN `id_group` INT)
BEGIN
   SET @qu= CONCAT("SELECT u.* from user u JOIN user_group ug ON ug.id_user=u.id_user WHERE u.username = '", userName, "' AND u.password=MD5('",userPassword,"') AND ug.id_group = ", id_group);
   PREPARE myquery FROM @qu;
   EXECUTE myquery;
END //

DELIMITER //
--
-- Debug Procédures
--
CREATE PROCEDURE `find_user_debug`(IN `userName` varchar(255),IN `userPassword` varchar(255), IN `id_group` INT)
BEGIN
   SELECT CONCAT("SELECT u.* from user u JOIN user_group ug ON ug.id_user=u.id_user WHERE u.username = '", userName, "' AND u.password=MD5('",userPassword,"') AND ug.id_group = ", id_group) as $qu;
END //
