<?php $id = $rs['id']?>
<div id="comment<?php echo $id?>" style="line-height:20px;border-bottom:1px dotted #cecece;padding:5px 0;">
    <span class="left" style="line-height:20px;color:#0677cf;">
        <?php echo GlobalLib::clearOutput($rs['name'])?>
        <span style="font-size:12px;">[<?php echo $rs['ip_address']?>]:</span>
    </span>
    <span class="right" style="font-size:12px;"><?php echo time_ago($rs['created_at'])?></span>
		<br clear="all">
    <?php echo blurBadWords(GlobalLib::clearOutput($rs['text']))?>
    <br clear="all">
    <?php echo image_tag('icons/thumb-up.png', array(
				 'onclick'=>($sf_user->getAttribute('thumbed'.$id) ? '' : "thumbsUp({$id})"), 
				 'style'=>($sf_user->getAttribute('thumbed'.$id) ? '' : 'cursor:pointer;'), 'align'=>'absmiddle'))?>
    <span id="nbLike<?php echo $id?>"><?php echo $rs['nb_like']?></span>
   	&nbsp;&nbsp;
    <?php echo image_tag('icons/thumb-down.png', array(
					'onclick'=>($sf_user->getAttribute('thumbed'.$id) ? '' : "thumbsDown({$id})"), 
					'style'=>($sf_user->getAttribute('thumbed'.$id) ? '' : 'cursor:pointer;'), 'align'=>'absmiddle'))?>
    <span id="nbUnlike<?php echo $id?>"><?php echo $rs['nb_unlike']?></span>
    <br clear="all">
</div>