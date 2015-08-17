<h1>Торрентоор татах</h1>
<?php $rss = ItemTable::getInstance()->doFetchArray(array('route, folder, image, title, year'), array('limit'=>10, 'isTorrentDownload'=>'1'))?>
<ul class="">
    <?php foreach ($rss as $rs):?>
		<li style="float:left;margin:0 5px 5px 0;width:140px;height:240px;">
			<a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
				<?php echo image_tag('/u/'.$rs['folder'].'/t140-'.$rs['image'], array('style'=>'box-shadow:0 0 4px #666;'))?><br>
				<?php echo $rs['title']?> (<?php echo $rs['year']?>)
			</a>
		</li>
    <?php endforeach;?>
</ul>
<br clear="all">
<a href="<?php echo url_for('page/index?isTorrentDownload=1')?>" class="more">Цааш</a>
<br clear="all">