CREATE TABLE IF NOT EXISTS `google_top_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_uri` varchar(60) NOT NULL,
  `page_title` varchar(60) NOT NULL,
  `total_views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;