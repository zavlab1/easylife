DROP TABLE IF EXISTS `#__carousel`;

CREATE TABLE IF NOT EXISTS `#__carousel` (
    `id` INT(11) NOT NULL AUTO_INCREMENT , 
    `intro` VARCHAR(256) NOT NULL , 
    `caption` VARCHAR(256) NOT NULL , 
    `image` VARCHAR(1024) NOT NULL , 
    `icon` VARCHAR(25) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;