<h3>Таны нээж үзсэн</h3>
<?php 
//$rss = ItemTable::getInstance()->doFetchArray('type, route, folder, image, title, year', 
//              array('idO'=>$rs->getId(), 'type'=>$rs->getType(), 'genres'=>explode(";", $rs->getGenre()), 'limit'=>10));
              
$rss = $sf_user->getAttribute('viewed-movies-'.$sf_user->getId(), array());
$rss = array_reverse($rss);
if(!sizeof($rss))  {
		echo 'Олдсонгүй.';
}?>

<ul class="box-xs">
		<?php $i=0; foreach ($rss as $rs) {
				if($i++ == 10) break;
				include_partial('page/box-xs', array('rs'=>$rs));	
		}?>
</ul>