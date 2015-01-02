<h3 style="margin:0 0 15px 0">Төстэй кино</h3>
<?php 
$rss = GlobalTable::doFetchArray('Item', array('type', 'route', 'folder', 'image', 'title', 'year'), 
              array('idO'=>$rs->getId(), 'type'=>$rs->getType(), 'genres'=>explode(";", $rs->getGenre()), 'limit'=>14));
include_partial('page/boxwhite', array('rss'=>$rss, 'type'=>$rs->getType(), 'width'=>90, 'height'=>205));
?>