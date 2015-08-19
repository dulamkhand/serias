<li class="box-xs">
		<a href="<?php echo url_for('page/show?route='.$rs['route'])?>" title="<?php echo $rs['title']?> (<?php echo $rs['year']?>)">
				<?php echo image_tag('/u/'.$rs['folder'].'/t140-'.$rs['image'], array('style'=>'max-height:140px;'))?>
				<?php echo $rs['title']?> (<?php echo $rs['year']?>)
		</a>
</li>