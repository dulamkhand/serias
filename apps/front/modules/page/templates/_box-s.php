<li class="box-s" style="list-style-type:none;">
		<a href="<?php echo url_for('page/show?route='.$rs['route'])?>" title="<?php echo $rs['title']?> (<?php echo $rs['year']?>)">
				<?php echo image_tag('/u/'.$rs['folder'].'/t140-'.$rs['image'], array('style'=>'max-height:220px;'))?>
				<?php echo $rs['title']?> (<?php echo $rs['year']?>)
		</a>
</li>