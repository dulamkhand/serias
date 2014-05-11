<?php $color = GlobalLib::getValue('colors', $type)?>
<div class="box-home" style="background:<?php echo $color?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2><?php echo GlobalLib::getValue('typeMN', $type)?></h2>
    <div style="background:#333;padding:10px;">
        <?php foreach($rss as $rs):?>
            <div style="width:140px;height:250px;margin:0 10px 0 0;" class="left">
                <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" style="color:#fff;">
                    <?php echo image_tag('/u/m/t140-'.$rs['image'], array('style'=>'box-shadow:0 0 4px #666;'))?>
                    <br clear="all">
                    <?php echo $rs['title']?>
                    <span class="right" style="color:<?php echo $color?>;"><?php echo $rs['year']?></span>
                  </a>
            </div>
        <?php endforeach;?>
        <br clear="all">
    </div><!--box-333-->
</div><!--box-home-->
<br clear="all">