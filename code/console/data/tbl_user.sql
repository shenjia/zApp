
-- User --

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `chinese_name` char(4) NOT NULL,
  `english_name` char(32) NOT NULL,
  `sex` tinyint(1) NOT NULL default '1',
  `avatar` char(255) NOT NULL default '',
  `area` char(3) NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `create_time` bigint(20) NOT NULL,
  `update_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX (`location`, `sex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
