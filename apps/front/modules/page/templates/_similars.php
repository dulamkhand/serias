<h3>Төстэй кино</h3>
<?php 
$rss = ItemTable::getInstance()->doFetchArray(array('type', 'route', 'folder', 'image', 'title', 'year'), 
              array('idO'=>$rs->getId(), 'type'=>$rs->getType(), 'genres'=>explode(";", $rs->getGenre()), 'limit'=>10));
if(!sizeof($rss))  {
		echo 'Олдсонгүй.';
}?>

<ul class="box-xs">
		<?php foreach ($rss as $rs) {
				include_partial('page/box-xs', array('rs'=>$rs));	
		}?>
</ul>