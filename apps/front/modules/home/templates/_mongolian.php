<h1>Монгол хэлээр</h1>
<ul class="">
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
