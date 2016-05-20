<?php $rss = ItemTable::getInstance()->doFetchArray(
								'route, folder, image, title, year, is_watch_online, is_torrent_download, is_mongolian_language', 
						 		array('limit'=>50, 'homepage'=>1, 'orderBy'=>'is_watch_online DESC, is_torrent_download DESC, is_mongolian_language DESC'))?>
<?php //include_partial('partial1/cinema', array());?>
<?php include_partial('partial1/guide', array());?>

<!--online-->
<h1>Онлайнаар үзэх</h1>
<ul class="box-s">
    <?php $i=0; foreach ($rss as $rs):?>
		    <?php if($rs['is_watch_online'] > 0):?>
		    		<?php if($i++ == 10) break;?>
						<?php include_partial('page/box-s', array('rs'=>$rs));?>
				<?php endif?>
    <?php endforeach;?>
</ul>
<br clear="all">
<a href="<?php echo url_for('page/index?isWatchOnline=1')?>" class="more1">Цааш</a>
<br clear="all">

<!--torrent-->
<h1>Торрентоор татах</h1>
<ul class="box-s">
    <?php $i=0; foreach ($rss as $rs):?>
		    <?php if($rs['is_torrent_download'] > 0):?>
		    		<?php if($i++ == 10) break;?>
		    		<?php include_partial('page/box-s', array('rs'=>$rs));?>
				<?php endif?>
    <?php endforeach;?>
</ul>
<br clear="all">
<a href="<?php echo url_for('page/index?isTorrentDownload=1')?>" class="more1">Цааш</a>
<br clear="all">

<!--mongolian-->
<h1>Монгол хэлээр</h1>
<ul class="box-s">
    <?php $i=0; foreach ($rss as $rs):?>
		    <?php if($rs['is_mongolian_language'] > 0):?>
		    		<?php if($i++ == 10) break;?>
						<?php include_partial('page/box-s', array('rs'=>$rs));?>
				<?php endif?>
    <?php endforeach;?>
</ul>
<br clear="all">
<a href="<?php echo url_for('page/index?isMongolianLanguage=1')?>" class="more1">Цааш</a>
<br clear="all">

<!--news-->
<h1>Мэдээ мэдээлэл</h1>
<ul class="news-s">
	<?php $rss = NewsTable::getInstance()->doFetchArray('id, image, title, intro', array('limit'=>6, 'isFeatured'=>1));
	foreach ($rss as $rs){
		include_partial('partial1/news-s', array('rs'=>$rs));
	}?>
</ul>
<br clear="all">
<a href="<?php echo url_for('partial1/newsIndex')?>" class="more1">Цааш</a>
<br clear="all">