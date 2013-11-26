
-- User --

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` char(4) NOT NULL,
  `sex` tinyint(1) NOT NULL default '1',
  `avatar` char(255) NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `create_time` bigint(20) NOT NULL,
  `update_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` bigint(20) NOT NULL auto_increment,
  `nickname` varchar(32) NOT NULL default '',
  `birthday` bigint(20) NOT NULL default '0',
  `self_intro` varchar(150) NOT NULL default '',
  `create_time` bigint(20) NOT NULL,
  `update_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `user_auth` (
  `id` bigint(20) NOT NULL auto_increment,
  `username` char(64) NOT NULL,
  `password` char(32) NOT NULL,
  `salt` char(32) NOT NULL,
  `role` smallint(6) NOT NULL default '0',
  `create_time` bigint(20) NOT NULL,
  `update_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `user_stat` (
  `id` bigint(20) NOT NULL auto_increment,
  `login_times` bigint(20) NOT NULL default '0',
  `login_time` bigint(20) NULL,
  `login_ip` char(40) NULL,
  `create_time` bigint(20) NOT NULL,
  `update_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;