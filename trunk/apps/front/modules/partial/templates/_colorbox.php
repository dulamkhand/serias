<?php $color = GlobalLib::getValue('colors', $type);?>
<div class="box-home" style="background:<?php echo $color?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2><?php echo GlobalLib::getValue('type_mn', $type)?></h2>
    <div style="background:#333;padding:10px;">
        <?php foreach($rss as $rs):?>
            <div style="width:<?php echo $width?>px;height:<?php echo $height?>px;margin:0 10px 0 0;" class="left">
                <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" style="color:#fff;">
                    <?php echo image_tag('/u/m/t140-'.$rs['image'], array('style'=>'box-shadow:0 0 4px #666;max-width:'.$width.'px'))?>
                    <br clear="all">
                    <span style="line-height:13px;color:#fff;"><?php echo $rs['title']?> (<?php echo $rs['year']?>)</span>
                  </a>
            </div>
        <?php endforeach;?>
        <br clear="all">
    </div><!--box-333-->
    
    <?php if(isset($more) && $more):?>
        <a href="<?php echo url_for('page/index?type='.$type)?>" class="right" style="margin:10px 0 0 0;">
          <h3 style="color:#fff;">Цааш &raquo;</h3></a>
    <?php endif?>
</div><!--box-home-->
<br clear="all">