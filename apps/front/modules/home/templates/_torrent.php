<h1>Торрентоор татах</h1>
<ul class="">
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
