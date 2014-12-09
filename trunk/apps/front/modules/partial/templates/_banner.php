<?php $host = sfConfig::get('app_host')?>
<?php if($rs && isset($rs['path'])) { ?>
		<a href="<?php echo $rs['link']?>" <?php if($rs['target']) echo 'target="_blank"'?>>
		    <?php if($rs['ext'] =='swf'){ ?>
		        <object width="<?php echo $width?>" height="<?php echo $height?>" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
		            <param value="<?php echo $host.'/u/b/'.$rs['path']?>" name="movie">
		            <param value="high" name="quality">
		            <param name="wmode" value="transparent">
		            <embed width="<?php echo $width?>" height="<?php echo $height?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" 
		                   quality="high" src="<?php echo $host.'/u/b/'.$rs['path']?>" allowscriptaccess="sameDomain" wmode="transparent" />
		        </object>
		    <?php } else {?>
		            <?php echo image_tag('/u/b/'.$rs['path'], array('style'=>'max-width:'.$width.'px;max-height:'.$height.'px;'));?>
		    <?php }?>
    </a>
<?php }?>