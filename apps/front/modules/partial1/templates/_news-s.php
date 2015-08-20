<li>
		<a href="<?php echo url_for('partial1/newsShow?id='.$rs['id'])?>" title="<?php echo $rs['title']?>" style="font-size:13px;line-height:20px;">
				<?php echo image_tag('/u/news/'.$rs['image'], array('style'=>'height:120px;width:235px;'))?>
				<h6 style="line-height:22px;">
						<?php echo mb_strlen($rs['title']) > 93 ? utf8_substr($rs['title'], 0 , 90).'...' : $rs['title'];?>
				</h6>
				<?php //echo mb_strlen($rs['intro']) > 180 ? utf8_substr($rs['intro'], 0 , 180) : $rs['intro'];?>
		</a>
		<a href="<?php echo url_for('partial1/newsShow?id='.$rs['id'])?>" title="Цааш" style="right:0;bottom:0;position:absolute;">
	  		<?php echo image_tag('icons/more2.png', array('width'=>25))?>
	  </a>
	  <br clear="all">
</li>