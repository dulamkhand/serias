<h3 style="margin:0 0 5px 0">Төстэй кино</h3>
<?php 
$rss = GlobalTable::doFetchArray('Item', array('route, image, title, year'), 
              array('idO'=>$rs->getId(), 'type'=>$rs->getType(), 'genre'=>$rs->getGenre(), 'limit'=>10));
include_partial('page/boxwhite', array('rss'=>$rss, 'type'=>$rs->getType(), 'width'=>90, 'height'=>170));
?>