<h3>Төстэй кино</h3>
<br clear="all">

<?php 
$rss = ItemTable::getInstance()->doFetchArray(array('type', 'route', 'folder', 'image', 'title', 'year'), 
              array('idO'=>$rs->getId(), 'type'=>$rs->getType(), 'genres'=>explode(";", $rs->getGenre()), 'limit'=>14));
if(!sizeof($rss))  {
		echo 'Олдсонгүй.';
}
foreach ($rss as $rs) {
		include_partial('page/box-s', array('rs'=>$rs));	
}
?>