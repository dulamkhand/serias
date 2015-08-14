<?php $host = sfConfig::get('app_host')?>
<?php if($rs && $rs['path']) { ?>
	<?php $id = rand()?>
	<?php if(!isset($close) || $close):?>
			<a onclick="$('.b<?php echo $id?>').hide();" class="right b<?php echo $id?>" style="cursor:pointer;">Сурталчилгаа хаах</a>
	<?php endif?>
	<a <?php if($rs['link']) echo 'href="'.$rs['link'].'"'?> <?php if($rs['target']) echo 'target="_blank"'?> class="b<?php echo $id?>">
		    <?php if($rs['ext'] == 'swf') { ?>
				<!--mobile ued flash banner haruulahgui-->
				<?php if(GlobalLib::isMobileDevice()){ ?>
					<?php if($rs['mobile_img']) echo image_tag('/u/b/'.$rs['mobile_img'], array('style'=>'max-width:'.$width.'px;max-height:'.$height.'px;'));?>
				<?php } else {?>
					<object width="<?php echo $width?>" height="<?php echo $height?>" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
						<param value="<?php echo $host.'/u/b/'.$rs['path']?>" name="movie">
						<param value="high" name="quality">
						<param name="wmode" value="transparent">
						<embed width="<?php echo $width?>" height="<?php echo $height?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" 
							   quality="high" src="<?php echo $host.'/u/b/'.$rs['path']?>" allowscriptaccess="sameDomain" wmode="transparent" />
					</object>
				<?php }?>
		    <?php } else {?>
		            <?php echo image_tag('/u/b/'.$rs['path'], array('style'=>'width:'.$width.'px;max-height:'.$height.'px;'));?>
		    <?php }?>
    </a>
<?php }?>