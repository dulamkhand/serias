<?php $host = sfConfig::get('app_host')?>
<div class="box-home">
    <?php $i = 0;?>
    <?php foreach($rss as $rs):?>
        <div style="width:<?php echo $width?>px;height:<?php echo $height?>px;margin:0 <?php echo (++$i == 5)  ? '0' : '6px'?> 0 0;position:relative;" class="left">
            <?php if($i == 5) {$i = 0;}?>
            <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" style="color:#fff;">
                <?php echo image_tag('/u/'.$rs['folder'].'/t140-'.$rs['image'], array('style'=>'box-shadow:0 0 4px #666;max-width:'.$width.'px;max-height:210px;'))?>
                <span class="left" style="line-height:22px;margin:5px 0 0 0;"><?php echo $rs['title']?> (<?php echo $rs['year']?>)</span>
								<br clear="all">
            </a>
        </div>
    <?php endforeach;?>
    <br clear="all">
    
    <?php if(isset($more) && $more):?>
        <a href="<?php echo url_for('page/index')?>" class="right" style="margin:10px 0 0 0;">
          <h3 style="color:#fff;">Цааш &raquo;</h3></a>
    <?php endif?>
</div><!--box-home-->
<br clear="all">
