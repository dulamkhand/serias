<?php $rss = ItemTable::getInstance()->doFetchArray(
								array('route, folder, image, title, year, is_watch_online, is_torrent_download, is_mongolian_language'), 
						 		array('limit'=>50, 'homepage'=>1, 'orderBy'=>'is_watch_online DESC, is_torrent_download DESC, is_mongolian_language DESC'))?>
<?php //include_partial('home/cinema', array());?>
<?php include_partial('home/guide', array());?>
<?php include_partial('home/online', array('rss'=>$rss));?>
<?php include_partial('home/torrent', array('rss'=>$rss));?>
<?php include_partial('home/mongolian', array('rss'=>$rss));?>