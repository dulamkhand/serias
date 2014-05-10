<?php $host = sfConfig::get('app_host')?>

<?php $color = GlobalLib::getValue('colors', $rs->getType()) ?>
<div class="box-home" style="background:<?php echo $color?>;">
    <h2><?php echo $rs?></h2>
    <?php echo image_tag('/u/m/'.$rs->getImage(), array('class'=>'left'))?>
    <div class="left ml10px" style="color:#fff;">
        <?php echo $rs->getSummary();?>
    </div>
    <br clear="all">
</div>


<div class="box-home" style="background:#dedede;border:1px solid #ccc;">
    <?php $links = Doctrine::getTable('Link')->createQuery()
                      ->where('item_id =?', $rs->getId())
                      ->orderBy('season ASC, episode ASC, created_at DESC, updated_at DESC')
                      ->fetchArray();?>
    <?php $i = 0?>
    <?php foreach($links as $link):?>
        <?php if(++$i == 0 && ($link['season'] && $link['episode'] && $link['title'])):?>
            <h2 style="color:#666"><?php echo 'S'.$link['season'].'E'.$link['episode'].' '.$link['title']?></h2>    
        <?php endif?>

        <span onclick="$('#frame<?php echo $link['id']?>').toggle();return false;" class="left"
              style="color:#000;text-decoration:underline;cursor:pointer;margin:0 5px 0 0;">
             link<?php echo $i?>
        </span>

        <div id="frame<?php echo $link['id']?>" style="display:none;">
            <iframe width="900" height="640" scrolling="no" frameborder="0" src="<?php echo $link['link']?>" 
                framespacing="0" id="hmovie" style="display: inline;"></iframe>
        </div>
    <?php endforeach;?>
    <br clear="all">
</div>


