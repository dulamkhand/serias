<h3><?php echo GlobalLib::getValue('bests', $bestType)?></h3>
<div class="box-home">
    <?php foreach($rss as $rs):?>
        <div>
            <a href="<?php echo url_for('page/show?route='.$rs->getItem()->getRoute())?>" style="color:#fff;">
                <?php echo image_tag('/u/'.$rs->getItem()->getFolder().'/t140-'.$rs->getItem()->getImage(), array('style'=>'box-shadow:0 0 4px #666;margin:0 7px 5px 0;max-width:25px;float:left;'))?>
                <h2 style="color:#222;float:left;width:690px;"><?php echo $rs->getNumber()?>. <?php echo $rs->getItem()?></h2>
            </a>
            <br clear="all">
        </div>
    <?php endforeach;?>
</div><!--box-home-->
<br clear="all">
