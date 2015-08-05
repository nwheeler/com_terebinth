DROP TABLE IF EXISTS `#__terebinth`;

CREATE TABLE `#__terebinth` (
  `id` int(11) NOT NULL auto_increment,
  `asset_id` INT(10) NOT NULL DEFAULT '0',
  `terebinth_host` varchar(80) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__terebinth` (`terebinth_host`) VALUES
	('127.0.0.1:6081')
