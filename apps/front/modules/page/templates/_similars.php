<h3>Төстэй кино</h3>
<?php 
$rss = ItemTable::getInstance()->doFetchArray('route, folder, image, title, year', 
        array('andWhere'=>'id <> '.$rs->getId().' 
						        			 and year > '.($rs->getYear()-3).' and year <= '.($rs->getYear()+3).' 
						        			 and genre like "%'.$rs->getGenre().'%"',
              'type'=>$rs->getType(), 'limit'=>10));
if(!sizeof($rss))  {
		echo 'Олдсонгүй.';
}?>

<ul class="box-xs">
		<?php foreach ($rss as $rs) {
				include_partial('page/box-xs', array('rs'=>$rs));	
		}?>
</ul>