<h6 style="width:45px;">Зураг</h6>
<hr class="left" style="border:0;border-top:1px double #aaa;width:400px;margin:15px 0 0 0;">
<br clear="all">
<?php $images = ImageTable::getInstance()->doFetchArray(array('folder', 'filename'), array('isActive'=>'all', 'limit'=>8, 'objectType'=>'item', 'objectId'=>$rs->getId()))?>
<?php foreach ($images as $image) {?>
	<div class="left" style="width:100px;height:80px;margin:2px 2px 0 0;overflow:hidden;">
		<?php echo image_tag('/u/'.$image['folder'].'/t120-'.$image['filename'], array('style'=>'width:105px;height:80px;'));?>
	</div>
<?php }?>
<br clear="all">
<br clear="all">