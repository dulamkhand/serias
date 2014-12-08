<?php if(sizeof($rss)):?>
    <?php foreach($rss as $rs):?>
        <div style="width:<?php echo $width?>px;height:<?php echo $height?>px;margin:0 5px 5px 0;position:relative;" class="left">
            <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" style="color:#fff;" title="<?php echo $rs['title']?>">
                <?php echo image_tag('/u/'.$rs['folder'].'/t140-'.$rs['image'], array('style'=>'box-shadow:0 0 4px #666;max-width:'.$width.'px'))?>
                <br clear="all">
                <span style="line-height:13px;color:#000;"><?php echo mb_strlen($rs['title']) > 22 ? utf8_substr($rs['title'], 0 , 20).'..' : $rs['title'];?> (<?php echo $rs['year']?>)</span>
            </a>
        </div>
    <?php endforeach;?>
<?php else:?>
    Үр дүн олдсонгүй.
<?php endif?>
<br clear="all">

<?php if(isset($more) && $more):?>
    <a href="<?php echo url_for('page/index?type='.$type)?>" class="right" style="margin:10px 0 0 0;">
      <h3 style="color:#fff;">Цааш &raquo;</h3></a>
<?php endif?>
<br clear="all">